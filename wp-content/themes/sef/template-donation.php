<?php /* Template Name: Donation page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main>
        <?php get_template_part('donation/main'); ?>
        <?php get_template_part('components/benevole'); ?>
        <?php get_template_part('donation/different-don'); ?>
        <?php get_template_part('donation/monetaire'); ?>
        <?php get_template_part('donation/fiscal'); ?>
        <?php get_template_part('donation/materiel'); ?>
        <?php get_template_part('donation/leg'); ?>
    </main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>