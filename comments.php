<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Jin
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
        <div class="read-comments">
		<h2 class="comments-title">
			<?php
				printf( // WPCS: XSS OK.
					esc_html( _nx( 'One comment:', '%1$s comments:', get_comments_number(), 'comments title', 'jin' ) ),
					number_format_i18n( get_comments_number() )
				);
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
                                        'avatar_size'=> 80,
				) );
			?>
		</ol><!-- .comment-list -->
        </div><!-- .read-comments -->
        
        <!-- Comment navigation -->
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'jin' ); ?></h2>
			<div class="nav-links" data-equalizer>

                            <div class="nav-previous" data-equalizer-watch><span class="nav-indicator"><?php previous_comments_link( __( '<i class="fa fa-caret-left"></i>Older Comments', 'jin' ) ); ?></span></div>
                            <div class="nav-next" data-equalizer-watch><span class="nav-indicator"><?php next_comments_link( __( 'Newer Comments<i class="fa fa-caret-right"></i>', 'jin' ) ); ?></span></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'jin' ); ?></p>
	<?php endif; ?>
        
        <div class="write-comments">
            
                <?php comment_form(); ?>
            
        </div><!-- .write-comments -->

</div><!-- #comments -->
