<!DOCTYPE html>
<html lang="fr-BE">
<head>
	<?php wp_head(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="google-site-verification" content="zReiMYjyVtHdBRT5TDHjav7xtIz2sPLaXPBVDnPAZHw" />

    <!-- Meta donnée du site -->
    <meta name="author" content="Sam Requena">

    <!-- Link css -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="<?= dw_asset('css/site.css') ?>">
    <link rel="stylesheet" href="https://i.icomoon.io/public/temp/999cde8d00/UntitledProject/style.css">
    <link rel="canonical" href="<?php echo esc_url( get_permalink() ); ?>" />
    <!-- Link js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
</head>
<body itemscope itemtype="https://schema.org/Person">
<noscript>
    <p class="no-js__message">
        Pour accéder à toutes les fonctionnalités de ce site, vous devez activer JavaScript.<br>
        Voici les <a href="https://www.enable-javascript.com/fr/" title="vers le site enable-javascript">instructions
            pour activer JavaScript dans votre navigateur Web</a>.
    </p>
</noscript>
<header role="banner">
    <?php get_template_part('components/navigation'); ?>
</header>

