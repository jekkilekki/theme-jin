<?php
/**
 * Template Name: Front Page
 */

get_header(); ?>

<section class="hero-unit" <?php if ( get_header_image() ) { ?> style="background: url(<?php header_image(); ?>)" <?php } ?>>
    
       

</section>
    
    <!-- Original "site-content" div in header.php -->
    <div id="content" class="site-content row" data-equalizer> <!-- Foundation row start -->
    
	<div id="primary" class="content-area small-12 columns" data-equalizer-watch>
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
