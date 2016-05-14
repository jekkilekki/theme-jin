<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Jin
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<?php if ( is_page_template( 'page-templates/page-sidebar-right.php' ) || get_theme_mod( 'layout_setting' ) === 'sidebar-right' ) { ?>
    
    <aside id="secondary" class="widget-area small-12 medium-4 columns sidebar-right" role="complementary" data-equalizer-watch> <!-- Foundation .columns start -->
        
<?php } else if ( is_page_template( 'page-templates/page-sidebar-left.php' ) || get_theme_mod( 'layout_setting' ) === 'sidebar-left' ) { ?>
        
    <aside id="secondary" class="widget-area small-12 medium-4 medium-pull-8 columns sidebar-left" role="complementary" data-equalizer-watch> <!-- Foundation .columns start -->
        
<?php } else if ( is_page_template( 'page-templates/page-no-sidebar.php' ) || get_theme_mod( 'layout_setting' ) === 'no-sidebar' ) { ?>
        
    <aside id="secondary" class="widget-area medium-12 columns no-sidebar" role="complementary" data-equalizer-watch> <!-- Foundation .columns start -->
        
<?php } else if ( is_page_template( 'page-templates/page-full-width.php' ) ) { ?>
        
    <aside id="secondary" class="widget-area medium-12 columns no-sidebar full-width" role="complementary" data-equalizer-watch> <!-- Foundation .columns start -->
        
<?php } else { ?>   
        
    <aside id="secondary" class="widget-area <?php echo get_theme_mod( 'layout_setting', 'no-sidebar' ); ?> medium-12 columns">
        
<?php } ?>
        
<!--<aside id="secondary" class="widget-area small-12 medium-4 columns" role="complementary" data-equalizer-watch>-->
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary Foundation .columns end -->
