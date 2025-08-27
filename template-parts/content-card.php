<?php
/**
 * Template part for displaying posts cards list
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wp_modern_starter_main_theme
 */

// get post metadata
//	$hide_featured_img = get_post_meta(get_the_id(), 'hide_featured_img_meta', true);
?>
<div class="col-12 col-md-4 mb-4">
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'card' ); ?> itemscope
             itemtype="http://schema.org/BlogPosting"
             aria-labelledby="title-<?php the_ID(); ?>">
        <figure class="card-img">
            <a href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( get_the_title() ); ?>">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'small',
						array(
							'class'   => 'img-fluid img-hover-effect',
							'alt'     => get_the_title(),
							'loading' => 'lazy'
						)
					); ?>
				<?php else : ?>
                    <img src="<?php echo esc_url( NO_THUMBNAIL_IMG ) ?>"
                         class="img-fluid img-hover-effect"
                         alt="Placeholder image"
                         loading="lazy"
                    >
				<?php endif; ?>
            </a>
            <figcaption class="visually-hidden">
				<?php echo esc_html( get_the_title() ); ?>
            </figcaption>
        </figure>
        <div class="card-body">
            <h2 class="card-title h4" id="title-<?php the_ID(); ?>" itemprop="headline">
                <a href="<?php the_permalink() ?>" class="custom-title-link"
                   aria-label="<?php echo esc_attr( get_the_title() ); ?>">
					<?php the_title() ?>
                </a>
            </h2>

            <div class="post-meta">
                <span class="post-date text-secondary"><?php echo get_the_date(); ?></span>
                <span class="post-category"><?php the_category( ', ' ); ?></span>
            </div>

            <p class="card-text" id="excerpt-<?php the_ID(); ?>" itemprop="description">
				<?php echo get_the_excerpt() . '...';   ?>
            </p>
            <a class="read-more" href="<?php the_permalink(); ?>">Read More...</a>
        </div>
    </article><!-- #post-<?php the_ID(); ?> -->
</div>