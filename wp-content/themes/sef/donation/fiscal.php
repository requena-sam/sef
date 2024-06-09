<section class="column">
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
        <img src="<?= get_field('fiscal-img'); ?>" alt="Image illustrative de la section">
    </div>
</section>