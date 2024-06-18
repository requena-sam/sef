<section class="articles" data-animation="showUp">
    <h2 role="heading" aria-level="2"><?= get_field('articles-title', false, false); ?></h2>
    <div class="articles__container">
        <?php
        $articles = [
            'post_type' => 'actu',
            'posts_per_page' => -1,
            'meta_key' => 'article-date', // Tri par le champ personnalisé 'article-date'
            'orderby' => 'meta_value', // Tri par valeur de champ personnalisé
            'order' => 'DESC', // Du plus récent au plus ancien
        ];

        $posts = get_posts($articles);

        foreach ($posts as $post) :
            $title = get_field('article-title');
            $image = get_field('article-img');
            $intro_text = get_field('article-intro');
            $date = get_field('article-date');
            $category = get_field('article-type');
            ?>
            <article class="articles__container__item">
                <a href="<?= get_permalink(); ?>">
                    <img src="<?= $image; ?>" alt="Image de l'article">
                    <div class="articles__container__item__content">
                        <div class="articles__container__item__content__upper">
                            <span><?= $category; ?></span>
                            <h3><?= $title ?></h3>
                        </div>
                        <div class="articles__container__item__content__text">
                            <p class="text"><?= $intro_text ?></p>
                            <p><?= $date ?></p>
                        </div>

                    </div>
                </a>
            </article>
        <?php
        endforeach;
        ?>
    </div>
</section>