<section class="main">
    <?php get_template_part('components/alert'); ?>

    <div class="main__content">
        <h2 role="heading" aria-level="2" class="main_title"><?= get_field('actu-main-title', false, false); ?></h2>
        <p><?= get_field('actu-main-text'); ?></p>
        <div class="cta_group">
            <a class="primary" href="<?= get_field('actu-main-first-link-url'); ?>"><?= get_field('actu-main-first-link-text'); ?></a>
            <a class="secondary" href="<?= get_field('actu-main-second-link-url'); ?>"><?= get_field('actu-main-second-link-text'); ?></a>
        </div>
    </div>
    <div class="main__img">
        <img src="<?= get_field('actu-main-illu'); ?>" alt="Image d'introduction">
    </div>
</section>