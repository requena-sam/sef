<section class="contact__info">
    <div class="contact__info__header" data-animation="showUp">
        <h2>
            <?= get_field('contact-title', false, false); ?>
        </h2>
        <p>
            <?= get_field('contact-content'); ?>
        </p>
    </div>
    <ul  data-animation="showUp">
        <li class="contact-phone"><a href="tel:<?= get_field('contact-phone'); ?>"><?= get_field('contact-phone'); ?></a></li>
        <li class="contact-email"><a href="mailto:<?= get_field('contact-email'); ?>"><?= get_field('contact-email'); ?></a></li>
        <li class="contact-address"><?= get_field('contact-address'); ?></li>
    </ul>
</section>