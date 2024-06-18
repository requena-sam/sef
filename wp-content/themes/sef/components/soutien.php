<section class="soutien" data-animation="showUp">
    <div class="soutien__container">
        <div class="soutien__container__text">
            <h2 role="heading" aria-level="2"><?= get_field('soutien-title', 'options', false); ?></h2>
            <p><?= get_field('soutien-text', 'options'); ?></p>
        </div>
        <div class="soutien__container__btn cta_group">
            <a class="primary" href="<?= get_field('soutien-link-url', 'options'); ?>"><?= get_field('soutien-link-text', 'options'); ?></a>
        </div>
    </div>
</section>