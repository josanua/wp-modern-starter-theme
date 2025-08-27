<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wp_modern_starter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('search-card'); ?>>
	<div class="search-card__content">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="search-card__image">
				<a href="<?php echo esc_url( get_permalink() ); ?>" class="search-card__image-link">
					<?php the_post_thumbnail( 'medium', array( 'class' => 'search-card__thumbnail' ) ); ?>
				</a>
			</div>
		<?php endif; ?>
		
		<div class="search-card__body">
			<header class="search-card__header">
				<?php
				$categories = get_the_category();
				if ( ! empty( $categories ) ) :
				?>
					<div class="search-card__category">
						<a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ); ?>" class="search-card__category-link">
							<?php echo esc_html( $categories[0]->name ); ?>
						</a>
					</div>
				<?php endif; ?>
				
				<?php the_title( sprintf( '<h2 class="search-card__title"><a href="%s" class="search-card__title-link">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				
				<?php if ( 'post' === get_post_type() ) : ?>
					<div class="search-card__meta">
						<div class="search-card__author">
							<?php echo get_avatar( get_the_author_meta( 'ID' ), 24, '', '', array( 'class' => 'search-card__author-avatar' ) ); ?>
							<span class="search-card__author-name"><?php the_author(); ?></span>
						</div>
						<div class="search-card__date">
							<i class="fas fa-calendar"></i>
							<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
						</div>
						<div class="search-card__reading-time">
							<i class="fas fa-clock"></i>
							<span><?php echo esc_html( wp_modern_starter_estimated_reading_time() ); ?> min read</span>
						</div>
					</div>
				<?php endif; ?>
			</header>

			<div class="search-card__excerpt">
				<?php 
				if ( has_excerpt() ) {
					the_excerpt();
				} else {
					echo '<p>' . wp_trim_words( get_the_content(), 25, '...' ) . '</p>';
				}
				?>
			</div>

			<footer class="search-card__footer">
				<a href="<?php echo esc_url( get_permalink() ); ?>" class="search-card__read-more">
					<?php esc_html_e( 'Read More', 'wp-modern-starter' ); ?>
					<i class="fas fa-arrow-right"></i>
				</a>
				
				<?php if ( get_the_tags() ) : ?>
					<div class="search-card__tags">
						<?php
						$tags = get_the_tags();
						$tag_count = 0;
						foreach ( $tags as $tag ) {
							if ( $tag_count >= 3 ) break; // Limit to 3 tags
							echo '<span class="search-card__tag">' . esc_html( $tag->name ) . '</span>';
							$tag_count++;
						}
						?>
					</div>
				<?php endif; ?>
			</footer>
		</div>
	</div>
</article>
