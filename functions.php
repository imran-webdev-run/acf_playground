<?php
/**
 * ACF Playground functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ACF_Playground
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function acf_playground_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on ACF Playground, use a find and replace
		* to change 'acf_playground' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'acf_playground', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu' => esc_html__( 'Primary', 'acf_playground' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'acf_playground_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'acf_playground_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function acf_playground_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'acf_playground_content_width', 640 );
}
add_action( 'after_setup_theme', 'acf_playground_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function acf_playground_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'acf_playground' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'acf_playground' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'acf_playground_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function acf_playground_scripts() {
	wp_enqueue_style('beausite-font', 'https://db.onlinewebfonts.com/c/81db551dd19e720ed0bc40dbde312130?family=Beausite+Classic+Regular', array(), null );
	wp_enqueue_style('aeonik-font', 'https://db.onlinewebfonts.com/c/d95bf2f30035a050142565e03d44da71?family=Aeonik+Regular+Medium+Pro+Bold', array(), null );
	wp_enqueue_style('canela-font', 'https://db.onlinewebfonts.com/c/19560807c484bbbfcd37de7a0011a829?family=Canela-Light', array(), null );
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/acf-playground-custom-fonts.css', array(), '1.0.0');
	wp_enqueue_style( 'acf-playground-spacer', get_template_directory_uri() . '/assets/css/spacer.css', array(), _S_VERSION );
	wp_enqueue_style( 'acf-playground-utilities', get_template_directory_uri() . '/assets/css/utilities.css', array(), _S_VERSION );
	wp_enqueue_style( 'acf-playground-theme-style', get_template_directory_uri() . '/assets/css/acf-playground-theme-style.css', array(), _S_VERSION );
	
	wp_enqueue_style('acf-playground-style-default',get_stylesheet_uri(), array(), _S_VERSION);

	wp_style_add_data('acf-playground-style-default','rtl','replace');
	
	// Slick Carousel
	wp_enqueue_style( 'slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css' , array(), null	);
	
    wp_enqueue_script( 'slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), null, true );
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'acf_playground_scripts' );

// ACF Option Page
function new_standard_acf_option_pages() {

    if ( function_exists('acf_add_options_page') ) {

        acf_add_options_page(array(
            'page_title' => 'Theme Options',
            'menu_title' => 'Theme Options',
            'menu_slug'  => 'theme-general-settings',
            'capability' => 'edit_posts',
            'redirect'   => false
        ));

        acf_add_options_sub_page(array(
            'page_title'  => 'Theme Header Settings',
            'menu_title'  => 'Site Header',
            'parent_slug' => 'theme-general-settings',
        ));

        acf_add_options_sub_page(array(
            'page_title'  => 'Theme Footer Settings',
            'menu_title'  => 'Site Footer',
            'parent_slug' => 'theme-general-settings',
        ));
    }
}

add_action('acf/init', 'new_standard_acf_option_pages');