<?php
/**
 * Recent Posts Section
 *
 * @package wp_modern_starter
 */

$recent_posts = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 6,
));

if ($recent_posts->have_posts()) : ?>

<section class="posts-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2>Latest Posts</h2>
            </div>
        </div>

        <div class="row g-4">
            <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
            <div class="col-lg-4 col-md-6">
                <article class="card h-100">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="card-img-top">
                            <?php the_post_thumbnail('medium', array('class' => 'w-100 h-auto')); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="card-body">
                        <h3 class="card-title h5">
                            <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                        <p class="card-text text-muted"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                        <small class="text-muted">
                            <?php echo get_the_date(); ?>
                        </small>
                    </div>
                </article>
            </div>
            <?php endwhile; ?>
        </div>

        <div class="text-center mt-5">
            <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="btn btn-outline-primary">
                View All Posts
            </a>
        </div>
    </div>
</section>

<?php 
wp_reset_postdata();
endif;