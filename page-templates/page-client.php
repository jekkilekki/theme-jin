<?php
/**
 * Template Name: Client Page
 *
 */

get_header(); ?>

<div id="primary" class="content-area archive">
        <main id="main" class="site-main" role="main">

            <header class="page-header page-header-client">
                <?php echo '<h1 class="page-title"><span class="page-title-pre">Client Page:</span>' . get_the_title() . '</h1>'; ?>
            </header>
            

	<div id="primary-right" class="large-3 large-push-9 medium-4 medium-push-8 small-12 columns <?php if (!(have_comments() || comments_open())) : ?> no-comments-area<?php endif; ?>">

			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div>
						<header class="entry-header">
							<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
							<div class="entry-thumbnail">
								<?php the_post_thumbnail(); ?>
							</div>
							<?php endif; ?>
	
							<!--<h1 class="entry-title">
								<a href="<?php //the_permalink(); ?>" rel="bookmark"><span><?php //the_title(); ?></span></a>
							</h1>-->
						</header><!-- .entry-header -->
	
						<div class="entry-content">
							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'portfolio' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
						</div><!-- .entry-content -->
	
						<footer class="entry-footer">
							<?php edit_post_link( __( 'Edit', 'portfolio' ), '<span class="edit-link">', '</span>' ); ?>
						</footer><!-- .entry-meta -->
					</div>
				</article><!-- #post -->
			<?php endwhile; ?>

	</div><!-- #primary-right -->
        
        
        <div id="primary-left" class="archive large-9 large-pull-3 medium-8 medium-pull-4 small-12 columns">
                    
                        <?php
                        echo '<div id="client-projects-container" class="clear">';
                        
                        $client = get_post_meta( $post->ID, 'proto_client', true );
                        
                        $args = array (
                            'order_by'  => 'desc',
                            'tax_query' => array(
                                array(
                                    'taxonomy'  => 'jetpack-portfolio-tag',
                                    'field'     => 'slug',
                                    'terms'     => $client,
                                    )
                                ),
                            'posts_per_page'    => -1,
                        );

                        $query = new WP_Query( $args );

                        // The Loop (load Projects tagged with the specific Jetpack-Portfolio-Tag specified in the Custom Fields for this Page)
                        if ( $query->have_posts() ) {
                            while ( $query->have_posts() ) {
                                $query->the_post();
                                
                                echo '<div class="archive-item small-12 medium-6 large-4 columns">';
                                    get_template_part( 'components/features/portfolio/content', 'portfolio' );
                                echo '</div>';
                                
                            }
                        } else {
                            get_template_part( 'content', 'none' );
                        }
                        // Restore original Post Data
                        wp_reset_postdata();
                        
                        echo '</div>';
                        
                        //get_template_part( 'jetpack', 'testimonial' );
                        // @TODO Write this as a function that will run anywhere - currently only works on singular() pages
                        
                        // Figure out how to get JUST the Testimonial(s) related to THIS particular Client
                        $testimonial = get_the_title();

                        $args = array (
                            'post_type'     => 'jetpack-testimonial',
                            'meta_key'  => 'proto_testimonial',
                            'meta_value'=> $testimonial,
                        );
                        
                        $query = new WP_Query( $args );
                        
                        // The Loop (load the Testimonial with a Custom Field tag for this particular Jetpack-Portfolio-Tag)
                        if ( $query->have_posts() ) {
                            echo '<div id="client-testimonial-container" class="clear">';
                            echo '<div id="client-testimonial" class="entry-content client-page">';
                                while ( $query->have_posts() ) {
                                    $query->the_post();
                                    //$more = 0;
                                    
                                    echo '<div class="testimonial clear">';
                                    echo '<figure class="testimonial-thumb">';
                                    the_post_thumbnail( 'thumbnail' );
                                    echo '</figure>';
                                    echo '<aside class="testimonial-text">';
                                    echo '<div class="testimonial-excerpt">';
                                    
                                    if ( $post->post_excerpt ) {
                                        the_excerpt();
                                        echo '<a class="more-link" href="' . get_permalink() . '">Read More &rarr;</a>';
                                    } else {
                                        the_content();
                                    }
                                    //the_content('Read all &rarr;');
                                    echo '</div>';
                                    echo '<a href="' . get_the_permalink() . '">';
                                    echo '<h3 class="testimonial-name">' . get_the_title() . '</h3>';
                                    echo '</a>';
                                    echo '</aside>';
                                    echo '</div>';
                                }
                                echo '</div>';
                                echo '</div>';
                        }
                        // Restore original Post Data
                        wp_reset_postdata();
                        ?>
			
		
		<?php jin_paging_nav(); ?>
	</div><!-- #primary-left -->
	
	<?php /*comments_template();*/ ?>
        
        </main>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>