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
		'container' => 'main',
		'render'	=> 'jin_infinite_scroll_render',
		'footer'	=> 'page',
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
			get_template_part( 'components/post/content', 'search' );
		else :
			get_template_part( 'components/post/content', get_post_format() );
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

function jin_social_menu() {
	if ( ! function_exists( 'jetpack_social_menu' ) ) {
		return;
	} else {
		jetpack_social_menu();
	}
}