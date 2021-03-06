<?php

// Register Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

// Theme configuration
function scratch_setup()
{
    // Document title
    add_theme_support('title-tag');

    // Post thumbnails
    add_theme_support('post-thumbnails');

    // Navigations
    register_nav_menus(
        array(
            'primary' => __('Primary Menu', 'scratch'),
            'social' => __('Social Menu', 'scratch'),
            'categorie' => __('Categorie Menu', 'scratch'),
        )
    );

    // Custom Image sizes
    add_image_size('thumb-555', 555, 410, true);
    add_image_size('thumb-750', 800, 410, true);
    add_image_size('thumb-1920', 1920, 1080, true);
}

add_action('after_setup_theme', 'scratch_setup');

// Styles & scripts
function scratch_scripts()
{

    wp_enqueue_style('googlefont', '//fonts.googleapis.com/css?family=Raleway:500&display=swap');
    wp_enqueue_style('googlefont', '//fonts.googleapis.com/css?family=Raleway:500,700&display=swap');
    wp_enqueue_style('googlefont', '//fonts.googleapis.com/css?family=Playfair+Display&display=swap');
    wp_enqueue_style('forkawesome', 'https://cdn.jsdelivr.net/npm/fork-awesome@1.1.7/css/fork-awesome.min.css');
    wp_enqueue_style('main-style', get_template_directory_uri() . '/css/main.min.css');
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.min.js', 'jquery');
    wp_enqueue_script('slick', get_template_directory_uri() . '/node_modules/slick-carousel/slick/slick.min.js', 'jquery');
}

add_action('wp_enqueue_scripts', 'scratch_scripts');

// Sidebars
function scratch_widgets_init()
{
    register_sidebar(
        array(
            'name' => __('Footer', 'scratch'),
            'id' => 'sidebar-footer',
            'description' => __('Custom Sidebar', 'scratch'),
            'before_widget' => '<section class="widget col-md-6 col-lg-4 d-flex flex-column align-items-center">',
            'after_widget' => "</section>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
    register_sidebar(
        array(
            'name'          => __('Blog Sidebar', 'scratch'),
            'id'            => 'sidebar-1',
            'description'   => __('Add widgets here to appear in your sidebar on blog posts and archive pages.', 'scratch'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}

add_action('widgets_init', 'scratch_widgets_init');

// Excerpt
function scratch_excerpt_more($more)
{
    $more = sprintf(
        '...<br><a class="btn btn-outline-primary read-more" href="%1$s">%2$s</a>',
        get_permalink(get_the_ID()),
        __('Read More', 'scratch')
    );
    return $more;
}
add_filter('excerpt_more', 'scratch_excerpt_more');

/**
 * Archive propriete filtering
 */
add_action('pre_get_posts', 'my_pre_get_posts');

function my_pre_get_posts($query)
{
    // validate
    if (is_admin()) return;

    if (!$query->is_main_query()) return;

    if (is_post_type_archive('propriete')) {

        if (isset($_GET['villes'])) {
            $query->set('meta_key', 'ville');
            $query->set('meta_query', array(
                array(
                    'key'        => 'ville',
                    'value'        => $_GET['villes'],
                    'compare'    => 'IN',
                )
            ));
        }
    }

    // always return
    return;
}


add_filter('get_the_archive_title', 'my_theme_archive_title');
