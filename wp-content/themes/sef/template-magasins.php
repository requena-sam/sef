<?php /* Template Name: Magasins page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main>
        <?php get_template_part('magasins/main'); ?>
        <?php get_template_part('magasins/magasin'); ?>
        <?php get_template_part('components/soutien'); ?>
    </main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
