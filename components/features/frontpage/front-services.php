<?php

                
                //get_service();

//                $output .= '<li class="service medium-4 equally columns">';
//                $output .= '<div class="service-item group">';
//                
//                // Services Featured Image as BG Image
//                if( has_post_thumbnail() ) $output .= '<div class="service-background desaturate" style="background: url( ' . get_the_post_thumbnail_url( $services_query->post, 'large' ) . ' );"></div>';
//                
//                // Services Title
//                $output .= '<div class="services-title">';
//                $output .= '<a class="services-link" href="' . get_permalink() . '" title="Learn more about ' . get_the_title() . '">'; // @TODO sprintf here
//                
//                $output .= get_post_icon( get_the_ID() );
//                
//                $output .= '<h2 class="entry-title">' . get_the_title() . '</h2>';
//                $output .= '</a>';
//                $output .= '</div>';
//                
//                // Services Content
//                $output .= '<div class="services-lede">';
//                the_excerpt();
//                $ouptut .= '</div>';
//                
//                $output .= '</div><!-- .service-item .group -->';
//                $output .= '</li>';
           


                    //get_service();

    //                // Services Featured Image as BG Image
    //                if( has_post_thumbnail() ) $output .= '<div class="service-background desaturate" style="background: url( ' . get_the_post_thumbnail_url( $query->post, 'large' ) . ' );"></div>';
    //
    //                // Services Title
    //                $output .= '<div class="services-title">';
    //                $output .= '<a href="' . get_permalink() . '">';
    //                
    //                $output .= get_post_icon( get_the_ID() );
    //                
    //                $output .= '<h2 class="entry-title">' . get_the_title() . '</h2>';
    //                $output .= '</a>';
    //                $output .= '</div>';
    //
    //                // Services Content
    //                $output .= '<div class="services-lede">';
    //                the_excerpt();
    //                $output .= '</div>';
    //
    //                // View all Services link
    //                $output .= '<a class="button more-link" role="button" href="/services/">' . __( 'View all Services &rarr;', 'jin' ) . '</a>';

                

            //get_service();

            
?>


<li class="service medium-4 equally columns">
    <!--<div class="service-item group">-->
                
        <!-- Services Featured Image as BG Image -->
        <?php if( has_post_thumbnail() ) { ?>
            <div class="service-background desaturate" style="background: url( <?php get_the_post_thumbnail_url( the_post(), 'large' ); ?> );"></div>
        <?php } ?>

        <!-- Services Title -->
        <div class="services-title">
            <a class="services-link" href="<?php get_permalink(); ?>" title="Learn more about <?php get_the_title(); ?>">

                <?php get_post_icon( get_the_ID() ); ?>
                <h2 class="entry-title"><?php get_the_title(); ?></h2>
        
            </a>
        </div>

        <!-- Services Content -->
        <div class="services-lede">
            <?php the_excerpt(); ?>
        </div>

    <!--</div> .service-item .group -->
</li>
