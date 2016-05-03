<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Jin
 */

get_header(); ?>

	<div id="primary" class="content-area small-12 medium-8 columns" data-equalizer-watch>
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'components/post/content', get_post_format() );

			jin_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main>
	</div>
<?php
get_sidebar();
get_footer();
