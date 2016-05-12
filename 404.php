<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Jin
 */

get_header(); ?>

<?php if ( is_page_template( 'page-templates/page-sidebar-right.php' ) ) { ?>
    
    <div id="primary" class="content-area small-12 medium-8 columns sidebar-right">
        
<?php } else if ( is_page_template( 'page-templates/page-sidebar-left.php' ) ) { ?>
        
    <div id="primary" class="content-area small-12 medium-8 medium-push-4 columns sidebar-left">
        
<?php } else if ( is_page_template( 'page-templates/page-no-sidebar.php' ) ) { ?>
        
    <div id="primary" class="content-area small-12 medium-10 medium-push-1 large-8 large-push-2 columns no-sidebar">
        
<?php } else if ( is_page_template( 'page-templates/page-full-width.php' ) ) { ?>
        
    <div id="primary" class="content-area medium-12 columns no-sidebar page-full-width">
        
<?php } else { ?>   
        
    <div id="primary" class="content-area <?php echo get_theme_mod( 'layout_setting', 'no-sidebar' ); ?> small-12 medium-10 medium-push-1 large-8 large-push-2 columns">
        
<?php } ?>

	<!--<div id="primary" class="content-area small-12 medium-8 columns" data-equalizer-watch>-->
		<main id="main" class="site-main" role="main">

                    <?php get_template_part( 'template-parts/content', 'none' ); ?>
			
		</main>
	</div>
<?php
get_footer();
