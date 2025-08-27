<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wp_modern_starter_main_theme
 */

	// get post metadata
	$hide_featured_img = get_post_meta(get_the_id(), 'hide_featured_img_meta', true);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) :
		?>
		
		<div class="entry-meta">
			<?php
				wp_modern_starter_posted_on();
				wp_modern_starter_posted_by();
			?>
		</div><!-- .entry-meta -->
		
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php
		if ( !$hide_featured_img ) {
			wp_modern_starter_post_thumbnail(); 	
		}	
	?>

	<div class="entry-content">
		<?php
			if ( is_category() || is_archive() ) :
				
				the_excerpt();
				
				else :
					
					the_content(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wp-modern-starter' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						)
					);
				
			endif;
			
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-modern-starter' ),
					'after'  => '</div>',
				)
			);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php wp_modern_starter_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
