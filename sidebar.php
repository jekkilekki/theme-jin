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

<aside id="secondary" class="widget-area small-12 medium-4 columns" role="complementary" data-equalizer-watch>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary Foundation .columns end -->
