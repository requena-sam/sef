<section class="event">
    <h2 role="heading" aria-level="2">Évènements à <em>venir</em></h2>
    <div class="event__container">
        <?php
        $events = [
            'post_type' => 'event',
            'posts_per_page' => -1,
            'meta_key' => 'event-date', // Tri par le champ personnalisé 'article-date'
            'orderby' => 'meta_value', // Tri par valeur de champ personnalisé
            'order' => 'DESC', // Du plus récent au plus ancien
        ];

        $posts = get_posts($events);

        foreach ($posts as $post) :
            $title = get_field('event-title');
            $image = get_field('event-img');
            $intro_text = get_field('event-intro');
            $date = get_field('event-date');
            ?>
            <article class="event__container__article">
                <div class="event__container__article__img">
                <img src="<?= $image; ?>" alt="Image de l'event">
                </div>
                <div class="event__container__article__text">
                    <h3><?= $title ?></h3>
                    <p class="text"><?= $intro_text ?></p>
                    <p><?= $date ?></p>
                </div>
            </article>
        <?php
        endforeach;
        ?>
    </div>
</section>
