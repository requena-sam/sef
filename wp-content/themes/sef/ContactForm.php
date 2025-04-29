<?php

class ContactForm
{
    private const META_BOXES = [
        'email' => 'Email',
        'nom' => 'Nom',
        'prenom' => 'Prénom',
        'phone' => 'Téléphone',
        'sujet' => 'Sujet',
    ];

    private const ERROR_REQUIRED_FIELD = 'Le champ %s est requis.';

    public function __construct()
    {
        add_action('admin_post_contact_form', [$this, 'handle_contact_form']);
        add_action('admin_post_nopriv_contact_form', [$this, 'handle_contact_form']);
        add_action('add_meta_boxes', [$this, 'add_meta_boxes']);
        add_action('save_post', [$this, 'save_meta_boxes']);
        add_action('init', [$this, 'start_session_if_not_started']);
    }

    public function start_session_if_not_started() {
        if (!session_id()) {
            session_start();
        }
    }

    public function handle_contact_form()
    {
        $formData = [
            'nom' => sanitize_text_field($_POST['nom'] ?? ''),
            'prenom' => sanitize_text_field($_POST['prenom'] ?? ''),
            'email' => sanitize_email($_POST['email'] ?? ''),
            'phone' => sanitize_text_field($_POST['phone'] ?? ''),
            'sujet' => sanitize_text_field($_POST['sujet'] ?? ''),
            'message' => sanitize_textarea_field($_POST['message'] ?? ''),
        ];

        $errors = $this->validate_form_data($formData);

        if (!empty($errors)) {
            $_SESSION['form_errors'] = $errors;
            // Stocker les données du formulaire pour pouvoir les réafficher
            $_SESSION['form_data'] = $formData;
            wp_redirect($_SERVER['HTTP_REFERER']);
            exit;
        }

        if (!empty($_POST['botbait'])) {
            die("Spam détecté !");
        }

        $result = $this->send_email($formData);

        // Ajouter un message de confirmation
        if ($result) {
            $_SESSION['form_success'] = 'Votre message a été envoyé avec succès.';
        } else {
            $_SESSION['form_errors'] = ['general' => 'Une erreur est survenue lors de l\'envoi du message.'];
            $_SESSION['form_data'] = $formData;
        }

        wp_redirect($_SERVER['HTTP_REFERER']);
        exit;
    }

    private function validate_form_data(array $formData): array
    {
        $errors = [];

        foreach ($formData as $field => $value) {
            if (empty($value)) {
                $errors[$field] = sprintf(self::ERROR_REQUIRED_FIELD, $field);
            }
        }

        // Vérification anti-spam: nom et prénom identiques ou partiellement contenus
        if (!empty($formData['nom']) && !empty($formData['prenom'])) {
            $nom_lower = strtolower($formData['nom']);
            $prenom_lower = strtolower($formData['prenom']);

            // Vérifier si le nom et le prénom sont identiques
            if ($nom_lower === $prenom_lower) {
                $errors['spam_detection'] = 'Veuillez entrer un nom et un prénom différents.';
            }

            // Vérifier si le prénom est contenu dans le nom ou vice versa
            elseif (strpos($nom_lower, $prenom_lower) !== false || strpos($prenom_lower, $nom_lower) !== false) {
                $errors['spam_detection'] = 'Le nom et le prénom ne peuvent pas être similaires.';
            }
        }

        return $errors;
    }

    private function send_email(array $formData): bool
    {
        $post_id = wp_insert_post([
            'post_type' => 'message',
            'post_title' => $formData['nom'] . ' ' . $formData['prenom'],
            'post_content' => $formData['message'],
            'post_status' => 'publish',
            'meta_input' => [
                'email' => $formData['email'],
                'nom' => $formData['nom'],
                'prenom' => $formData['prenom'],
                'phone' => $formData['phone'],
                'sujet' => $formData['sujet'],
            ],
        ]);

        if ($post_id) {
            $email_content = "Vous avez reçu un nouveau message de {$formData['nom']} {$formData['prenom']} :\n\n";
            $email_content .= "Email: {$formData['email']}\n";
            $email_content .= "Téléphone: {$formData['phone']}\n";
            $email_content .= "Sujet: {$formData['sujet']}\n\n";
            $email_content .= "Message:\n{$formData['message']}";

            $mail_sent = wp_mail('samsamreq@gmail.com', 'Nouveau message de contact', $email_content);
            return $mail_sent;
        }

        return false;
    }

    public function add_meta_boxes()
    {
        foreach (self::META_BOXES as $id => $title) {
            add_meta_box($id . '_metabox', $title, [$this, 'meta_box_callback'], 'message', 'normal', 'default');
        }
    }

    public function meta_box_callback($post, $metabox)
    {
        $id = str_replace('_metabox', '', $metabox['id']);
        $value = get_post_meta($post->ID, $id, true);
        echo '<label for="' . $id . '">' . self::META_BOXES[$id] . '</label><br>';
        echo '<input type="' . $this->get_input_type($id) . '" id="' . $id . '" name="' . $id . '" value="' . esc_attr($value) . '"><br>';
    }

    public function save_meta_boxes($post_id)
    {
        foreach (self::META_BOXES as $id => $title) {
            if (array_key_exists($id, $_POST)) {
                update_post_meta($post_id, $id, $this->sanitize_field($id, $_POST[$id]));
            }
        }
    }

    private function get_input_type($id): string
    {
        return $id === 'email' ? 'email' : 'text';
    }

    private function sanitize_field($id, $value)
    {
        switch ($id) {
            case 'email':
                return sanitize_email($value);
            case 'phone':
            case 'nom':
            case 'prenom':
            case 'sujet':
                return sanitize_text_field($value);
            default:
                return sanitize_text_field($value);
        }
    }

    // Fonction d'aide pour afficher les messages du formulaire
    public static function display_form_messages() {
        // Afficher les erreurs s'il y en a
        if (!empty($_SESSION['form_errors'])) {
            echo '<div class="form-errors">';
            foreach ($_SESSION['form_errors'] as $error) {
                echo '<p class="error">' . esc_html($error) . '</p>';
            }
            echo '</div>';
            // Effacer les erreurs après les avoir affichées
            unset($_SESSION['form_errors']);
        }

        // Afficher le message de succès s'il y en a un
        if (!empty($_SESSION['form_success'])) {
            echo '<div class="form-success">';
            echo '<p class="success">' . esc_html($_SESSION['form_success']) . '</p>';
            echo '</div>';
            // Effacer le message après l'avoir affiché
            unset($_SESSION['form_success']);
        }
    }

    // Fonction pour récupérer les données du formulaire précédemment soumises
    public static function get_form_data($field) {
        if (isset($_SESSION['form_data'][$field])) {
            $value = $_SESSION['form_data'][$field];
            return esc_attr($value);
        }
        return '';
    }
}

// Instancier la classe
new ContactForm();