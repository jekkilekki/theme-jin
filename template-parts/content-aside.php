<?php
/**
 * Template part for displaying Aside posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Jin
 */

?>

<article id="post-<?php the_ID(); ?>">
    
    <div <?php post_class(); ?>> <!-- create a new div with post classes to allow img above to not be padded/margined -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'jin' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>
	</div><!-- .entry-content -->
        
        <header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                <?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php jin_posted_on(); ?>
		</div><!-- .entry-meta -->
                <?php endif; ?>
	</header><!-- .entry-header -->

	<footer class="entry-footer">
		<?php jin_entry_footer(); ?>
	</footer><!-- .entry-footer -->
    </div><!-- end entry classes -->
</article><!-- #post-## -->
