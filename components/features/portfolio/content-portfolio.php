<?php
/**
 * The template used for displaying projects on index view
 *
 * @package Jin
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php
            if ( '' != get_the_post_thumbnail() ) { ?> style="background: white url(<?php echo the_post_thumbnail_url( 'jin-featured-image' ); ?>);" <?php } ?>>
    <div class="post-content <?php echo has_post_thumbnail ? 'post-thumbnail' : ''; ?>">
	<header class="portfolio-entry-header">
		<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>

		<?php echo get_the_term_list( get_the_ID(), 'jetpack-portfolio-type', '<span class="portfolio-entry-meta">', esc_html_x(', ', 'Used between list items, there is a space after the comma.', 'jin' ), '</span>' ); ?>
	</header>
        <div class="entry-content">
            
            <?php the_fancy_excerpt(); ?>
            
        </div>
    </div>
</article>
