<?php
/**
 * Template Name: Front Page
 *
 * @package Jin
 */
get_header(); ?>


	<div id="primary" class="content-area front-page-portfolio">
		<main id="main" class="site-main large-10 large-push-1 medium-12" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'components/page/content', 'page' ); ?>
			<?php endwhile; ?>

		</main>
            <div class="front-page-portfolio-section">
                
                <?php get_template_part( 'components/features/portfolio/portfolio' ); ?>
                
            </div>
            
	</div>

<?php // get_sidebar(); ?>
<?php get_footer(); ?>
