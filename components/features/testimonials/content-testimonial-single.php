<?php
/**
 * @package Jin
 */

// Access global variable directly to adjust the content width for portfolio single page
if ( isset( $GLOBALS['content_width'] ) ) {
	$GLOBALS['content_width'] = 1100;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
            <?php if ( '' != get_the_post_thumbnail() ) : ?>
    <div class="author-avatar" style="background: url( <?php echo get_the_post_thumbnail_url( $post, 'thumbnail' ); ?> )">
                    </div>
            <?php endif; ?>
	
	<div class="entry-content">
            
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before'   => '<div class="page-links clear">',
				'after'    => '</div>',
				'pagelink' => '<span class="page-link">%</span>',
			) );
		?>
                <?php jin_jetpack_sharing(); ?>
            
        </div>
    
        <footer class="testimonial-footer">
            <?php the_title( '<h3 class="author-title"><span>', '</span></h3>' );
			/* translators: used between list items, there is a space after the comma */
			//$tags_list = get_the_term_list( $post->ID, 'jetpack-portfolio-tag', '', esc_html__( ', ', 'jin' ) );
			//if ( $tags_list ) :
		?>
            
            <?php edit_post_link( esc_html__( 'Edit', 'jin' ), '<p class="show-hide-author label">', '</p>' ); ?>
        </footer>
	
</article><!-- #post-## -->
