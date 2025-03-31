<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()):
    the_post(); ?>
    <main>
        <section class="single" data-animation="showUp">
            <div class="single__img">
                <?= wp_get_attachment_image(get_field('article-img'), 'large') ?>
            </div>
            <div class="single__header">
                <div class="single__header__first">
                    <h1><?= get_field('article-title'); ?></h1>
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
        <section class="single-event" data-animation="showUp">
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
                                <?= wp_get_attachment_image($image, 'large') ?>                            </div>
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
