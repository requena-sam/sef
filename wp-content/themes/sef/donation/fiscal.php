<section class="column" data-animation="showUp">
    <div class="column__content">
        <h2 role="heading" aria-level="2"><?= get_field('fiscal-title', false, false); ?></h2>
        <p><?= get_field('fiscal-text'); ?></p>
        <?php if (have_rows('fiscal-infos-list')):
            while (have_rows('fiscal-infos-list')):
                the_row(); ?>
                <div>
                    <h3><?= get_sub_field('title'); ?></h3>
                    <p><?= get_sub_field('text'); ?></p>
                </div>
            <?php endwhile;endif; ?>
    </div>
    <div class="column__img">
        <?= wp_get_attachment_image(get_field('fiscal-img'), 'medium') ?>
    </div>
</section>