<section class="main">
    <?php get_template_part('components/alert'); ?>

    <div class="main__content"  data-animation="showUp">
        <h1 role="heading" aria-level="1" class="main_title"><?= get_field('accommodation-main-title', false, false); ?></h1>
        <p><?= get_field('accommodation-main-text'); ?></p>
        <div class="cta_group">
            <a class="primary" href="<?= get_field('accommodation-main-first-link-url'); ?>"><?= get_field('accommodation-main-first-link-text'); ?></a>
            <a class="secondary" href="<?= get_field('accommodation-main-second-link-url'); ?>"><?= get_field('accommodation-main-second-link-text'); ?><span class="icon-arrow-right2"></span></a>
        </div>
    </div>
    <div class="main__img"  data-animation="showUp">
        <?= wp_get_attachment_image(get_field('accommodation-main-illu'), 'medium') ?>
    </div>
</section>