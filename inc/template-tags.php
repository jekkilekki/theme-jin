<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Jin
 */

if ( ! function_exists( 'jin_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function jin_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'jin' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'By %s', 'post author', 'jin' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="byline"> ' . $byline . '</span> / <span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
        
        if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {
                echo ' / <span class="comments-link">';
                comments_popup_link( esc_html__( 'Comment', 'jin' ), esc_html__( '1 Comment', 'jin' ), esc_html__( '% Comments', 'jin' ) );
                echo '</span>';
        }
        
        edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'jin' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		' / <span class="edit-link">',
		'</span>'
	);

}
endif;

if ( ! function_exists( 'jin_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function jin_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'jin' ) );
		if ( $categories_list && jin_categorized_blog() ) {
			printf( '<span class="cat-links">' . $categories_list . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '<li class="label radius">', '</li><li class="label radius">', '</li>' );
		if ( $tags_list ) {
			echo '<ul class="tags-links">' . $tags_list . '</ul>'; // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'jin' ), esc_html__( '1 Comment', 'jin' ), esc_html__( '% Comments', 'jin' ) );
		echo '</span>';
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function jin_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'jin_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'jin_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so jin_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so jin_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in jin_categorized_blog.
 */
function jin_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'jin_categories' );
}
add_action( 'edit_category', 'jin_category_transient_flusher' );
add_action( 'save_post',     'jin_category_transient_flusher' );

/*==============================================================================
 * JIN CUSTOM TAGS BELOW
 =============================================================================*/
/**
 * Fancy excerpts
 * 
 * @link: http://wptheming.com/2015/01/excerpt-versus-content-for-archives/
 */
function the_fancy_excerpt() {
    global $post;
    if ( has_excerpt() ) {
        the_excerpt();
        echo '<div class="continue-reading">';
        echo '<a class="more-link" href="' . get_permalink() . '" title="' . esc_html__( 'Keep Reading ', 'jin' ) . get_the_title() . '" rel="bookmark">Keep Reading</a>'; 
        echo '</div>';
    } elseif ( @strpos ( $post->post_content, '<!--more-->' ) ) {
        the_content();
    } elseif ( str_word_count ( $post->post_content ) < 200 ) {
        the_content();
    } else {
        the_excerpt();
        echo '<div class="continue-reading">';
        echo '<a class="more-link" href="' . get_permalink() . '" title="' . esc_html__( 'Keep Reading ', 'jin' ) . get_the_title() . '" rel="bookmark">Keep Reading</a>'; 
        echo '</div>';
    }
}

/**
 * Prints HTML with post navigation.
 */
function jin_post_navigation() {
    // Don't print empty makrup if there's nowhere to navigate.
    $previous   = ( is_attachment() ) ? get_post ( get_post() -> post_parent ) : get_adjacent_post( false, '', true );
    $next       = get_adjacent_post( false, '', false );
    
    if ( ! $next && !previous ) {
        return;
    }
    ?>
    <nav class="navigation post-navigation" role="navigation">
        <h1 class="screen-reader-text"><?php _e( 'Post navigation', 'jin' ); ?></h1>
        <div class="nav-links" data-equalizer>
                <?php
                        previous_post_link( '<div class="nav-previous" data-equalizer-watch><div class="nav-indicator">' . _x( 'Previous Post:', 'Previous post', 'jin' ) . '</div><h4>%link</h4></div>', '%title' );
                        next_post_link(     '<div class="nav-next" data-equalizer-watch><div class="nav-indicator">'     . _x( 'Next Post:', 'Next post', 'jin' ) . '</div><h4>%link</h4></div>', '%title' );
                ?>
        </div> <!-- .nav-links -->
    </nav> <!-- .navigation -->
    <?php
}

if ( ! function_exists( 'jin_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since Twenty Fourteen 1.0
 *
 * @global WP_Query   $wp_query   WordPress Query object.
 * @global WP_Rewrite $wp_rewrite WordPress Rewrite object.
 */
function jin_paging_nav() {
	global $wp_query, $wp_rewrite;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $wp_query->max_num_pages,
		'current'  => $paged,
		'mid_size' => 2,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '<i class="fa fa-caret-left"></i>&ensp;Previous', 'jin' ),
		'next_text' => __( 'Next&ensp;<i class="fa fa-caret-right"></i>', 'jin' ),
                'type'      => 'list'
	) );

	if ( $links ) :

	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'jin' ); ?></h1>
		<div class="pagination loop-pagination">
			<?php echo $links; ?>
		</div><!-- .pagination -->
	</nav><!-- .navigation -->
	<?php
	endif;
}
endif;