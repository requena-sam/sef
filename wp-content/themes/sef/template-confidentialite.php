<?php /* Template Name: Confidentialite page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main>
        <section class="confidential">
            <h2 role="heading" aria-level="2">Politique de <em>confidentialité</em></h2>
            <p class="update-date">Derniere mise à jour le : 9 Juin 2024 à 12h47</p>
            <?php if (have_rows('confidentiale-list')):
                while (have_rows('confidentiale-list')): the_row(); ?>
                    <div class="confidential__paragraphe">
                        <h3 role="heading" aria-level="3"><?= get_sub_field('title'); ?></h3>
                        <p>
                            <?= get_sub_field('text'); ?>
                        </p>
                    </div>
                <?php endwhile; endif; ?>
        </section>
    </main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>