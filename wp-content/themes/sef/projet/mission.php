<section class="mission column" data-animation="showUp">
    <div class="column__content right">
        <h2 role="heading" aria-level="2"><?= get_field('mission-title', false, false); ?></h2>
        <p><?= get_field('mission-text'); ?></p>
        <div class="cta_group">
            <a class="primary" href="<?= get_field('mission-first-link-url'); ?>"><?= get_field('mission-first-link-text'); ?></a>
            <a class="secondary" href="<?= get_field('mission-second-link-url'); ?>"><?= get_field('mission-second-link-text'); ?><span class="icon-arrow-right2"></span></a>
        </div>
    </div>
    <div class="mission__img column__img">
        <img src="<?= get_field('mission-img'); ?>" alt="Image d'introduction">
    </div>
</section>