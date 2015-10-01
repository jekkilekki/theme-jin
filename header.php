<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Jin
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'jin' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
            
            <div class="row"> <!-- Start Foundation row -->
                
                <!-- Changed from original Underscores to fit Foundation's classes
		<div class="site-branding">
		
		</div><!-- .site-branding -->
                <div class="fixed contain-to-grid large-12 columns">
		<nav id="site-navigation" class="main-navigation top-bar" role="navigation" data-topbar>
                    <ul class="site-branding title-area">
                        <li class="name">
                            <?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                            <?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                            <?php endif; ?>
                            <p class="site-description"><?php bloginfo( 'description' ); ?></p>
                        </li>
                        
                        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
                    </ul>
                    
                    <section class="top-bar-section">
                        
                        <!-- Right Nav Section -->
                        <ul class="right">
                            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu'/*, 'depth' => 2*/ ) ); ?>
                            <div id="search-container">
                                <div class="search-box clear">
                                    <?php get_search_form(); ?>
                        
                                </div>
                            </div>
                            <div class="search-toggle">
                                <i class="fa fa-search"></i>
                                <a href="#search-container" class="screen-reader-text"><?php _e( 'Search', 'jin' ); ?></a>
                            </div>
                        </ul>
                
                
                        
                    </section>
                    
                        <!-- Original Underscores stuff - menu was here originally too
                        <h1 class="screen-reader-text">Main Navigation</h1>
                        <div class=""navicon closed"><i class=""fa fa-navicon"></i></div>
                        -->
                        
		</nav><!-- #site-navigation -->
                </div>
                
            </div> <!-- End Foundation row -->
            
	</header><!-- #masthead -->

	<div id="content" class="site-content row" data-equalizer> <!-- Foundation row start -->
