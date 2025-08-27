<?php

/**
 * SEO Functions and Enhancements
 *
 * Contains all SEO-related functions and optimizations for the wp_modern_starter theme.
 * Works alongside Yoast SEO plugin without conflicts.
 *
 * @package wp_modern_starter
 * @since 1.2.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Initialize SEO enhancements
 */
function wp_modern_starter_init_seo()
{
    // Clean up WordPress head
    wp_modern_starter_cleanup_wp_head();

    // Add image optimizations
    wp_modern_starter_init_image_seo();

    // Add performance hints
    wp_modern_starter_init_performance_hints();

    // Add custom image sizes for social sharing
    wp_modern_starter_add_social_image_sizes();

    // Security and performance optimizations
    // wp_modern_starter_init_security_optimizations();
}
add_action('after_setup_theme', 'wp_modern_starter_init_seo');

/**
 * Clean up WordPress head section
 * Remove unnecessary meta tags and links for cleaner HTML
 */
function wp_modern_starter_cleanup_wp_head()
{
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
}

/**
 * Image SEO optimizations
 */
function wp_modern_starter_init_image_seo()
{
    // Add image dimensions for better performance and SEO
    add_filter('wp_get_attachment_image', 'wp_modern_starter_add_image_dimensions', 10, 3);

    // Add WebP support
    add_filter('mime_types', 'wp_modern_starter_webp_uploads_support');
}

/**
 * Add image dimensions to images for better SEO and performance
 *
 * @param string $html Image HTML
 * @param int $id Attachment ID
 * @param string $size Image size
 * @return string Modified HTML
 */
function wp_modern_starter_add_image_dimensions($html, $id, $size)
{
    if (strpos($html, 'width=') !== false && strpos($html, 'height=') !== false) {
        return $html;
    }

    $image_data = wp_get_attachment_image_src($id, $size);
    if ($image_data) {
        $width = $image_data[1];
        $height = $image_data[2];

        if ($width && $height) {
            $html = str_replace('<img', '<img width="' . $width . '" height="' . $height . '"', $html);
        }
    }

    return $html;
}

/**
 * Add WebP support for better image performance
 *
 * @param array $mimes Allowed MIME types
 * @return array Modified MIME types
 */
function wp_modern_starter_webp_uploads_support($mimes)
{
    $mimes['webp'] = 'image/webp';
    return $mimes;
}

/**
 * Add custom image sizes for social media sharing
 */
function wp_modern_starter_add_social_image_sizes()
{
    add_image_size('og-image', 1200, 630, true);     // Open Graph image size
    add_image_size('twitter-card', 1024, 512, true); // Twitter card image size
}

/**
 * Initialize performance hints and preload resources
 */
function wp_modern_starter_init_performance_hints()
{
    add_action('wp_head', 'wp_modern_starter_add_preload_hints', 1);
}

/**
 * Add preload hints for critical resources
 * Improves page loading performance
 */
function wp_modern_starter_add_preload_hints()
{
    // Preload DNS for Google Fonts
    if (defined('GOOGLE_FONT_PATH') && GOOGLE_FONT_PATH !== "") {
        echo '<link rel="dns-prefetch" href="//fonts.googleapis.com">' . "\n";
        echo '<link rel="dns-prefetch" href="//fonts.gstatic.com">' . "\n";
    }

    // Add preconnect for critical resources
    echo '<link rel="preconnect" href="' . home_url() . '">' . "\n";
}

/**
 * Security and performance optimizations
 */
function wp_modern_starter_init_security_optimizations()
{
    // Remove version numbers from CSS/JS for security
    add_filter('style_loader_src', 'wp_modern_starter_remove_version_strings');
    add_filter('script_loader_src', 'wp_modern_starter_remove_version_strings');
}

/**
 * Remove version query strings from CSS and JS files
 * Improves security by hiding WordPress version
 *
 * @param string $src Resource URL
 * @return string Modified URL
 */
function wp_modern_starter_remove_version_strings($src)
{
    if (strpos($src, '?ver=')) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}

/**
 * Generate better post excerpts for SEO meta descriptions
 * Provides fallback when Yoast SEO is not handling excerpts
 *
 * @param string $text Original text
 * @return string Optimized excerpt
 */
function wp_modern_starter_better_excerpt($text = '')
{
    global $post;

    if ('' == $text) {
        $text = get_the_content('');
        $text = apply_filters('the_content', $text);
        $text = str_replace('\]\]\>', ']]&gt;', $text);
        $text = strip_tags($text);
        $text = strip_shortcodes($text);

        $excerpt_length = 25;
        $words = explode(' ', $text, $excerpt_length + 1);

        if (count($words) > $excerpt_length) {
            array_pop($words);
            $text = implode(' ', $words);
            $text = rtrim($text);
            $text .= '...';
        }
    }
    return $text;
}

/**
 * SEO-friendly sitemap hints
 * Helps search engines discover content
 */
function wp_modern_starter_add_sitemap_hints()
{
    // Only add if Yoast SEO sitemap is not active
    if (!defined('WPSEO_VERSION')) {
        echo '<link rel="sitemap" type="application/xml" title="Sitemap" href="' . home_url('sitemap.xml') . '">' . "\n";
    }
}
add_action('wp_head', 'wp_modern_starter_add_sitemap_hints');

/**
 * Optimize WordPress queries for better performance
 */
function wp_modern_starter_optimize_queries()
{
    // Disable WordPress emojis for better performance
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');

    // Remove emoji DNS prefetch
    remove_filter('wp_resource_hints', 'wp_emoji_dns_prefetch', 10);
}
add_action('init', 'wp_modern_starter_optimize_queries');

/**
 * Add schema-friendly microdata classes
 * Enhances existing content with microdata without conflicting with Yoast
 */
function wp_modern_starter_add_microdata_classes($classes)
{
    if (is_single()) {
        $classes[] = 'hentry';
    }
    return $classes;
}
add_filter('body_class', 'wp_modern_starter_add_microdata_classes');

/**
 * SEO-friendly navigation improvements
 */
function wp_modern_starter_seo_navigation()
{
    // Add title attributes to navigation links
    add_filter('nav_menu_link_attributes', 'wp_modern_starter_nav_link_attributes', 10, 3);
}

/**
 * Add SEO-friendly attributes to navigation links
 *
 * @param array $atts Link attributes
 * @param object $item Menu item
 * @param object $args Menu arguments
 * @return array Modified attributes
 */
function wp_modern_starter_nav_link_attributes($atts, $item, $args)
{
    // Add title attribute for better accessibility and SEO
    if (empty($atts['title'])) {
        $atts['title'] = $item->title;
    }
    return $atts;
}

// Initialize navigation SEO
wp_modern_starter_seo_navigation();
