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
                    ?>
                    <section id="services">
                        
                    <?php
                        /*
                         * FIRST LOOP : Get (random) Children of the Services page
                         */
                        $query = new WP_Query( 'pagename=services' );
                        
                        if( $query->have_posts() ) {
                        $services_id = $query->queried_object->ID;
                    
                        $args = array(
                            'post_type'     => 'page',
                            'post_parent'   => $services_id,
                            'posts_per_page'=> 2,
                            'orderby'       => 'rand',
                        );
                        $services_query = new WP_Query( $args );

                        // The Loop
                        // Only displays 2 random Services
                        if ( $services_query->have_posts() ) {
                            echo '<ul class="row entry-content services-list archive-list">';
                            while ( $services_query->have_posts() ) {
                                $services_query->the_post();
                                
                                $icon = '';
                                $icon = get_post_meta( get_the_ID(), 'proto_fa_icon', true );
                                
                                
                                echo '<li class="service medium-4 columns">';
                                echo '<div class="services-title">';
                                echo '<a class="services-link" href="' . get_permalink() . '" title="Learn more about ' . get_the_title() . '">'; // @TODO sprintf here
                                if ( $icon != '' ) {
                                    echo "<span class='fa $icon'></span>";
                                } else {
                                    the_post_thumbnail( 'thumb' );
                                }
                                echo '<h3 class="entry-title">' . get_the_title() . '</h3>';
                                echo '</a>';
                                echo '</div>';
                                echo '<div class="services-lede">';
                                the_excerpt();
                                echo '</div>';
                                echo '</li>';
                            }
                            
                            // (if) Restore original Post Data (FIRST LOOP)
                            wp_reset_postdata();
                            
                            /*
                             * SECOND LOOP : Get Services Page
                             */
                            // Link to the full page of Services
                            //$query = new WP_Query( 'pagename=services' );
                            //$services_id = $query->queried_object->ID;

                            // The Loop
                            //if ( $query->have_posts() ) { 
                            ?>
                                
                                <li class="service medium-4 columns">

                                <?php
                                while ( $query->have_posts() ) {
                                    $query->the_post();
                                    echo '<div class="services-title">';
                                    echo '<a href="' . get_permalink() . '"><h3 class="entry-title">' . get_the_title() . '</h3></a>';
                                    echo '</div>';
                                    echo '<div class="services-lede">';
                                    the_excerpt();
                                    echo '</div>';
                                    echo '<a class="button more-link" role="button" href="/services/">' . __( 'View all Services &rarr;', 'jin' ) . '</a>';
                                } 
                                
                                ?>
                            
                                </li>
                                
                            <?php 
                            } else {
                                // No Posts in the Services Child Pages query
                                $incomplete_sections++;
                                $incomplete_section_ids[] = '<a href="#">' . __( 'Pages: Individual Service Pages', 'jin' ) . '</a>';
                            }
                            
                            // Restore original Post Data (SECOND LOOP)
                            wp_reset_postdata();
                            echo '</ul>';
                            
                        } else {
                            // No Service Page
                            // (else) Restore original Post Data (FIRST LOOP)
                            wp_reset_postdata();
                            
                            echo '<h4 class="warning-title">' . __( 'No Services Found', 'jin' ) . '</h4>';
                            echo '<p class="warning-message"><a href="#">Create some Service pages here</a> or <a href="#">learn how to here.</a></p>'; // @TODO sprintf here
                        
                            $incomplete_sections++;
                            $incomplete_section_ids[] = '<a href="#">' . __( 'Page: Services', 'jin' ) . '</a>';
                        } 

                        ?>
                 
                        </section><!-- #services -->
                        
                        
                    <?php             
        /**
         * /////////////////////////////////////////////////////////////////////
         * CLIENTS SECTION =====================================================
         * /////////////////////////////////////////////////////////////////////
         */                 
                    ?>
                    <section id="clients">
                    <?php
                    /*
                     * THIRD LOOP : Get (up to 6) individual Client Pages
                     */
                    $query = new WP_Query( 'pagename=clients' );
                    
                    if ( $query->have_posts() ) {
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
                        while ( $clients_query->have_posts() ) {
                            $clients_query->the_post();

                            echo '<li class="clear small-4 medium-3 large-2 columns">';
                            echo '<a class="clients-link" href="' . get_permalink() . '" title="See all Projects for ' . get_the_title() . '">'; // @TODO sprintf here
                            echo '<figure class="client-figure">';
                            the_post_thumbnail( 'medium', array( 'class' => 'desaturate' ) );
                            echo '</figure>';
                            echo '<h3 class="entry-title">' . get_the_title() . '</h3>';
                            echo '</a>';
                            echo '</li>';
                        }
                        echo '</ul>';

                    } else {
                        
                        $incomplete_sections++;
                        $incomplete_section_ids[] = '<a href="#">' . __( 'Pages: Individual Client Pages', 'jin' ) . '</a>';
                    }
                    } else {
                        // No Clients Page found
                        
                        echo '<h4 class="warning-title">' . __( 'No Clients Page Found', 'jin' ) . '</h4>';
                        echo '<p class="warning-message"><a href="#">Create you main Client Page here</a> or <a href="#">learn how to here.</a></p>'; // @TODO sprintf here

                        $incomplete_sections++;
                        $incomplete_section_ids[] = '<a href="#">' . __( 'Page: Clients', 'jin' ) . '</a>';
                    }
                    // Restore original Post Data
                    wp_reset_postdata();
                    ?>

                    <!--<a class="button more-link" role="button" href="/clients/"><?php // _e( 'View full list of Clients &rarr;', 'jin' ); ?></a>-->
                    </section><!-- #clients -->
                        
                        
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
                            
                            get_template_part( 'components/page/content', 'landing' );
