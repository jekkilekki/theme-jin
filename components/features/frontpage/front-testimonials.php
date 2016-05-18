<?php
/**
 * The template used for displaying testimonials on index view
 *
 * @package Jin
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'group' ); ?>>

                <div class="testimonial-entry">
                    
                    <?php if ( is_single() ) { ?>
                    <header class="testimonial-entry-header">
                            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    </header>
                    <?php } ?>

                    <div class="entry-content">

                        <?php 
                        
                        if ( is_page_template( 'page-templates/frontpage-portfolio.php' ) ) {
                            the_fancy_excerpt();
                        } else {
                        
                        the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'jin' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
                        
                        }
                        
                        ?>

                    </div>
                    
                    <?php if ( ! is_single() ) { ?>
                    <footer class="testimonial-footer">
                            <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                    </footer>
                    <?php } ?>
                    
                </div><!-- .testimonial-entry -->
</article>
