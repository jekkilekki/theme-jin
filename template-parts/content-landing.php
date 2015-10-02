<?php
/**
 * Template part for displaying page content in page-front.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Jin
 */

?>

<section class="hero-unit" <?php if ( get_header_image() ) { ?> style="background: url(<?php header_image(); ?>)" <?php } ?>>
    
    <div class="row">
        <div class="large-12 columns front-title-box">
                <?php the_title( '<h1 class="front-title">', '</h1>' ); ?>
                <?php //the_title( '<h3 class="front-subtitle>', '</h3>' ); ?>
        </div>
        
        <div class="large-12 columns">
            
            <?php wp_nav_menu( array( 
                'theme_location'    => 'front', 
                'menu'              => 'front',
                'menu_id'           => 'front-menu',
                'menu_class'        => 'small-block-grid-2 medium-block-grid-3 flip-cards',
                'fallback_cb'       => false,
                /*, 'depth' => 2*/ 
                ) ); 
            ?>
            
        </div>
        
        <div class="small-12 small-centered medium-6 medium-centered large-3 large-centered columns clients">
            <a href="">
                <h6 class="text-center">CUSTOMIZE OPTION</h6>
                <p class="text-center">
                    <span class="fa-stack">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-angle-right fa-inverse fa-stack-1x"></i>
                    </span>
                </p>
            </a>
        </div>
    </div>

</section>
    
<!-- Original "site-content" div in header.php -->
<div id="content" class="site-content row hub" data-equalizer> <!-- Foundation row start -->
    
    <div id="primary" class="content-area" data-equalizer-watch>
	<main id="main" class="site-main" role="main">

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content large-12 columns">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jin' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

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
        
        </article><!-- #post-## -->

        </main><!-- #main -->
    </div><!-- #primary -->