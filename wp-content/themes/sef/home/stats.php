<section class="stats" data-animation="showUp">
    <h2 aria-level="2" role="heading"><?= get_field('home-stats-title', false, false); ?></h2>
    <ul class="stats__list">
        <?php if (have_rows('home-stats-list')) :
        while (have_rows('home-stats-list')) :
        the_row();
        $link_text = get_sub_field('stat-link-text');
        ?>
        <li class="stats__list__item">
            <div class="stats__list__item__card">
                <div class="stats__list__item__card__upper">
                    <span><?= get_sub_field('stat-number'); ?></span>
                    <h3><?= get_sub_field('stat-title'); ?></h3>
                </div>
                <hr>
                <p><?= get_sub_field('stat-text'); ?></p>
                <div>
                    <a class="btn-arrow" href="<?= get_sub_field('stat-link-url'); ?>"
                       title="Vers la page <?= $link_text; ?>"><?= $link_text; ?>
                    </a>
                </div>
            </div>
            <?php endwhile;
            endif; ?>
        </li>
    </ul>

</section>