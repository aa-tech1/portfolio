<?php
/**
 * functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Adas Personal Portfolio
 */

if (!defined('adas_personal_portfolio_VERSION')) {
	$adas_personal_portfolio_theme = wp_get_theme();
	define('adas_personal_portfolio_VERSION', $adas_personal_portfolio_theme->get('Version'));
}

if ( ! function_exists( 'adas_personal_portfolio_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function adas_personal_portfolio_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on one-elementor, use a find and replace
		 * to change 'adas-personal-portfolio' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'adas-personal-portfolio', get_template_directory() . '/languages' );

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
		
		// Image Size
		add_image_size('adas-personal-portfolio-blog-thumb', 600, 440, true);
		add_image_size('adas-personal-portfolio-blog-single-thumb', 770, 380, true);
		add_image_size('adas-personal-portfolio-product-cat-thumb', 355, 265, true);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'adas-primary' => esc_html__( 'Primary Menu', 'adas-personal-portfolio' ),
				'adas-mobile' => esc_html__( 'Header Menu Mobile', 'adas-personal-portfolio' ),
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
				'adas_personal_portfolio_custom_background_args',
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
		
		/*
		* Enable support for wide alignment class for Gutenberg blocks.
		*/
		add_theme_support( 'align-wide' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );
		
		
	}
endif;
add_action( 'after_setup_theme', 'adas_personal_portfolio_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function adas_personal_portfolio_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Default Sidebar', 'adas-personal-portfolio' ),
			'id'            => 'sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'adas-personal-portfolio' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Archive Sidebar', 'adas-personal-portfolio' ),
		'id'            => 'adas-blog-archive-sidebar',
		'description'   => esc_html__( 'Add archive blog widgets here.', 'adas-personal-portfolio' ),
		'before_widget' => '<div id="%1$s" class="single-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Single Sidebar', 'adas-personal-portfolio' ),
		'id'            => 'adas-blog-single-sidebar',
		'description'   => esc_html__( 'Add single blog widgets here.', 'adas-personal-portfolio' ),
		'before_widget' => '<div id="%1$s" class="single-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'adas_personal_portfolio_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function adas_personal_portfolio_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/resource/css/bootstrap.css', array(), '5.1.3' );
	wp_enqueue_style( 'font-awesome-all', get_template_directory_uri() . '/resource/css/font-awesome-all.css', array(), '6.1.1' );
	wp_enqueue_style( 'theme-default', get_template_directory_uri() . '/resource/css/theme-default.css', array(), '1.0.0' );
	wp_enqueue_style( 'adas-personal-portfolio-style', get_stylesheet_uri(), array(), adas_personal_portfolio_VERSION );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/resource/js/bootstrap.js', array('jquery'), '5.1.3', true );
	wp_enqueue_script( 'adas-personal-portfolio-navigation', get_template_directory_uri() . '/resource/js/navigation.js', array(), adas_personal_portfolio_VERSION, true );
    wp_enqueue_script( 'jquery-masonry' );
	wp_enqueue_script( 'skip-link-js', get_template_directory_uri() . '/resource/js/skip-link-focus-fix.js', array('jquery'), adas_personal_portfolio_VERSION, true );
	wp_enqueue_script( 'active', get_template_directory_uri() . '/resource/js/active.js', array('jquery'), adas_personal_portfolio_VERSION, true );	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'adas_personal_portfolio_scripts' );


/**
 * Theme Functions.
 */
require get_template_directory() . '/includes/custom-header.php';
require get_template_directory() . '/includes/template-tags.php';
require get_template_directory() . '/includes/template-functions.php';
require get_template_directory() . '/includes/tgm/required-plugins.php';
require get_template_directory() . '/includes/customizer.php';
require get_template_directory() . '/includes/adas-theme-font.php';

