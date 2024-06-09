<?php

class ContactForm
{
    private const META_BOXES = [
        'email' => 'Email',
        'nom' => 'Nom',
        'prenom' => 'Prénom',
        'phone' => 'Téléphone',
    ];

    private const ERROR_REQUIRED_FIELD = 'Le champ %s est requis.';

    public function __construct()
    {
        add_action('admin_post_contact_form', [$this, 'handle_contact_form']);
        add_action('admin_post_nopriv_contact_form', [$this, 'handle_contact_form']);
        add_action('add_meta_boxes', [$this, 'add_meta_boxes']);
        add_action('save_post', [$this, 'save_meta_boxes']);
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
            wp_redirect($_SERVER['HTTP_REFERER']);
            exit;
        }

        $this->send_email($formData);
    }

    private function validate_form_data(array $formData): array
    {
        $errors = [];

        foreach ($formData as $field => $value) {
            if (empty($value)) {
                $errors[$field] = sprintf(self::ERROR_REQUIRED_FIELD, $field);
            }
        }

        return $errors;
    }

    private function send_email(array $formData): void
    {
        $post_id = wp_insert_post([
            'post_type' => 'message',
            'post_title' => $formData['nom'] . ' ' . $formData['prenom'],
            'post_content' => $formData['message'],
            'post_status' => 'publish',
            'meta_input' => [
                'email' => $formData['email'],
            ],
        ]);

        if ($post_id) {
            $email_content = "Vous avez reçu un nouveau message de {$formData['nom']} {$formData['prenom']} :\n\n{$formData['message']}";
            wp_mail('samsamreq@gmail.com', 'Nouveau message de contact', $email_content);
            wp_redirect(home_url());
            exit;
        }
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
                return sanitize_text_field($value);
            default:
                return sanitize_text_field($value);
        }
    }
}

new ContactForm();