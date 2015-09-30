<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Jin
 */

get_header(); ?>

	<div id="primary" class="content-area small-12 medium-8 columns" data-equalizer-watch>
		<main id="main" class="site-main" role="main">

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
