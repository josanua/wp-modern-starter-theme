<?php
/**
 * Basic theme configuration
 *
 * @package wp_modern_starter
 */

if (!defined('ABSPATH')) {
    exit;
}

class WpModernStarterConfig {
    private static $config = [
        'site' => [
            'author' => 'Your Name Here',
            'description' => 'Modern WordPress starter theme'
        ]
    ];

    public static function get($key, $default = null) {
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
}

function site_config($key, $default = null) {
    return WpModernStarterConfig::get($key, $default);
}

// Theme constants
if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}