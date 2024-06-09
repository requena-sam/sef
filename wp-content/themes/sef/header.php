<!DOCTYPE html>
<html lang="fr-BE">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Meta donnée du site -->
    <meta name="author" content="Sam Requena">
    <meta name="title" content="<?= get_bloginfo('title');?>">
    <meta name="keywords"
          content="SEF, Service d'entraide familiale, ASBL, Huy ,Hébergement d'urgence, Sans-abri, Aide aux personnes sans domicile fixe, Logement temporaire, Réinsertion sociale, Solidarité, Services sociaux, Soutien aux sans-abri, Accompagnement des personnes en situation de précarité, Centre d'accueil, Solutions de logement alternatives, Prévention de l'exclusion sociale, Hébergement d'urgence pour les SDF, Assistance aux personnes en situation de sans-abrisme, Intégration sociale, Logement transitoire, Accès au logement, Services d'hébergement pour les plus démunis, Insertion professionnelle, Réduction de la pauvreté">
    <meta name="description"
          content="Site non-officiel de l'ASBL Service d'entraide familiale situé à Huy">

    <!-- Profil details -->
    <meta property="profile:first_name" content="Sam">
    <meta property="profile:last_name" content="Requena">
    <!-- Link css -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="<?= dw_asset('css/site.css') ?>">
    <!-- Link js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>

    <!-- Title -->
    <title>
        <?php
        get_bloginfo('name');
        ?>
    </title>
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
    <h1 class="hidden" role="heading" aria-level="1">SEF</h1>
    <?php get_template_part('components/navigation'); ?>
</header>

