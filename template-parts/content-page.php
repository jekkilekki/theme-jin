<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Jin
 */

?>

<?php 
        if ( has_post_thumbnail() ) {
            echo '<div class="single-post-thumbnail clear">';
            echo the_post_thumbnail( 'full' );
            echo '</div>';
        }
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jin' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

        <?php if ( is_user_logged_in() ) : ?>
	<footer class="entry-footer">
		<?php
                        edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'jin' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
        <?php endif; ?>
</article><!-- #post-## -->

