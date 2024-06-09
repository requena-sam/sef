<?php /* Template Name: Hébergements page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main>
        <?php get_template_part('accommodation/main') ?>
        <?php get_template_part('accommodation/houses') ?>
        <?php get_template_part('components/soutien') ?>
    </main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>