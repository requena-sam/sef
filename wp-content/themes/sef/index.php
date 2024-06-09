<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main>
        <?php get_template_part('home/main'); ?>
        <?php get_template_part('home/stats'); ?>
        <?php get_template_part('components/benevole'); ?>
        <?php get_template_part('home/faq'); ?>
        <?php get_template_part('home/recents'); ?>
        <?php get_template_part('components/soutien'); ?>
    </main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>