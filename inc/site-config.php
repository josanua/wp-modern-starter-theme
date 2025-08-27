<?php

/**
 * Site Configuration
 *
 * Centralized configuration file for all site settings, social links,
 * content settings, and theme constants. This eliminates the need for
 * WordPress admin dashboard option fields in this custom theme.
 *
 * @package wp_modern_starter_main_theme
 * @since 1.2.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Simplified Site Configuration
 *
 * Essential site settings that match current template usage.
 * Focused on what's actually needed rather than theoretical features.
 */
class WpModernStarterConfig
{
    /**
     * Essential configuration data
     * @var array
     */
    private static $config = [

        // =============================================================================
        // BASIC SITE INFO
        // =============================================================================
        'site' => [
            'author' => 'Your Name Here',
            'description' => 'A modern WordPress starter theme with Vite build system, Bootstrap 5, and SASS 7-1 architecture.',
            'theme_repository' => 'https://github.com/yourusername/your-theme-repo',
        ],

        // =============================================================================
        // SOCIAL LINKS (Used in footer)
        // =============================================================================
        'social' => [
            'github' => 'https://github.com/yourusername',
            'portfolio' => 'https://yourwebsite.com',
            'linkedin' => 'https://linkedin.com/in/your-profile'
        ],

        // =============================================================================
        // CONTENT SETTINGS (Actually used in templates)
        // =============================================================================
        'content' => [
            'recent_posts_count' => 6, // Match env.php setting
            'blog_page_slug' => 'blog',
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
     * Get all social links that are enabled
     *
     * @return array Enabled social links with full configuration
     */
    public static function getSocialLinks()
    {
        $social = self::get('social', []);
        $enabled = [];

        foreach ($social as $platform => $config) {
            if (isset($config['enabled']) && $config['enabled']) {
                $enabled[$platform] = $config;
            }
        }

        return $enabled;
    }

    /**
     * Get footer sections that are enabled
     *
     * @return array Enabled footer sections
     */
    public static function getFooterSections()
    {
        $sections = self::get('footer.sections', []);
        $enabled = [];

        foreach ($sections as $section => $config) {
            if (isset($config['enabled']) && $config['enabled']) {
                $enabled[$section] = $config;
            }
        }

        return $enabled;
    }

    /**
     * Check if a feature is enabled
     *
     * @param string $feature Feature name
     * @return bool Whether feature is enabled
     */
    public static function isFeatureEnabled($feature)
    {
        return self::get("features.{$feature}", false);
    }

    /**
     * Get homepage resources data
     *
     * @return array Resources configuration
     */
    public static function getHomepageResources()
    {
        return self::get('homepage.resources', []);
    }

    /**
     * Set dynamic configuration value
     *
     * @param string $key Dot notation key
     * @param mixed $value Value to set
     * @return bool Success status
     */
    public static function setDynamicValue($key, $value)
    {
        $keys = explode('.', $key);
        $config = &self::$config;

        foreach ($keys as $k) {
            if (!is_array($config)) {
                return false;
            }
            if (!isset($config[$k])) {
                $config[$k] = [];
            }
            $config = &$config[$k];
        }

        $config = $value;
        return true;
    }

    /**
     * Get all configuration (for debugging)
     *
     * @return array Complete configuration array
     */
    public static function getAll()
    {
        return self::$config;
    }
}

// =============================================================================
// GLOBAL HELPER FUNCTIONS
// =============================================================================

/**
 * Quick access to configuration values
 *
 * @param string $key Configuration key in dot notation
 * @param mixed $default Default value
 * @return mixed Configuration value
 */
function site_config($key, $default = null)
{
    return WpModernStarterConfig::get($key, $default);
}

/**
 * Check if feature is enabled
 *
 * @param string $feature Feature name
 * @return bool Whether feature is enabled
 */
function wp_modern_starter_feature($feature)
{
    return WpModernStarterConfig::isFeatureEnabled($feature);
}

/**
 * Get enabled social links
 *
 * @return array Enabled social links
 */
function wp_modern_starter_social_links()
{
    return WpModernStarterConfig::getSocialLinks();
}

// =============================================================================
// THEME CONSTANTS (Consolidated from env.php)
// =============================================================================

// Theme version
if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.2.0');
}

// Theme domain and branding
define('DOMAIN', 'wp-modern-starter');
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
define('USEFUL_RESOURCES_BLOCK_IMGS_PATH', get_template_directory_uri() . '/assets/images/resources-and-guides');

// External placeholder images (keeping for compatibility)
define('IMAGE_PLACEHOLDER_150', 'https://via.placeholder.com/150');
define('IMAGE_PLACEHOLDER_300', 'https://via.placeholder.com/300');
define('IMAGE_PLACEHOLDER_350', 'https://via.placeholder.com/350');
define('IMAGE_PLACEHOLDER_700', 'https://via.placeholder.com/700');
define('IMAGE_PLACEHOLDER_CUSTOM', 'https://via.placeholder.com/800x500');

// Content settings
define('FRONT_PAGE_RECENT_POSTS_NUM', 4);
define('ALL_POSTS_PAGE_SLUG', 'blog');

// Configuration is now static and simple - no initialization needed
