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

<div id="secondary" class="widget-area small-12 medium-4 columns" role="complementary" data-equalizer-watch> <!-- Foundation .columns start -->
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary Foundation .columns end -->
