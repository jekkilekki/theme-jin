<?php
/**
 * Template part for displaying single posts.
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
            
                <?php
                if ( 'post' === get_post_type() ) {
                            /* translators: used between list items, there is a space after the comma */
                            $categories_list = get_the_category_list( esc_html__( ', ', 'jin' ) );
                            if ( $categories_list && jin_categorized_blog() ) {
                                    printf( '<div class="cat-links label radius">' . esc_html__( '%1$s', 'jin' ) . '</div>', $categories_list ); // WPCS: XSS OK.
                            }
                }
                ?>
            
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php jin_posted_on(); ?>
		</div><!-- .entry-meta -->
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

	<footer class="entry-footer">
		<?php jin_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

