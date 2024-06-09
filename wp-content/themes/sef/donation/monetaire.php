<section id="monetaire" class="monetaire column">
    <div class="column__content right">
        <h2 role="heading" aria-level="2"><?= get_field('monetaire-title', false, false); ?></h2>
        <p><?= get_field('monetaire-text'); ?></p>
        <div class="cta_group">
            <a class="primary" href="<?= get_field('monetaire-link-url'); ?>"><?= get_field('monetaire-link-text'); ?></a>
        </div>
    </div>
    <div class="column__img">
        <img src="<?= get_field('monetaire-img'); ?>" alt="Photo d'illustration">
    </div>
</section>