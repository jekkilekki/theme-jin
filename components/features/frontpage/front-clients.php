<?php    

?>
        <li class="clear small-4 medium-3 large-2 columns">
            <a class="clients-link" href="<?php get_permalink(); ?>" title="See all Projects for <?php get_the_title(); ?>">
                <figure class="client-figure">
                    <?php if ( has_post_thumbnail() ) the_post_thumbnail( 'medium', array( 'class' => 'desaturate' ) ); ?>
                </figure>
                <h3 class="entry-title"><?php get_the_title(); ?></h3>
            </a>
        </li>