<?php
// Récupérer les erreurs et les supprimer de la session
$errors = $_SESSION['form_errors'] ?? [];
unset($_SESSION['form_errors']);

// Récupérer le message de succès et le supprimer de la session
$success_message = $_SESSION['form_success'] ?? '';
unset($_SESSION['form_success']);

// Récupérer les données du formulaire précédemment soumises
$form_data = $_SESSION['form_data'] ?? [];
unset($_SESSION['form_data']);
?>

<?php if (!empty($success_message)): ?>
    <div id="form-success-popup" class="form-success-popup">
        <div class="form-success-popup-content">
            <span class="form-success-popup-close">&times;</span>
            <p><?php echo esc_html($success_message); ?></p>
        </div>
    </div>
    <script>
        // Affiche la popup automatiquement
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('form-success-popup').style.display = 'block';

            // Fermer la popup quand on clique sur la croix
            document.querySelector('.form-success-popup-close').addEventListener('click', function() {
                document.getElementById('form-success-popup').style.display = 'none';
            });

            // Fermer la popup quand on clique en dehors
            window.addEventListener('click', function(event) {
                if (event.target == document.getElementById('form-success-popup')) {
                    document.getElementById('form-success-popup').style.display = 'none';
                }
            });

            // Fermer automatiquement après 5 secondes
            setTimeout(function() {
                document.getElementById('form-success-popup').style.display = 'none';
            }, 5000);
        });
    </script>
<?php endif; ?>

<form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" class="contact__formulaire"
      data-animation="showUp">
    <input type="hidden" name="action" value="contact_form">
    <fieldset>
        <legend class="hidden">Formulaire de contact</legend>
        <div class="contact__formulaire__np">
            <div class="contact__formulaire__np__name">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" placeholder="Chaudfontaine" value="<?php echo esc_attr($form_data['nom'] ?? ''); ?>">
                <?php if (!empty($errors['nom'])): ?>
                    <p class="form-error"><?php echo esc_html($errors['nom']); ?></p>
                <?php endif; ?>
            </div>
            <div class="contact__formulaire__np__prenom">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" placeholder="Alain" value="<?php echo esc_attr($form_data['prenom'] ?? ''); ?>">
                <?php if (!empty($errors['prenom'])): ?>
                    <p class="form-error"><?php echo esc_html($errors['prenom']); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="contact__formulaire__email">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="alain.chaudfontaine@gmail.com" value="<?php echo esc_attr($form_data['email'] ?? ''); ?>">
            <?php if (!empty($errors['email'])): ?>
                <p class="form-error"><?php echo esc_html($errors['email']); ?></p>
            <?php endif; ?>
        </div>
        <div class="contact__formulaire__phone">
            <label for="phone">Numéro de téléphone</label>
            <input type="tel" id="phone" name="phone" placeholder="+32 (0) 85 21 57 52" value="<?php echo esc_attr($form_data['phone'] ?? ''); ?>">
            <?php if (!empty($errors['phone'])): ?>
                <p class="form-error"><?php echo esc_html($errors['phone']); ?></p>
            <?php endif; ?>
        </div>
        <div class="contact__formulaire__sujet">
            <label for="sujet">Sujet de la demande</label>
            <input type="text" id="sujet" name="sujet" placeholder="Faire du bénévolat" value="<?php echo esc_attr($form_data['sujet'] ?? ''); ?>">
            <?php if (!empty($errors['sujet'])): ?>
                <p class="form-error"><?php echo esc_html($errors['sujet']); ?></p>
            <?php endif; ?>
        </div>
        <div class="contact__formulaire__message">
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="6" placeholder="Ecrivez votre message..."><?php echo esc_textarea($form_data['message'] ?? ''); ?></textarea>
            <?php if (!empty($errors['message'])): ?>
                <p class="form-error"><?php echo esc_html($errors['message']); ?></p>
            <?php endif; ?>
        </div>
        <?php if (!empty($errors['spam_detection'])): ?>
            <p class="form-error"><?php echo esc_html($errors['spam_detection']); ?></p>
        <?php endif; ?>
        <?php if (!empty($errors['general'])): ?>
            <p class="form-error"><?php echo esc_html($errors['general']); ?></p>
        <?php endif; ?>
        <input type="text" name="botbait" style="display:none;">
        <button type="submit">Envoyer</button>
    </fieldset>
</form>