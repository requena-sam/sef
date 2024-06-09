<section id="leg" class="leg column">
    <div class="column__content">
        <h2 role="heading" aria-level="2"><?= get_field('leg-title', false, false); ?></h2>
        <?php if (have_rows('leg-infos-list')):
            while (have_rows('leg-infos-list')):
                the_row(); ?>
                <div>
                    <h3><?= get_sub_field('title'); ?></h3>
                    <p><?= get_sub_field('text'); ?></p>
                </div>
            <?php endwhile;endif; ?>
        <div class="cta_group">
            <a class="primary" href="<?= get_field('leg-link-url'); ?>"
               title="Lien vers la page <?= get_field('leg-link-text'); ?>">
                <?= get_field('leg-link-text'); ?>
            </a>
        </div>
    </div>
    <div class="column__img">
        <img src="<?= get_field('leg-img'); ?>" alt="Image illustrative de la section">
    </div>
</section>