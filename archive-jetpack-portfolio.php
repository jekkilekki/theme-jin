<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Jin
 */

get_header(); ?>

	<div id="primary" class="content-area archive archive-portfolio large-12 columns">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php   
                                    echo '<h1 class="page-title">';
                                    post_type_archive_title( 'All ' );
                                    echo '</h1>';
                                    the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header>
			<?php
			/* Start the Loop */
                        echo '<section class="group">';
                        
			while ( have_posts() ) : the_post();
                            echo '<div class="archive-item index-post small-12 medium-6 large-3 columns">';
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'components/features/portfolio/content', 'portfolio' );
                            echo '</div>';
			endwhile;
                        
                        echo '</section>';

                        jin_paging_nav();
			// the_posts_navigation();

		else :

			get_template_part( 'components/post/content', 'none' );

		endif; ?>

		</main>
	</div>
<?php
get_sidebar();
get_footer();