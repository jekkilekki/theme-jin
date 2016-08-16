<?php

                
                //get_service();
//$output = '';
//
//                $output .= '<li class="service medium-4 equally columns">';
//                $output .= '<div class="service-item group">';
//                
//                // Services Featured Image as BG Image
//                if( has_post_thumbnail() ) $output .= '<div class="service-background desaturate" style="background: url( ' . get_the_post_thumbnail_url( $post, 'large' ) . ' );"></div>';
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
//                $output .= '</div>';
//                
//                $output .= '</div><!-- .service-item .group -->';
//                $output .= '</li>';
//                
//                echo $output;
           
?>

    <div class="service-item group">
                
        <!--Services Featured Image as BG Image--> 
        <?php if( has_post_thumbnail() ) { ?>
            <div class="service-background desaturate" style="background: url( <?php the_post_thumbnail_url( 'large' ); ?> );"></div>
        <?php } ?>

        <!--Services Title--> 
        <div class="services-title">
            <a class="services-link" href="<?php the_permalink(); ?>" title="Learn more about <?php the_title(); ?>">

                <?php the_post_icon(); ?>
                <h2 class="entry-title"><?php the_title(); ?></h2>
        
            </a>
        </div>

        <!--Services Content--> 
        <div class="services-lede">
            <?php the_excerpt(); ?>
        </div>
        
        <a class="button more-link" role="button" href="<?php the_permalink(); ?>"><?php _e( 'Learn More &rarr;', 'jinn' ); ?></a>

    </div><!-- .service-item .group -->
