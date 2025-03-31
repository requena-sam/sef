<section id="monetaire" class="monetaire column" data-animation="showUp">
    <div class="column__content right">
        <h2 role="heading" aria-level="2"><?= get_field('monetaire-title', false, false); ?></h2>
        <p><?= get_field('monetaire-text'); ?></p>
        <div class="cta_group">
            <a class="primary" href="<?= get_field('monetaire-link-url'); ?>"><?= get_field('monetaire-link-text'); ?></a>
        </div>
    </div>
    <div class="column__img">
        <?= wp_get_attachment_image(get_field('monetaire-img'), 'medium') ?>
    </div>
</section>