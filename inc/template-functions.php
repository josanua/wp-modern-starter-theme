<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package wp_modern_starter
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function wp_modern_starter_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'wp_modern_starter_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function wp_modern_starter_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'wp_modern_starter_pingback_header' );

/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wp_modern_starter_excerpt_more( $more ) {
	if ( ! is_single() ) {
		$more = sprintf( 
			'<a class="read-more" href="%1$s">%2$s</a>',
			get_permalink( get_the_ID() ),
			__( ' Read More..', 'wp-modern-starter' )
		);
	}

	return $more;
}
//add_filter( 'excerpt_more', 'wp_modern_starter_excerpt_more' );

function wp_modern_starter_deactivate_excerpt_more( $more ) {
	return '';// Remove the "Read More" link entirely
}
add_filter( 'excerpt_more', 'wp_modern_starter_deactivate_excerpt_more' );

function wp_modern_starter_custom_excerpt_length($length) {
	return 32; // Limit excerpt to 20 words
}
add_filter('excerpt_length', 'wp_modern_starter_custom_excerpt_length');

/**
 * Calculate estimated reading time for a post
 *
 * @param int $post_id Post ID (optional, defaults to current post)
 * @return int Estimated reading time in minutes
 */
function wp_modern_starter_estimated_reading_time( $post_id = null ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}
	
	$content = get_post_field( 'post_content', $post_id );
	$word_count = str_word_count( wp_strip_all_tags( $content ) );
	$reading_time = ceil( $word_count / 200 ); // Assuming 200 words per minute
	
	return max( 1, $reading_time ); // Minimum 1 minute
}

/**
 * Get post views count
 *
 * @param int $post_id Post ID (optional, defaults to current post)
 * @return string Formatted views count
 */
function wp_modern_starter_get_post_views( $post_id = null ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}
	
	$views = get_post_meta( $post_id, 'post_views_count', true );
	if ( ! $views ) {
		$views = 0;
	}
	
	// Format large numbers
	if ( $views >= 1000 ) {
		return number_format( $views / 1000, 1 ) . 'K';
	}
	
	return number_format( $views );
}

/**
 * Track post views
 */
function wp_modern_starter_track_post_views( $post_id ) {
	if ( ! is_single() ) {
		return;
	}
	
	if ( empty( $post_id ) ) {
		global $post;
		$post_id = $post->ID;
	}
	
	$views = get_post_meta( $post_id, 'post_views_count', true );
	$views = $views ? $views : 0;
	$views++;
	
	update_post_meta( $post_id, 'post_views_count', $views );
}
// Track views on single post pages
add_action( 'wp_head', function() {
	if ( is_single() ) {
		wp_modern_starter_track_post_views( get_the_ID() );
	}
});

/**
 * Get related posts based on categories and tags
 *
 * @param int $post_id Current post ID
 * @param int $limit Number of posts to return
 * @return array Array of related posts
 */
function wp_modern_starter_get_related_posts( $post_id, $limit = 3 ) {
	$categories = wp_get_post_categories( $post_id );
	$tags = wp_get_post_tags( $post_id, array( 'fields' => 'ids' ) );
	
	$args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => $limit,
		'post__not_in' => array( $post_id ),
		'meta_key' => 'post_views_count',
		'orderby' => 'meta_value_num date',
		'order' => 'DESC',
	);
	
	// Priority: posts with same categories
	if ( ! empty( $categories ) ) {
		$args['category__in'] = $categories;
	}
	
	$related_posts = get_posts( $args );
	
	// If not enough posts, get posts with same tags
	if ( count( $related_posts ) < $limit && ! empty( $tags ) ) {
		$remaining = $limit - count( $related_posts );
		$exclude_ids = array_merge( array( $post_id ), wp_list_pluck( $related_posts, 'ID' ) );
		
		$tag_args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page' => $remaining,
			'post__not_in' => $exclude_ids,
			'tag__in' => $tags,
			'orderby' => 'date',
			'order' => 'DESC',
		);
		
		$tag_posts = get_posts( $tag_args );
		$related_posts = array_merge( $related_posts, $tag_posts );
	}
	
	// If still not enough, get recent posts from same author
	if ( count( $related_posts ) < $limit ) {
		$remaining = $limit - count( $related_posts );
		$exclude_ids = array_merge( array( $post_id ), wp_list_pluck( $related_posts, 'ID' ) );
		
		$author_args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page' => $remaining,
			'post__not_in' => $exclude_ids,
			'author' => get_post_field( 'post_author', $post_id ),
			'orderby' => 'date',
			'order' => 'DESC',
		);
		
		$author_posts = get_posts( $author_args );
		$related_posts = array_merge( $related_posts, $author_posts );
	}
	
	return array_slice( $related_posts, 0, $limit );
}

/**
 * Get post likes count
 *
 * @param int $post_id Post ID
 * @return int Number of likes
 */
function wp_modern_starter_get_post_likes( $post_id ) {
	$likes = get_post_meta( $post_id, 'post_likes_count', true );
	return $likes ? $likes : 0;
}
