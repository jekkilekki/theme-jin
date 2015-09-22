<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Jin
 */

get_header(); ?>

<!-- <div class="row post-listing-padding" data-equalizer> <!-- Foundation .row start -->

	<div id="primary" class="content-area small-12 medium-8 columns" data-equalizer-watch> <!-- Foundation .columns start -->
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>
                    
                        <!--<ul> Possible to put Foundation block grid here, messes up spacing -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
                                
                            <!-- <li> Foundation block grid item start -->
				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>
                            <!-- </li> Foundation block grid item end -->

			<?php endwhile; ?>
                            
                        </ul> <!-- Foundation block grid end -->

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary Foundation .columns end -->

<!-- </div> <!-- Foundation .row end -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
