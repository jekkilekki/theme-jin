<?php
/**
 * The Template for displaying all single projects.
 *
 * @package Jin
 */

get_header(); ?>

	<div id="primary" class="content-area small-12 medium-10 medium-push-1 large-8 large-push-2 columns">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'components/features/portfolio/content', 'portfolio-single' ); ?>
                    
                        <?php jin_author_box(); ?>
			<?php jin_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main>
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>