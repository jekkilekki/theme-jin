<?php
/**
 * The template used for displaying testimonials on index view
 *
 * @package Jin
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( '' != get_the_post_thumbnail() ) : ?>
		<div class="testimonial-thumbnail small-4 medium-3 columns">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'jin-portfolio-featured-image' ); ?>
			</a>
		</div>
	<?php endif; ?>

    <section class="testimonial-entry small-8 medium-9 columns">
	<header class="testimonial-entry-header">
		<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>

	</header>
        <div class="entry-content">
            
            <?php the_content(); ?>
            
        </div>
    </section>
</article>
