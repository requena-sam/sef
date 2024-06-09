<?php /* Template Name: Le projet page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main>
        <?php get_template_part('projet/main'); ?>
        <?php get_template_part('projet/mission'); ?>
        <?php get_template_part('projet/services'); ?>
        <?php get_template_part('projet/team'); ?>
    </main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>