<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Jin
 */

?>

<section class="<?php if ( is_404() ) { echo 'error-404'; } else { echo 'no-results'; } ?> not-found hentry">
	<header class="entry-header">
		<h1 class="entry-title">
                    <?php 
                    if ( is_404() ) { esc_html_e( 'Nothing Found', 'jin' ); }
                    else if ( is_search() ) { printf( _e( 'Nothing found for <ins>', 'jin' ) . get_search_query() . '</ins>' ); } 
                    else { esc_html_e( 'Nothing found', 'jin' ); }
                    ?>
                </h1>
	</header><!-- .page-header -->

	<div class="entry-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'jin' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_404() ) : ?>
                        
                        <p><?php printf( __( 'Are you lost? Try another search below or click one of the latest posts.', 'jin' ) ); ?></p>
                        <?php get_search_form(); ?>
                             
                <?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'jin' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'jin' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .page-content -->
    </section><!-- .no-results -->

    <?php if ( is_404() || is_search() ) { ?>

            <header class="page-header not-found">
                <h1 class="page-title">Recent Posts:</h1>
            </header>
    

    
            <?php 
                // Get the 5 latest posts
            $args = array(
                'posts_per_page' => 5
            );

            $latest_posts_query = new WP_Query( $args );

            // The Loop
            if ( $latest_posts_query->have_posts() ) {
                while ( $latest_posts_query->have_posts() ) {

                        $latest_posts_query->the_post();
                        
                        // Get standard index page content
                        get_template_part( 'template-parts/content', get_post_format() );
                }
            }
            /* Restore original Post Data */
            wp_reset_postdata();
    }
    ?>
