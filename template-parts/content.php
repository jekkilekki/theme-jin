<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Jin
 */

?>

<article id="post-<?php the_ID(); ?>">
    
    <div class="<?php if ( !is_singular() ) { echo 'index-'; } else { echo 'single-'; } ?>post">
        
        <?php if ( has_post_thumbnail() ) {
            
            echo '<div class="index-post-thumbnail">';
            echo '<a href="' . get_permalink() . '" title="' . __( 'Click to read ', 'jin' ) . get_the_title() . '" rel="bookmark">';
            echo the_post_thumbnail( 'index-thumb' );
            echo '</a>';
            echo '</div>';
            
        } ?>
    
    <div <?php post_class(); ?>> <!-- create a new div with post classes to allow img above to not be padded/margined -->
    
        <header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php jin_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
                        the_fancy_excerpt( sprintf(
                                /* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'jin' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )  
                        ) );
                
                
//			the_content( sprintf(
//				/* translators: %s: Name of current post. */
//				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'jin' ), array( 'span' => array( 'class' => array() ) ) ),
//				the_title( '<span class="screen-reader-text">"', '"</span>', false )
//			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jin' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php jin_entry_footer(); ?>
	</footer><!-- .entry-footer -->
    </div><!-- end entry classes -->
    </div><!-- end index-post OR single-post -->
</article><!-- #post-## -->
