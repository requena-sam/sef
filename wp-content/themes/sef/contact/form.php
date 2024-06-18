<?php
$errors = $_SESSION['form_errors'] ?? [];
unset($_SESSION['form_errors']);
?>

<form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" class="contact__formulaire" data-animation="showUp">
    <input type="hidden" name="action" value="contact_form">
    <fieldset>
        <legend class="hidden">Formulaire de contact</legend>
        <div class="contact__formulaire__np">
            <div class="contact__formulaire__np__name">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" placeholder="Chaudfontaine">
                <?php if (!empty($errors)): ?>
                    <p class="form-error"><?php echo $errors['nom'] ?? ''; ?></p>
                <?php endif; ?>
            </div>
            <div class="contact__formulaire__np__prenom">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" placeholder="Alain">
                <?php if (!empty($errors)): ?>
                    <p class="form-error"><?php echo $errors['prenom'] ?? ''; ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="contact__formulaire__email">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="alain.chaudfontaine@gmail.com">
            <?php if (!empty($errors)): ?>
                <p class="form-error"><?php echo $errors['email'] ?? ''; ?></p>
            <?php endif; ?>
        </div>
        <div class="contact__formulaire__phone">
            <label for="phone">Numéro de téléphone</label>
            <input type="tel" id="phone" name="phone" placeholder="+32 (0) 85 21 57 52 ">
            <?php if (!empty($errors)): ?>
                <p class="form-error"><?php echo $errors['phone'] ?? ''; ?></p>
            <?php endif; ?>
        </div>
        <div class="contact__formulaire__sujet">
            <label for="sujet">Sujet de la demande</label>
            <input type="text" id="sujet" name="sujet" placeholder="Faire du bénévolat">
            <?php if (!empty($errors)): ?>
                <p class="form-error"><?php echo $errors['sujet'] ?? ''; ?></p>
            <?php endif; ?>
        </div>
        <div class="contact__formulaire__message">
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="6" placeholder="Ecrivez votre message..."></textarea>
            <?php if (!empty($errors)): ?>
                <p class="form-error"><?php echo $errors['message'] ?? ''; ?></p>
            <?php endif; ?>
        </div>
        <button type="submit">Envoyer</button>
    </fieldset>
</form>