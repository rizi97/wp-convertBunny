<?php
/**
 * convertbunny functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package convertbunny
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
function convertbunny_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on convertbunny, use a find and replace
		* to change 'convertbunny' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'convertbunny', get_template_directory() . '/languages' );

    acf_add_options_page(array(
        'page_title'    => 'Theme Options',
        'menu_title'    => 'Theme Options',
        'menu_slug'     => 'theme-options',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
		
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
			'menu-1' => esc_html__( 'Primary', 'convertbunny' ),
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
			'convertbunny_custom_background_args',
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
add_action( 'after_setup_theme', 'convertbunny_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function convertbunny_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'convertbunny_content_width', 640 );
}
add_action( 'after_setup_theme', 'convertbunny_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function convertbunny_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'convertbunny' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'convertbunny' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'convertbunny_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function convertbunny_scripts() {
	wp_enqueue_style( 'convertbunny-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'convertbunny-fonts', get_template_directory_uri() . '/assets/css/fonts.css', array(), _S_VERSION );
	wp_enqueue_style( 'convertbunny-carousel', '//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', array(), _S_VERSION );

	if( isset($_GET['theme_style']) == 'dark' ) {
		wp_enqueue_style( 'convertbunny-custom', get_template_directory_uri() . '/assets/css/dark.css', array(), _S_VERSION );
	}
	else {
		wp_enqueue_style( 'convertbunny-custom', get_template_directory_uri() . '/assets/css/style.css', array(), _S_VERSION );
	}

	wp_enqueue_style( 'convertbunny-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_enqueue_script( 'convertbunny-bootstrap-bundle', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'convertbunny-jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'convertbunny-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'convertbunny-custom', get_template_directory_uri() . '/assets/js/script.js', array(), _S_VERSION, true );

}
add_action( 'wp_enqueue_scripts', 'convertbunny_scripts' );



add_filter('nav_menu_css_class', function ($classes, $item, $args) {
    if( isset($args->add_li_class) ) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}, 1, 3 );


add_filter( 'nav_menu_link_attributes', function($atts) {
	$atts['class'] = "nav-link";
	return $atts;
}, 100, 1 );


add_filter( 'get_custom_logo', function( $html ) {
    $html = str_replace( 'custom-logo-link', 'navbar-brand', $html );
    $html = str_replace( 'custom-logo', 'img-fluid', $html );
    $html = preg_replace('/(width|height)="\d+"\s/', "", $html);
    return $html;
} );



add_action('acf/init', function () {
    remove_filter('acf_the_content', 'wpautop' );
} );