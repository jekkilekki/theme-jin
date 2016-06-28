<?php
/**
 * The template used for displaying testimonials on index view
 *
 * @package Jin
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'group' ); ?>>

                <div class="testimonial-entry">

                    <div class="entry-content">

                        <?php the_content( 'Read more…' ); ?>

                    </div>
                    
                    <footer class="testimonial-footer">
                            <?php the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><h2 class="entry-title">', '</h2></a>' ); ?>
                    </footer>
                    
                </div><!-- .testimonial-entry -->
</article>
