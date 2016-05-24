<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package Jin
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.me/support/infinite-scroll/
 * See: https://jetpack.me/support/responsive-videos/
 */
function jin_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'footer_widgets'=> 'sidebar-1',
                'container'     => 'post-archives',
		'render'	=> 'jin_infinite_scroll_render',
		'footer'	=> 'colophon',
                'post_per_page' => 8,
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	// Add theme support for Social Menus
	add_theme_support( 'jetpack-social-menu' );

	// Add theme support for site logos
	add_image_size( 'jin-logo', 200, 200 );
	add_theme_support( 'site-logo', array( 'size' => 'jin-logo' ) );

	// Add theme support for JetPack Portfolio
	add_theme_support( 'jetpack-portfolio' );
        
        // Add theme support for JetPack Testimonial
        add_theme_support( 'jetpack-testimonial' );
}
add_action( 'after_setup_theme', 'jin_jetpack_setup' );

/**
 * Add Custom Fields to JetPack Custom Content Types
 */
function jin_jetpack_add_cf_support() {
    add_post_type_support( 'jetpack-portfolio', 'custom-fields' );
    add_post_type_support( 'jetpack-testimonial', 'custom-fields' );
}
add_action( 'init', 'jin_jetpack_add_cf_support' );

/**
 * Make Custom Fields hidden by default in JetPack Portfolios and Testimonials
 * @link    https://www.vanpattenmedia.com/2014/code-snippet-hide-post-meta-boxes-wordpress
 */
function jin_jetpack_default_hide_cf( $hidden, $screen ) {
    // Grab the current post type
    $post_type = $screen->post_type;
    
    // If we're on a 'jetpack-portfolio' or 'jetpack-testimonial'...
    if ( $post_type == 'jetpack-portfolio' || $post_type == 'jetpack-testimonial' ) {
        // Define which meta boxes we wish to hide
        $hidden = array(
                'postcustom',
                'slugdiv'
        );
        // Pass our new defaults onto WordPress
        return $hidden;
    }
    // If we are NOT on a JetPack Custom Content Type, use the original defaults
    return $hidden;
}
add_action( 'default_hidden_meta_boxes', 'jin_jetpack_default_hide_cf', 10, 2 );

/**
 * Custom render function for Infinite Scroll.
 */
function jin_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( is_search() ) :
			get_template_part( 'components/post/content', 'none' );
		else :
                    echo '<div class="archive-item index-post small-12 medium-6 large-3 columns end">';
			get_template_part( 'components/post/content', get_post_format() );
                    echo '</div>';
		endif;
	}
}

/**
 * Return early if Site Logo is not available.
 */
function jin_the_site_logo() {
        if ( function_exists( 'the_custom_logo' ) ) {
                the_custom_logo();
        } else if ( function_exists( 'jetpack_the_site_logo' ) ) {
                jetpack_the_site_logo();
	} else {
                return;
	}
}

if( !function_exists( 'jin_social_menu' ) ) :
function jin_social_menu() {
	if ( ! function_exists( 'jetpack_social_menu' ) ) {
		return;
	} else {
		jetpack_social_menu();
	}
}
endif;

/**
 * Add Post Type Support for JetPack Custom Post Types
 */
function jin_add_jetpack_testimonial_taxonomies() {
    //if( ) {
        register_taxonomy_for_object_type( 'category', 'jetpack-testimonial' );
    //}
}
add_action( 'init', 'jin_add_jetpack_testimonial_taxonomies' );

/**
 * Add Even/Odd classes to various Posts
 * 1. Testimonials
 * 
 * @link    http://www.wpbeginner.com/wp-themes/how-to-add-oddeven-class-to-your-post-in-wordpress-themes/
 */
global $current_class;
$current_class = 'odd';
function jin_odd_even_post_class( $classes ) {
    if( get_post_type( get_the_ID() ) === 'jetpack-testimonial' ) {
        global $current_class;
        $classes[] = $current_class;
        $current_class = ( $current_class == 'odd' ) ? 'even' : 'odd';
    }
    return $classes;
}
add_filter( 'post_class', 'jin_odd_even_post_class' );

/**
 * Move JetPack Share and Like buttons
 * @link https://jetpack.com/2013/06/10/moving-sharing-icons/
 *
function jptweak_remove_share() {
    remove_filter( 'the_content', 'sharing_display',19 );
    remove_filter( 'the_excerpt', 'sharing_display',19 );
    if ( class_exists( 'Jetpack_Likes' ) ) {
        remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
    }
}
add_action( 'loop_start', 'jptweak_remove_share' );

/*
 * Add this in the files where you want Sharing Buttons to appear
 *
if ( function_exists( 'sharing_display' ) ) {
    sharing_display( '', true );
}
 
if ( class_exists( 'Jetpack_Likes' ) ) {
    $custom_likes = new Jetpack_Likes;
    echo $custom_likes->post_likes( '' );
}
 */