<?php

/**
 * Theme Configuration
 *
 * Basic configuration for WP Modern Starter theme framework.
 * This is a starting point - experienced developers should modify as needed.
 * 
 * @package wp_modern_starter
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Basic Configuration Class
 *
 * Simple configuration system for theme constants and settings.
 * Experienced developers: Modify or replace this as needed for your projects.
 */
class WpModernStarterConfig
{
    /**
     * Essential configuration data
     * @var array
     */
    /**
     * Basic theme configuration
     * Developers: Modify this structure as needed for your projects
     */
    private static $config = [
        'site' => [
            'author' => 'Your Name Here',
            'description' => 'A modern WordPress starter theme framework'
        ],
        'content' => [
            'posts_per_page' => 6,
            'excerpt_length' => 25
        ]
    ];

    /**
     * Get configuration value
     *
     * @param string $key Dot notation key (e.g., 'social.github.url')
     * @param mixed $default Default value if key not found
     * @return mixed Configuration value
     */
    public static function get($key, $default = null)
    {
        $keys = explode('.', $key);
        $value = self::$config;

        foreach ($keys as $k) {
            if (!is_array($value) || !isset($value[$k])) {
                return $default;
            }
            $value = $value[$k];
        }

        return $value;
    }

    /**
     * Get all configuration (for debugging)
     */
    public static function getAll()
    {
        return self::$config;
    }
}

// =============================================================================
// HELPER FUNCTIONS
// =============================================================================

/**
 * Get configuration value using dot notation
 * Developers: Modify or replace this helper as needed
 */
function site_config($key, $default = null)
{
    return WpModernStarterConfig::get($key, $default);
}

// =============================================================================
// THEME CONSTANTS (Consolidated from env.php)
// =============================================================================

// Theme version
if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.2.0');
}

// Theme domain and branding
define('DOMAIN', site_config('site.author', 'wp-modern-starter'));
define('SHOW_LOGO_IMAGE', false);

// Assets and paths
define('ASSETS_FOLDER_NAME', '/assets');
define('ASSETS_URL', get_template_directory_uri() . ASSETS_FOLDER_NAME);
define('IMG_STORAGE', get_template_directory_uri() . ASSETS_FOLDER_NAME . '/images');

// Image constants and placeholders
define('NO_THUMBNAIL_IMG', IMG_STORAGE . '/no-picture.png');
define('IMAGE_PLACEHOLDER_250x150', ASSETS_URL . '/images/no-picture.png');
define('IMG_SOCIAL_ICONS', IMG_STORAGE . '/icons/social/');
define('IMG_PAYMENTS_ICONS', IMG_STORAGE . '/icons/payment/');
// Removed: USEFUL_RESOURCES_BLOCK_IMGS_PATH (no longer needed)

// External placeholder images (keeping for compatibility)
define('IMAGE_PLACEHOLDER_150', 'https://via.placeholder.com/150');
define('IMAGE_PLACEHOLDER_300', 'https://via.placeholder.com/300');
define('IMAGE_PLACEHOLDER_350', 'https://via.placeholder.com/350');
define('IMAGE_PLACEHOLDER_700', 'https://via.placeholder.com/700');
define('IMAGE_PLACEHOLDER_CUSTOM', 'https://via.placeholder.com/800x500');

// Content settings
define('FRONT_PAGE_RECENT_POSTS_NUM', 4);
define('ALL_POSTS_PAGE_SLUG', 'blog');

// =============================================================================
// DEVELOPER NOTES
// =============================================================================
/*
 * This is a basic configuration system for the WP Modern Starter framework.
 * 
 * For experienced developers:
 * - Modify this structure to fit your project needs
 * - Replace with your preferred configuration system 
 * - Add database options, custom fields, or other approaches as needed
 * 
 * Usage: site_config('site.author') returns configuration values
 */
