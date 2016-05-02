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

<?php // Add custom code to handle the sidebar - right, left, none, full-width-page ?>
    
<?php if ( is_page_template( 'page-templates/page-sidebar-right.php' ) ) { ?>
    
    <div id="page" class="site sidebar-right">
        
<?php } else if ( is_page_template( 'page-templates/page-sidebar-left.php' ) ) { ?>
        
    <div id="page" class="site sidebar-left">
        
<?php } else if ( is_page_template( 'page-templates/page-no-sidebar.php' ) ) { ?>
        
    <div id="page" class="site no-sidebar">
        
<?php } else if ( is_page_template( 'page-templates/page-full-width.php' ) ) { ?>
        
    <div id="page" class="site no-sidebar page-full-width">
        
<?php } else { ?>   
        
    <div id="page" class="site <?php echo get_theme_mod( 'layout_setting', 'no-sidebar' ); ?>">
        
<?php } ?>
    
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'jin' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
            
            <div class="row"> <!-- Start Foundation row -->
	
		<?php // get_template_part( 'components/header/header', 'image' ); // Moved to navigation-top.php ?>
		
		<?php jin_the_site_logo(); ?>

		<?php get_template_part( 'components/navigation/navigation', 'top' ); ?>
		
		<?php // jin_social_menu(); ?>
                
            </div> <!-- End Foundation row -->
	
	</header>
        
	<?php if ( !is_page_template( 'page-templates/page-landing.php' ) ) { ?>
        
                <div id="content" class="site-content row" data-equalizer> <!-- Foundation row start -->
                    
        <?php } ?>