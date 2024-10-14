<section class="different column" data-animation="showUp">
    <div class="column__content">
        <h2 role="heading" aria-level="2"><?= get_field('different-title', false, false); ?></h2>
        <p><?= get_field('different-text'); ?></p>
        <div class="cta_group">
            <a class="primary" href="<?= get_field('different-first-link-url'); ?>"><?= get_field('different-first-link-text'); ?></a>
            <a class="secondary" href="<?= get_field('different-second-link-url'); ?>"><?= get_field('different-second-link-text'); ?><span class="icon-arrow-right2"></span></a>
        </div>
    </div>
    <div>
        <ul>
            <li data-animation="showUp">
                <a href="#monetaire">
                    <article>
                        <h3 role="heading" aria-level="3"><?= get_field('different-first-type-title'); ?></h3>
                        <p><?= get_field('different-first-type-text'); ?></p>
                    </article>
                </a>
            </li>
            <li data-animation="showUp">
                <a href="#materiel">
                    <article>
                        <h3 role="heading" aria-level="3"><?= get_field('different-second-type-title'); ?></h3>
                        <p><?= get_field('different-second-type-text'); ?></p>
                    </article>
                </a>
            </li>
            <li data-animation="showUp">
                <a href="#leg">
                    <article>
                        <h3 role="heading" aria-level="3"><?= get_field('different-third-type-title'); ?></h3>
                        <p><?= get_field('different-third-type-text'); ?></p>
                    </article>
                </a>

            </li>
        </ul>
    </div>
</section>