<?php
/**
 * Jin functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Jin
 */

if ( ! function_exists( 'jin_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function jin_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Jin, use a find and replace
	 * to change 'jin' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'jin', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'jin' ),
                'social'  => esc_html__( 'Social Menu', 'jin' ),
                'footer'  => esc_html__( 'Footer Menu', 'jin' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
                'gallery',
		'image',
		'video',
		'quote',
		'link',
                'status',
                'audio',
                'chat'
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'jin_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // jin_setup
add_action( 'after_setup_theme', 'jin_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function jin_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'jin_content_width', 640 );
}
add_action( 'after_setup_theme', 'jin_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function jin_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'jin' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
        
        register_sidebar( array(
                'name'          => esc_html__( 'Footer Widgets', 'jin' ),
                'id'            => 'sidebar-footer',
                'description'   => esc_html__( 'Widgets appearing above the footer of the site.', 'jin' ),
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
        ) );
}
add_action( 'widgets_init', 'jin_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function jin_scripts() {
	wp_enqueue_style( 'jin-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jin-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'jin-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'jin_scripts' );

/**
 * Enqueue Foundation scripts and styles.
 * 
 * @link: http://wordpress.tv/2014/06/11/steve-zehngut-build-a-wordpress-theme-with-foundation-and-underscores/
 * @link: http://wordpress.tv/2014/03/31/steve-zehngut-theme-development-with-foundation-framework/
 * @link: http://www.justinfriebel.com/wordpress-underscores-with-the-foundation-framework-116/
 * 

function jin_foundation_enqueue() {
    
        /* Add Foundation 5.5 CSS 
        wp_enqueue_style( 'foundation-normalize', get_stylesheet_directory_uri() . '/foundation/css/normalize.css' );           // Underscores has its own normalize.css, so this is layered on top
        wp_enqueue_style( 'foundation', get_stylesheet_directory_uri() . '/foundation/css/foundation.css', array(), 'all' );    // This is the Foundation CSS
        
        /* Add Custom CSS 
        wp_enqueue_style( 'jin-custom-style', get_stylesheet_directory_uri() . '/jin.css' );
        
        /* Add Foundation JS 
        wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/foundation/js/foundation.min.js', array( 'jquery' ), true );
        wp_enqueue_script( 'foundation-modernizr-js', get_template_directory_uri() . '/foundation/js/vendor/modernizr.js', array( 'jquery' ), true );     // This specifically enqueues modernizr.js which had been unenqueued when doing this using Foundation 5.2
        
        /* Foundation Init JS 
        wp_enqueue_script( 'foundation-init-js', get_template_directory_uri() . '/foundation.js', array( 'jquery' ), true );   // Small (author) customized JS script to start the Foundation library, sitting freely in the Theme folder
        
}
add_action( 'wp_enqueue_scripts', 'jin_foundation_enqueue' );

/**
 * Modify Underscores nav menus to work with Foundation
 
function jin_nav_menu( $menu ) {
    
    $menu = str_replace( 'menu-item-has-children', 'menu-item-has-children has-dropdown', $menu );
    $menu = str_replace( 'sub-menu', 'sub-menu dropdown', $menu );
    return $menu;
    
}
add_filter( 'wp_nav_menu', 'jin_nav_menu' );
*/

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * -----------------------------------------------------------------------------
 * JIN custom functions below
 * -----------------------------------------------------------------------------
 */

/**
 * Load Theme Options file that includes the Theme Customizer and the Theme Options page
 */
//require get_template_directory() . '/inc/theme-options.php';