<?php

function devBlog_featured_image_support() {
    add_theme_support( 'post-thumbnails' );
}

add_action('after_setup_theme', 'devBlog_featured_image_support');

function devBlog_theme_support() {
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'devBlog_theme_support');

function devBlog_custom_logo_setup() {

	$defaults = array(
		'height'               => 30,
		'width'                => 120,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'site-title', 'site-description' ),
		'unlink-homepage-logo' => true, 
	);

	add_theme_support( 'custom-logo', $defaults );

}

add_action( 'after_setup_theme', 'devBlog_custom_logo_setup' );

function devBlog_register_styles() {
    $version = wp_get_theme()->get('Version');
    
    wp_enqueue_style( 
        'devBlog_cssStyles', 
        get_stylesheet_uri(), 
        array("devBlog_bootstrap", 'devBlog_splideCSS'), 
        $version, 
        'all'
    );
    
    wp_enqueue_style( 
        'devBlog_splideCSS', 
        get_parent_theme_file_uri( "./assets/splide-4.1.3/dist/css/splide.min.css" ), 
        array(), 
        "4.1.3", 
        'all'
    );

    wp_enqueue_style( 
        'devBlog_bootstrap', 
        "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css", 
        array(), 
        "5.3.3", 
        'all'
    );
    
}

add_action( 'wp_enqueue_scripts', 'devBlog_register_styles' );

function devBlog_register_scripts() {
    $version = wp_get_theme()->get('Version');

    wp_enqueue_script( 
        "devBlog_indexJS", 
        get_parent_theme_file_uri( './assets/js/index.js' ), 
        array(), 
        $version, 
        true 
    );
    
    wp_enqueue_script( 
        "devBlog_splideJS", 
        get_parent_theme_file_uri( './assets/splide-4.1.3/dist/js/splide.min.js' ), 
        array(), 
        '4.1.3', 
        true 
    );

    wp_enqueue_script( 
        "devBlog_bootstrapJS", 
        "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js", 
        array(), 
        "5.3.3", 
        true
    );

    wp_enqueue_script( 
        "devBlog_popper", 
        "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js", 
        array(), 
        "2.11.8", 
        true
    );
}

add_action( 'wp_enqueue_scripts', 'devBlog_register_scripts' );

function devBlog_register_my_menus() {

    register_nav_menus(
      array(
        'header-menu' => __( 'Header Menu' ),
        'extra-menu' => __( 'Extra Menu' )
       )
     );
   }

add_action( 'init', 'devBlog_register_my_menus' );






function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function add_menu_link_class( $atts, $item, $args ) {
    if (property_exists($args, 'link_class')) {
      $atts['class'] = $args->link_class;
    }
    return $atts;
  }
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );