<?php
/**
 * Template Name: Front Page
 *
 * @package Jin
 */
?>


<?php

/**
 * The custom template for the one-page style front page. Kicks in automatically
 * @link: http://www.designwall.com/guide/dw-page/ (Good for design ideas)
 * 
 * @TODO: Add CONDITIONAL statements to test for the existence of each of the pages - OR add dummy content to tell people to fill those in
 */

if ( get_theme_mod( 'jin_show_front_page_notifications', '1' ) == '0' ) { ?>
    <style>
        #warnings { display: none; }
    </style>
<?php }

get_header(); ?>

<?php

$incomplete_sections = 0;
$incomplete_section_ids = array();
?>

	<div id="primary" class="content-area front-page<?php if (!(have_comments() || comments_open())) : ?> no-comments-area<?php endif; ?>">
            
                    <?php         
        /**
         * /////////////////////////////////////////////////////////////////////
         * SERVICES SECTION ====================================================
         * /////////////////////////////////////////////////////////////////////
         */
    
                // FIRST QUERY : Get the 'Services' Page
                $query = new WP_Query( 'pagename=services' );

                // If we have a 'Services' page
                if( $query->have_posts() ) { ?>

                    <!-- Begin the 'Services' section -->
                    <section id="services">

                    <?php
                    // SECOND QUERY : Check for Child Pages of 'Services'
                    $services_id = $query->queried_object->ID;

                    $args = array(
                        'post_type'     => 'page',
                        'post_parent'   => $services_id,
                        'posts_per_page'=> 2, // This is the parameter passed in to tell how many Service Child Pages to display
                        'orderby'       => 'rand',
                    );
                    $services_query = new WP_Query( $args );

                    // The Loop : Displays random Services
                    // If there are Child Pages of 'Services'
                    if ( $services_query->have_posts() ) { ?>

                        <!-- Start the 'Services' list -->
                        <ul class="row entry-content services-list archive-list">

                        <?php
                        while ( $services_query->have_posts() ) : $services_query->the_post();

                            echo '<li class="service large-4 medium-6 columns">';
                            get_template_part( 'components/features/frontpage/front', 'services' ); 
                            echo '</li>';

                        endwhile; // END looping through 'Service' Child Pages

                        // wp_reset_postdata();

                        // If we had less than 3 services total (there are empty slots)
//                        if ( $num_services < 3 ) {
//
//                            // Create the THIRD (final) list item
//                            //$output .= '<li class="service equally';
//                            //$output .= 'medium-4 columns">'; // Here I want to determine if it should be 1/3, 2/3, or 3/3 spread
//
//                            //$output .= '</li>';
//
//                        } // END third (final) list item

                    } else { // No Posts in the Services Child Pages query

                        // Get the 'Services' Page
                        $query->the_post();
                        
                        echo '<li class="service large-12 columns">';
                        get_template_part( 'components/features/frontpage/front', 'services' );
                        echo '</li>';

                        $incomplete_sections++;
                        $incomplete_section_ids[] = '<a href="#">' . __( 'Pages: Individual Service Pages', 'jin' ) . '</a>';

                    }
                    
                    // This is our original Query - the 'Services' Page
                    while ( $query->have_posts() ) : $query->the_post();
                        
                        echo '<li class="service large-4 medium-12 columns">';
                        get_template_part( 'components/features/frontpage/front', 'services' );
                        echo '</li>';
                        
                    endwhile; 

                    // Restore original Post Data (SECOND LOOP)
                    wp_reset_postdata();
                    ?>
                   
                    </ul><!-- .services-list -->

                    </section><!-- #services -->

                <?php
                } else { // No 'Services' Page

                    // (else) Restore original Post Data (FIRST LOOP)
                    wp_reset_postdata();

                    $incomplete_sections++;
                    $incomplete_section_ids[] = '<a href="#">' . __( 'Page: Services', 'jin' ) . '</a>';

                } 
                ?>
                        
                    <?php    
        /**
         * /////////////////////////////////////////////////////////////////////
         * CLIENTS SECTION =====================================================
         * /////////////////////////////////////////////////////////////////////
         */                 
                    
                /*
                 * CLIENTS LOOP : Get (up to 6) individual Client Pages
                 */
                $query = new WP_Query( 'pagename=clients' );

                if ( $query->have_posts() ) { ?>
                    <section id="clients">    
                    
                        <?php
                        $clients_id = $query->queried_object->ID;

                        // Get the children of the clients page
                        $args = array(
                            'post_type'     => 'page',
                            'post_parent'   => $clients_id,
                            'posts_per_page'=> 6,
                            'order_by'      => 'rand'
                        );
                        $clients_query = new WP_Query( $args );

                        // The Loop
                        if ( $clients_query->have_posts() ) {
                            echo '<h3 class="widget-title front-page-title"><a href="/clients/">' . __( 'Clients', 'jin' ) . '</a></h3>';
                            echo '<ul class="clients-list entry-content row">';
                            while ( $clients_query->have_posts() ) : $clients_query->the_post();

                                get_template_part( 'components/features/frontpage/front', 'clients' );

                            endwhile;
                            echo '</ul>';

                        } else {
                            // No 'Clients' Child Pages found
                            $incomplete_sections++;
                            $incomplete_section_ids[] = '<a href="#">' . __( 'Pages: Individual Client Pages', 'jin' ) . '</a>';
                        } ?>
                    
                        <!--<a class="button more-link" role="button" href="/clients/"><?php // _e( 'View full list of Clients &rarr;', 'jin' ); ?></a>-->
                    </section><!-- #clients -->
                
                <?php
                } else {
                    // No 'Clients' Page found
                    $incomplete_sections++;
                    $incomplete_section_ids[] = '<a href="#">' . __( 'Page: Clients', 'jin' ) . '</a>';
                }
                // Restore original Post Data
                wp_reset_postdata();
                ?>
                        
                        
                    <?php
        /**
         * /////////////////////////////////////////////////////////////////////
         * HOME SECTION ========================================================
         * /////////////////////////////////////////////////////////////////////
         */
                    ?>
        <!-- BEGIN main page content -->
        <div class="front-page-page row">
                        
                    <?php
                    while ( have_posts() ) : the_post();

                        get_template_part( 'components/page/content', 'page' );

                    endwhile;
                    
                    // Restore original Post Data
                    wp_reset_postdata();
                    ?>
                        
                          
                    <?php             
        /**
         * /////////////////////////////////////////////////////////////////////
         * ABOUT SECTION =======================================================
         * /////////////////////////////////////////////////////////////////////
         */                    
                    $query = new WP_Query( 'pagename=about' );

                    // The Loop
                    if ( $query->have_posts() ) {
                        ?>

                        <section id="about">         

                        <?php
                        while ( $query->have_posts() ) {
                            
                            $query->the_post();
                            get_template_part( 'components/features/frontpage/front', 'subpage' );

                        }
                        ?>

                        </section><!-- #about -->       

                    <?php 
                    } else {

                        $incomplete_sections++;
                        $incomplete_section_ids[] = '<a href="#">' . __( 'Page: About', 'jin' ) . '</a>';
                    }
                    // Restore original Post Data
                    wp_reset_postdata();
                    ?>
                        
        </div>
        <!-- END main page content -->        
                        
                    <?php
        /**
         * /////////////////////////////////////////////////////////////////////
         * PROJECTS SECTION ====================================================
         * /////////////////////////////////////////////////////////////////////
         */
                    $args = array(
                        'posts_per_page'    => 16,
                        'orderby'           => 'desc',
                        'post_type'         => 'jetpack-portfolio'
                    );

                    $query = new WP_Query( $args );

                    // The Loop
                    if ( $query->have_posts() ) { ?>
                        <section id="latest-projects" class="group">

                            <h2 class="widget-title front-page-title"><a href="/portfolio/"><?php _e( 'Latest Projects', 'jin' ); ?></a></h2>
                            <div class="front-page-projects archive row">

                            <?php  
                            while ( $query->have_posts() ) : $query->the_post();
                                echo '<div class="archive-item index-post small-12 medium-6 large-3 columns">';
                                    /*
                                     * Include the Post-Format-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                     */
                                    get_template_part( 'components/features/portfolio/content', 'portfolio' );
                                echo '</div>';
                            endwhile;
                            ?>

                            </div>
                            <a class="button more-link" role="button" href="/portfolio/"><?php _e( 'View Full Portfolio &rarr;', 'jin' ); ?></a>
                        </section><!-- #latest-work -->

                    <?php
                    } else {
                        $incomplete_sections++;
                        $incomplete_section_ids[] = '<a href="#">' . __( 'Jetpack Portfolio Projects', 'jin' ) . '</a>';
                    }
                    // Restore original Post Data
                    wp_reset_postdata();
                    ?>

                            
                    <?php
        /**
         * /////////////////////////////////////////////////////////////////////
         * TESTIMONIALS SECTION ======================================
         * /////////////////////////////////////////////////////////////////////
         */        
                    
                /**
                 * BEGIN TESTIMONIALS SECTION =======================================
                 */
                    
                    /*
                     * LOOP : Gets (up to) 8 individual testimonials
                     */
                    $args = array(
                        'posts_per_page'    => 10,
                        'orderby'           => 'rand',
                        'post_type'         => 'jetpack-testimonial',
                    );

                    $query = new WP_Query( $args );

                    //The Loop
                    if ( $query->have_posts() ) { ?>
                        
                        <section id="testimonials">
                            <div class="testimonials entry-content row">
                            <ul class="testimonial-thumbnails">
                                        <li class="testimonial-thumb">
                            <?php
                            while ( $query->have_posts() ) : $query->the_post();
                            
                                if ( '' != get_the_post_thumbnail() ) : ?>
                                    
                                            <a href="<?php the_permalink(); ?>" class="<?php echo is_page_template( 'page-templates/frontpage-portfolio.php' ) ? 'medium-12 columns' : 'medium-3 columns'; ?>">
                                                <div class="testimonial-thumbnail" style="background: url( <?php echo get_the_post_thumbnail_url( $post, 'thumbnail' ); ?> )">
                                                        <?php echo the_title( '<span class="screen-reader-text">', '</span>', false ); ?>
                                                </div>
                                            </a>
                                        
                                <?php
                                endif;

                            endwhile; ?>
                                            
                                            </li>
                                    </ul>
                                
                            
                            <?php
                            while ( $query->have_posts() ) : $query->the_post();
                            
                                get_template_part( 'components/features/frontpage/front', 'testimonials' );
                                
                            endwhile;
                            ?>
                                
                            </div>
                        </section><!-- #testimonials -->
                        
                    <?php
                    } else {
                        
                        $incomplete_sections++;
                        $incomplete_section_ids[] = '<a href="#">' . __( 'Jetpack Testimonials', 'jin' ) . '</a>';
                    }
                    // Restore original Post Data
                    wp_reset_postdata();

        /**
         * /////////////////////////////////////////////////////////////////////
         * BLOG SECTION ========================================================
         * /////////////////////////////////////////////////////////////////////
         */     

                    $sticky = get_option( 'sticky_posts' );
                    $sticky_num = count($sticky);
                    $pages_to_retrieve = 8 - $sticky_num;

                    $args = array(
                        'posts_per_page'    => $pages_to_retrieve,
                        'orderby'           => 'rand',
                        'post_type'         => 'post',
                    );

                    $query = new WP_Query( $args );

                    // The Loop
                    if ( $query->have_posts() ) { ?>

                        <section id="blog">
                            <h2 class="widget-title front-page-title"><a href="/blog/"><?php _e( 'Latest Articles', 'jin' ); ?></a></h2>
                            <div class="front-page-blog archive row">

                            <?php
                            while( $query->have_posts() ) : $query->the_post();

                                echo '<div class="archive-item index-post small-12 medium-6 large-3 columns">';
                                get_template_part( 'components/post/content', get_post_format() );
                                echo '</div>';

                            endwhile;
                            ?>
                                
                            </div>
                            <a class="button more-link" role="button" href="/blog/"><?php _e( 'See More Articles &rarr;', 'jin' ); ?></a>
                        </section><!-- #blog -->

                    <?php
                    } else {
                        get_template_part( 'components/post/content', 'none' );

                        $incomplete_sections++;
                        $incomplete_section_ids[] = '<a href="#">' . __( 'Blog', 'jin' ) . '</a>';
                    }
                    // Restore original Post Data
                    wp_reset_postdata();

        /**
         * /////////////////////////////////////////////////////////////////////
         * CONTACT SECTION =====================================================
         * /////////////////////////////////////////////////////////////////////
         */                
                    $query = new WP_Query( 'pagename=contact' );

                    // The Loop
                    if ( $query->have_posts() ) { ?>

                        <section id="contact">
                        
                            <?php
                            while ( $query->have_posts() ) : $query->the_post();
                                echo '<h2 class="page-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
                                echo '<div class="entry-content row">';

                                get_template_part( 'components/features/frontpage/front', 'subpage' );

                                echo '</div>';
                            endwhile;
                            ?>
                        
                        </section><!-- #contact -->
                    
                    <?php
                    } else {

                        $incomplete_sections++;
                        $incomplete_section_ids[] = '<a href="#">' . __( 'Page: Contact', 'jin' ) . '</a>';
                    }
                    // Restore original Post Data
                    wp_reset_postdata();
                  
        /**
         * /////////////////////////////////////////////////////////////////////
         * WARNINGS SECTION ====================================================
         * /////////////////////////////////////////////////////////////////////
         */   
                    if ( $incomplete_sections > 0 ) {
                        echo '<section id="warnings">';
                        
                        echo '<h2 class="page-title">' . __( 'Notifications', 'jin' ) . '</h2>';
                        echo '<div class="entry-content row">';
                        echo "<h4>You have $incomplete_sections incomplete Front Page sections.</h4>"; // @TODO sprintf here
                        echo '<p>Click any of the links to <u>learn how to complete that section</u> OR <a href="#">turn off notifications in the Theme Customizer</a>:'; // @TODO sprintf here
                        echo '<ol>';
                        foreach( $incomplete_section_ids as $incomplete_section_id ) {
                            echo "<li>$incomplete_section_id</li>";
                        }
                        echo '</ol>';
                        echo '</div>';
                        
                        echo '</section>';
                    } 
                    ?>
                    
	</div><!-- #primary -->

<?php get_footer(); ?>