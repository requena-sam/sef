<section class="services">
    <h2 role="heading" aria-level="2"><?= get_field('services-title', false, false); ?></h2>
    <div class="services__container">
        <?php if (have_rows('services-list')) :
            while (have_rows('services-list')) : the_row();
                $title = get_sub_field('title');
                $text = get_sub_field('text');
                $link_text = get_sub_field('link-text');
                $link_url = get_sub_field('link-url');
                $color = get_sub_field('color');
                ?>
                <article class="services__container__article_<?= $color; ?>">
                    <h3 role="heading" aria-level="3"><?= $title; ?></h3>
                    <p><?= $text; ?></p>
                    <div class="">
                        <a class="btn-arrow" href="<?= $link_url; ?>"
                           title="Vers la page <?= $link_text; ?>"><?= $link_text; ?></a>
                    </div>
                </article>
            <?php endwhile; endif; ?>
    </div>
</section>