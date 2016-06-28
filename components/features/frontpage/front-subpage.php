<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Jin
 */

?>
<?php if ( '' != get_the_post_thumbnail() ) : ?>
    <div class="index-post-thumbnail" style="background: url( <?php the_post_thumbnail_url( 'full' ); ?> )">
            <a href="<?php the_permalink(); ?>">
                    <?php //the_post_thumbnail( 'jin-featured-image' ); ?>
            </a>
    </div>
<?php endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <?php 
//    if ( is_page_template( 'page-templates/frontpage-portfolio.php' ) ) {
//        echo '<div class="front-page-page row">';
//    } ?>
    
	<header class="entry-header">
            
                <?php
		if ( is_single() ) {
                        the_title( '<h1 class="entry-title">', '</h1>' );
                } else {
                        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                }
                ?>
            
                <?php if ( ! is_page_template( 'page-templates/frontpage-portfolio.php' ) ) : ?>
                    <?php jin_breadcrumbs(); ?>
                <?php endif; ?>
            
	</header>
	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jin' ),
				'after'  => '</div>',
			) );
		?>
	</div>
    
    <?php 
    // Don't end the article if we want to display child pages too
    // "entry-footer" and </article> are present on that template
    if ( ! is_page_template( 'page-templates/page-child-pages.php' ) && is_user_logged_in() ) : 
    ?>
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
	</footer>
    
    <?php 
//    if ( is_page_template( 'page-templates/frontpage-portfolio.php' ) ) {
//        echo '</div><!-- .front-page-page .row -->';
//    }
    ?>
    
    <?php endif; ?>
</article><!-- #post-## -->