//                            $more = 0;
//                            echo '<h2 class="page-title"><a href="' . get_permalink() . '">' . get_the_title(). '</a></h2>';
//                            echo '<figure class="front-right">';
//                            the_post_thumbnail( 'large' );
//                            echo '</figure>';
//                            echo '<div class="entry-content front-left row">';
//                            
//                            the_content();
//                            
//                            echo '</div>';
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
                    if ( $query->have_posts() ) {
                        echo '<section id="latest-projects" class="group">';

                        echo '<h2 class="widget-title front-page-title"><a href="/portfolio/">' . __( 'Latest Projects', 'jin' ) . '</a></h2>';
                        echo '<div class="front-page-projects archive row">';
                          
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
                        
                        echo '</div>';

                        echo '<a class="button more-link" role="button" href="/portfolio/">' . __( 'View Full Portfolio &rarr;', 'jin' ) . '</a>';
                        echo '</section><!-- #latest-work -->';

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
                    ?>
                    <section id="testimonials">

                    <?php
//                    while ( $query->have_posts() ) {
//                        $query->the_post();
//                        $more = 0;      // Set (inside the loop) to display content above the more tag
//                        echo '<h2 class="page-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
//                        echo '<div class="entry-content row">';
//                        the_content('');
//                        echo '</div>';
//                    }
                
                    /*
                     * SECOND LOOP : Gets (up to) 8 individual testimonials
                     */
                    $args = array(
                        'posts_per_page'    => 8,
                        'orderby'           => 'rand',
                        'post_type'         => 'jetpack-testimonial',
                    );

                    $query = new WP_Query( $args );

                    //The Loop
                    if ( $query->have_posts() ) {

                        echo '<div class="testimonials entry-content row">';
                        while ( $query->have_posts() ) {
                            $query->the_post();

                            echo '<div class="testimonial equally clear widget medium-6 columns">';
                            echo '<figure class="testimonial-thumb">';
                            //echo '<div class="los1">';
                            the_post_thumbnail( 'thumbnail' );
                            //echo '</div>';
                            echo '</figure>';
                            echo '<aside class="testimonial-text">';
                            echo '<div class="testimonial-excerpt">';
                          
                            the_fancy_excerpt();

                            echo '<a href="' . get_the_permalink() . '">';
                            echo '<h3 class="testimonial-name">' . get_the_title() . '</h3>';
                            echo '</a>';
                            echo '</div>';
                            echo '</aside>';
                            echo '</div>';
                        }
                        echo '</div>';
                    } else {
                        
                        $incomplete_sections++;
                        $incomplete_section_ids[] = '<a href="#">' . __( 'Jetpack Testimonials', 'jin' ) . '</a>';
                    }
                    // Restore original Post Data
                    wp_reset_postdata();
                    ?>
                    
                    </section><!-- #testimonials -->
    
                        
                <?php
        /**
         * /////////////////////////////////////////////////////////////////////
         * BLOG SECTION ========================================================
         * /////////////////////////////////////////////////////////////////////
         */     
                ?>
                    
                    <section id="blog">
                            
                            <?php
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
                            if ( $query->have_posts() ) {
                                echo '<h2 class="widget-title front-page-title"><a href="/blog/">' . __( 'Latest Articles', 'jin' ) . '</a></h2>';
                                echo '<div class="front-page-blog archive row">';
				
                                while( $query->have_posts() ) {
                                    $query->the_post();
                                    
                                    echo '<div class="archive-item index-post small-12 medium-6 large-3 columns">';
                                    get_template_part( 'components/post/content', get_post_format() );
                                    echo '</div>';

                                }
                                echo '</div>';
                                
                            } else {
                                get_template_part( 'components/post/content', 'none' );
                                
                                $incomplete_sections++;
                                $incomplete_section_ids[] = '<a href="#">' . __( 'Blog', 'jin' ) . '</a>';
                            }
                            // Restore original Post Data
                            wp_reset_postdata();
                            ?>
                        
                        <a class="button more-link" role="button" href="/blog/"><?php _e( 'See More Articles &rarr;', 'jin' ); ?></a>
                    </section>
                        
                     
                    <?php
        /**
         * /////////////////////////////////////////////////////////////////////
         * CONTACT SECTION =====================================================
         * /////////////////////////////////////////////////////////////////////
         */                
                    $query = new WP_Query( 'pagename=contact' );

                    // The Loop
                    if ( $query->have_posts() ) {

                        echo '<section id="contact">';
                        
                        while ( $query->have_posts() ) {
                            $query->the_post();
                            echo '<h2 class="page-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
                            echo '<div class="entry-content row">';
                            
                            the_content();
                            
                            echo '</div>';
                        }
                        
                        echo '</section><!-- #contact -->';
                        
                    } else {

                        $incomplete_sections++;
                        $incomplete_section_ids[] = '<a href="#">' . __( 'Page: Contact', 'jin' ) . '</a>';
                    }
                    // Restore original Post Data
                    wp_reset_postdata();

                    ?>
                        
                        
                    <?php                    
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