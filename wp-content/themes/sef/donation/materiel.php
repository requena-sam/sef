<section id="materiel" class="materiel column">
    <div class="column__content right">
        <h2 role="heading" aria-level="2"><?= get_field('materiel-title', false, false); ?></h2>
        <p><?= get_field('materiel-text'); ?></p>
        <div class="cta_group">
        <a class="primary" href="<?= get_field('materiel-link-url'); ?>"><?= get_field('materiel-link-text'); ?></a>
        </div>
    </div>
    <div class="column__img">
        <img src="<?= get_field('materiel-img'); ?>" alt="Photo d'illustration">
    </div>
</section>