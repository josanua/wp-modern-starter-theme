<?php
/**
 * Template part for displaying archive posts in card format
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wp_modern_starter
 */

// Get post metadata
$hide_featured_img = get_post_meta( get_the_id(), 'hide_featured_img_meta', true );
$reading_time = wp_modern_starter_estimated_reading_time( get_the_ID() );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'archive-card' ); ?>>
	<div class="archive-card__content">
		<?php if ( has_post_thumbnail() && !$hide_featured_img ) : ?>
			<div class="archive-card__image">
				<a href="<?php echo esc_url( get_permalink() ); ?>" class="archive-card__image-link">
					<?php 
						the_post_thumbnail( 'medium', array( 
							'class' => 'archive-card__thumbnail',
							'loading' => 'lazy'
						) ); 
					?>
				</a>
				
				<!-- Category Badge -->
				<?php $categories = get_the_category(); ?>
				<?php if ( ! empty( $categories ) ) : ?>
					<div class="archive-card__categories">
						<?php foreach ( array_slice( $categories, 0, 2 ) as $category ) : ?>
							<a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" 
							   class="archive-card__category">
								<?php echo esc_html( $category->name ); ?>
							</a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="archive-card__body">
			<!-- Post Meta -->
			<div class="archive-card__meta">
				<time class="archive-card__date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
					<i class="fas fa-calendar-alt"></i>
					<?php echo esc_html( get_the_date() ); ?>
				</time>
				<?php if ( $reading_time ) : ?>
					<span class="archive-card__reading-time">
						<i class="fas fa-clock"></i>
						<?php printf( esc_html__( '%d min read', 'wp-modern-starter' ), $reading_time ); ?>
					</span>
				<?php endif; ?>
				<?php if ( comments_open() || get_comments_number() ) : ?>
					<span class="archive-card__comments">
						<i class="fas fa-comments"></i>
						<?php comments_number( '0', '1', '%' ); ?>
					</span>
				<?php endif; ?>
			</div>

			<!-- Post Title -->
			<header class="archive-card__header">
				<h2 class="archive-card__title">
					<a href="<?php echo esc_url( get_permalink() ); ?>" class="archive-card__title-link">
						<?php the_title(); ?>
					</a>
				</h2>
			</header>

			<!-- Post Excerpt -->
			<div class="archive-card__excerpt">
				<?php 
					if ( has_excerpt() ) {
						the_excerpt();
					} else {
						echo wp_kses_post( wp_trim_words( get_the_content(), 20, '...' ) );
					}
				?>
			</div>

			<!-- Author Info -->
			<div class="archive-card__author">
				<div class="archive-card__author-avatar">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 32, '', '', array( 'class' => 'archive-card__avatar' ) ); ?>
				</div>
				<div class="archive-card__author-info">
					<span class="archive-card__author-name">
						<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
							<?php echo esc_html( get_the_author() ); ?>
						</a>
					</span>
					<?php if ( get_the_author_meta( 'description' ) ) : ?>
						<span class="archive-card__author-role">
							<?php echo esc_html( get_the_author_meta( 'description' ) ); ?>
						</span>
					<?php endif; ?>
				</div>
			</div>

			<!-- Tags (if no featured image) -->
			<?php if ( ( !has_post_thumbnail() || $hide_featured_img ) && has_tag() ) : ?>
				<div class="archive-card__tags">
					<?php
						$tags = get_the_tags();
						if ( $tags ) {
							$tag_count = 0;
							foreach ( $tags as $tag ) {
								if ( $tag_count >= 3 ) break;
								echo '<a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '" class="archive-card__tag">' . esc_html( $tag->name ) . '</a>';
								$tag_count++;
							}
						}
					?>
				</div>
			<?php endif; ?>
		</div>

		<!-- Read More Button -->
		<div class="archive-card__footer">
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="archive-card__read-more">
				<?php esc_html_e( 'Read More', 'wp-modern-starter' ); ?>
				<i class="fas fa-arrow-right"></i>
			</a>
		</div>
	</div>
</article>