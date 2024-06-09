<?php /* Template Name: Actualites page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main>
        <?php get_template_part('actu/main'); ?>
        <?php get_template_part('actu/actualités'); ?>
        <?php get_template_part('actu/event'); ?>
        <?php get_template_part('components/soutien'); ?>
    </main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>