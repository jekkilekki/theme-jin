<?php
/**
 * The template used for displaying testimonials on index view
 *
 * @package Jin
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'group' ); ?>>
	<?php if ( '' != get_the_post_thumbnail() ) : ?>
                <a href="<?php the_permalink(); ?>" class="medium-3 columns">
                    <div class="testimonial-thumbnail" style="background: url( <?php echo get_the_post_thumbnail_url( $post, 'thumbnail' ); ?> )">
                            <?php echo the_title( '<span class="screen-reader-text">', '</span>', false ); ?>
                    </div>
                </a>
                <div class="testimonial-entry medium-9 columns">
	<?php else : ?>
                <div class="testimonial-entry">
        <?php endif; ?>
                    
                    <header class="testimonial-entry-header">
                            <?php 
                            if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
                            } 
                            ?>
                    </header>

                    <div class="entry-content">

                        <?php 
                        
                        the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'jin' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
                        
                        ?>

                    </div>
                    
                    <footer class="testimonial-footer">
                        <?php
                        if ( ! is_single() ) {
                            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                        } 
                        ?>
                    </footer>
                    
                </div><!-- .testimonial-entry -->
</article>
