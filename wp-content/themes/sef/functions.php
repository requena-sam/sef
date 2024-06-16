<?php
require_once 'ContactForm.php';
// Démarrer la session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Charger les fichiers de traduction :
load_theme_textdomain('dw', __DIR__ . '/locales');

// Désactiver l'éditeur de texte Gutenberg de Wordpress :
add_filter('use_block_editor_for_post', '__return_false');

// Enregistrer des menus de navigation :
register_nav_menu('main', 'Navigation principale, en-tête du site');
register_nav_menu('footer', 'Navigation de pied de page');

// Enregistrer un "type de contenu" personnalisé
register_post_type('actu', [
    'label' => 'Articles',
    'description' => 'Les actus du SEF',
    'public' => true,
    'menu_position' => 20,
    'menu_icon' => 'dashicons-portfolio',
    'supports' => ['title', 'thumbnail', 'editor'],
]);

register_post_type('event', [
    'label' => 'Évènements',
    'description' => 'Les évèvenements à venir du SEF',
    'public' => true,
    'menu_position' => 20,
    'menu_icon' => 'dashicons-groups',
    'supports' => ['title', 'thumbnail', 'editor'],
]);

register_post_type('message', [
    'label' => 'Message de contact',
    'description' => 'Messages envoyés via le formulaire de contact.',
    'public' => true,
    'menu_position' => 20,
    'menu_icon' => 'dashicons-email', // https://developer.wordpress.org/resource/dashicons
    'supports' => ['title', 'editor'],
]);

// Fonctions propres au thème :

// 1. Charger un fichier "public" (asset/image/css/script/...) pour le front-end.
function dw_asset(string $file): string
{
    return get_template_directory_uri() . '/public/' . $file;
}

// 2. Retrouver les éléments d'un menu pour une location donnée
function dw_get_navigation_links(string $location): array
{
    // Pour $location, retrouver le menu.
    $locations = get_nav_menu_locations();
    $menuId = $locations[$location] ?? null;

    // Au cas où il n'y a pas de menu assignés à $location, renvoyer un tableau de liens vide.
    if (is_null($menuId)) {
        return [];
    }

    // Pour ce menu, récupérer les liens
    $items = wp_get_nav_menu_items($menuId);

    // Formater les liens en objets pour ne garder que "URL" et "label" comme propriétés
    foreach ($items as $key => $item) {
        $items[$key] = new stdClass();
        $items[$key]->url = $item->url;
        $items[$key]->label = $item->title;
    }

    // Retourner le tableau de liens formatés
    return $items;
}

// Retrouver les langues définies dans Polylang afin de pouvoir les exploiter dans un menu par exemple :
function dw_get_languages(): array
{
    $languages = [];

    $polylangs = pll_the_languages(['echo' => false, 'raw' => true]);

    foreach ($polylangs as $code => $polylang) {
        $lang = new stdClass();
        $lang->url = $polylang['url'];
        $lang->current = $polylang['current_lang'];
        $lang->label = $polylang['name'];
        $lang->code = $code;
        $lang->locale = $polylang['locale'];

        $languages[] = $lang;
    }

    return $languages;
}

// Fonction permettant d'inclure un composant
function dw_component(string $component, array $arguments = []): void
{
    if (!($path = realpath(__DIR__ . '/components/' . $component . '.php'))) {
        // Le chemin vers le component n'existe pas.
        throw new \Exception('Component "' . $component . '" is not defined.');
    }

    extract($arguments);

    include($path);
}

// Ajout d'image sous format SVG et WEBP
add_filter('upload_mimes', 'capitaine_mime_types');
add_filter('wp_check_filetype_and_ext', 'capitaine_file_types', 10, 4);

// Autoriser l'import des fichiers du type SVG et WEBP
function capitaine_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    $mimes['webp'] = 'image/webp';
    return $mimes;
}

// Contrôle de l'import d'un WEBP
function capitaine_file_types($types, $file, $filename, $mimes)
{
    if (str_contains($filename, '.webp')) {
        $types['ext'] = 'webp';
        $types['type'] = 'image/webp';
    }
    return $types;
}

//Ajouter à ACF les options pages
if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
}
// Ajoute une indication visuelle pour le type de publication personnalisé dans le menu
function add_custom_post_type_indicator_to_menu() {
    $post_type = 'message';
    $post_count = wp_count_posts($post_type)->publish;
    $menu_slug = 'edit.php?post_type=' . $post_type;

    foreach ( $GLOBALS['menu'] as $key => $menu_item ) {
        if ( $menu_item[2] === $menu_slug ) {
            $GLOBALS['menu'][$key][0] .= " <span class='update-plugins count-{$post_count}'><span class='plugin-count'>{$post_count}</span></span>";
            break;
        }
    }
}

// Ajoute cette fonction à l'action admin_menu pour la déclencher lors du chargement du menu d'administration
add_action( 'admin_menu', 'add_custom_post_type_indicator_to_menu' );
//Rendre l'acces impossible aux messages utilisateurs
add_action('template_redirect', 'restrict_message_pages');
function restrict_message_pages()
{
    if (is_singular('message')) {
        wp_redirect(home_url());
        exit;
    }
}

//Restriction de l'accès à l'administration
add_action('admin_init', 'restrict_all_users');
function restrict_all_users()
{
    //remove_menu_page('index.php'); // Dashboard
    remove_menu_page('edit.php'); // Posts
    remove_menu_page('upload.php'); // Media
    remove_menu_page('edit-comments.php'); // Comments
    /*remove_menu_page('plugins.php'); // Plugins
    remove_menu_page('tools.php'); // Tools
    remove_menu_page('options-general.php'); // Settings
    remove_menu_page('edit.php?post_type=acf-field-group'); // ACF
    remove_menu_page('options-general.php?page=options-framework'); // Options*/
}
add_filter('acf_the_content', 'my_acf_the_content_filter', 10, 1);

function my_acf_the_content_filter($value) {
    // Supprimer automatiquement les balises <p> ajoutées par WordPress
    remove_filter('acf_the_content', 'autopsy');

    return $value;
}
function dw_is_active(string $path): string
{
    return wp_get_canonical_url() === $path ? 'active' : '';
}
