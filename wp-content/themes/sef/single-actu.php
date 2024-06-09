<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()):
    the_post(); ?>
    <main>
        <section class="single">
            <div class="single__img">
                <img src="<?= get_field('article-img'); ?>" alt="">
            </div>
            <div class="single__header">
                <div class="single__header__first">
                    <h2><?= get_field('article-title'); ?></h2>
                    <span class="single-date"><?= get_field('article-date'); ?></span>
                </div>
                <span><?= get_field('article-type'); ?></span>
            </div>
            <div class="single__content">
                <?php if (have_rows('paragraphes-list')):
                    while (have_rows('paragraphes-list')):
                        the_row(); ?>
                        <p><?= get_sub_field('content'); ?></p>
                    <?php endwhile;endif; ?>
            </div>
        </section>
        <section class="single-event">
            <h2>Un oeil sur le reste de l'actualité</h2>
            <div class="single-event__container">
                <?php
                $articles = [
                    'post_type' => 'actu',
                    'posts_per_page' => 3,
                    'meta_key' => 'article-date',
                    'orderby' => 'meta_value',
                    'order' => 'DESC',
                ];

                $posts = get_posts($articles);

                foreach ($posts as $post) :
                    $title = get_field('article-title');
                    $image = get_field('article-img');
                    ?>
                    <a href="<?= get_permalink(); ?>">
                        <article class="article">
                            <div class="article__img">
                                <img src="<?= $image; ?>" alt="Image de l'article">
                            </div>
                            <h3><?= $title ?></h3>
                        </article>
                    </a>
                <?php
                endforeach;
                ?>
            </div>
        </section>
    </main>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>
