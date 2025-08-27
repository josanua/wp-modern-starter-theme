<?php
/**
 * Environment Configuration File
 * Define environment-specific constants and settings here.
 * 
 * Note: Theme constants have been moved to inc/site-config.php
 * This file now contains only environment-specific settings.
 */

// Site environment
const SITE_ENV = 'development'; // Change to 'production' or 'staging' as needed

// API keys and external services
const API_KEY = 'your-api-key-here';

// Debug settings
const WP_DEBUG_MODE = SITE_ENV === 'development';

// Environment-specific feature flags
const ENABLE_DEVELOPMENT_TOOLS = SITE_ENV === 'development';