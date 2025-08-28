# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is **WP Modern Starter**, a clean WordPress theme framework for experienced developers. Built on Underscores foundation with modern development tools, providing a minimal starting point for custom theme development.

**Key Characteristics:**
- **Developer Framework**: Designed for experienced WordPress theme developers
- **Clean Foundation**: Minimal, extensible codebase without bloat
- **Modern Tools**: Vite build system with HMR
- **CDN Integration**: Bootstrap 5.3.3 + Font Awesome 6 from CDN
- **Professional Ready**: Suitable foundation for client projects

## Development Commands

### Build System (Vite)
- `npm run dev` - Start development server with HMR on port 3001
- `npm run build` - Build production assets to `/dist` directory  
- `npm run clean` - Remove dist directory

### WordPress Development
- Vite dev server runs on `http://localhost:3001/`
- Development mode automatically detected when `WP_DEBUG` is true and Vite server is running
- Production builds load from `/dist` folder with file versioning

### Initial Setup
```bash
npm install        # Install dependencies
npm run dev        # Start development server
npm run build      # Build for production
```

## Architecture

### WordPress Theme Framework Structure
This is a clean WordPress theme framework built on Underscores foundation with:

- **Vite Build System**: Modern development server with HMR
- **Bootstrap 5 Integration**: CDN-loaded with Font Awesome 6
- **Clean Architecture**: Minimal, extensible foundation
- **Developer-First**: Built for experienced developers to modify and extend

### Key Entry Points
- `src/js/main.js` - Frontend JavaScript entry point (create as needed)
- `src/js/admin.js` - Admin area JavaScript (create as needed)
- `src/js/blocks.js` - Block editor JavaScript (create as needed)
- Styles loaded via Vite or create `src/sass/` directory

### Asset Management
- **Development**: Assets served from Vite dev server with HMR
- **Production**: Built assets in `/dist` with automatic file versioning
- **Static Assets**: Place in `/assets/` directory

### Framework Architecture
- `/inc/` - WordPress functionality modules:
  - `site-config.php` - Basic configuration system (minimal)
  - `template-functions.php` - Custom theme functions
  - `template-tags.php` - Template helper functions
  - `customizer.php` - WordPress customizer integration
  - `walker-nav-class.php` - Bootstrap 5 navigation walker

- `/template-blocks/` - Example content blocks:
  - `recent-posts.php` - Simple recent posts example

- `/template-parts/` - Reusable template components:
  - Content display components (`content-*.php`)
  - Navigation and other reusable parts

**Developer Notes**: This is a minimal foundation. Modify, replace, or extend any components as needed.

### Vite Configuration Details
- **Development server**: Port 3001 with CORS enabled
- **Entry points**: main.js, admin.js, blocks.js (create as needed)
- **Asset output**: Organized by type in `/dist/assets/`
- **PHP integration**: Automatic detection of dev vs production mode
- **Live reload**: Watches PHP files for changes during development

### Asset Loading Strategy
The theme uses intelligent asset loading in `functions.php`:
- Detects if Vite dev server is running
- Development: Loads module script directly from Vite server
- Production: Loads built assets with file modification timestamps
- External dependencies (Bootstrap, Font Awesome) loaded from CDN

### Styling Architecture
- Framework expects developers to create their own `src/sass/` structure
- Bootstrap 5 loaded from CDN (not bundled)
- CSS loaded through Vite build process when source files exist
- Clean, minimal foundation for custom styling

### Key Configuration
- `VITE_SERVER` - Development server URL (http://localhost:3001/)
- `VITE_ENTRY_POINT` - Main JavaScript entry point (src/js/main.js)
- Basic site configuration in `inc/site-config.php`

## Development Workflow

### Starting Development
1. `npm run dev` - Starts Vite dev server with HMR on localhost:3001
2. **MANDATORY**: Set `WP_DEBUG = true` in `wp-config.php` for development mode
3. Access WordPress site through local environment (e.g., http://yoursite.test)
4. Assets automatically load from Vite server, changes reload instantly
5. Create `src/js/` and `src/sass/` directories as needed

### CRITICAL: WP_DEBUG Configuration

**MANDATORY for Live Reload**: You MUST set `WP_DEBUG = true` in your `wp-config.php`:

```php
// wp-config.php
define('WP_DEBUG', true);
```

#### How Asset Loading Works

The theme intelligently switches between development and production modes:

**Development Mode** (`WP_DEBUG = true` + Vite server running):
- Assets load from Vite dev server (`localhost:3001`)
- Includes `@vite/client` for WebSocket live reload connection
- PHP file changes trigger browser refresh via `vite-plugin-live-reload`
- JavaScript/CSS changes update instantly via HMR

**Production Mode** (`WP_DEBUG = false` OR Vite server not running):
- Assets load from built files in `/dist/` directory
- No live reload functionality - optimized for performance
- Automatic file versioning for cache busting

#### Troubleshooting Live Reload

If live reload isn't working, check browser console. You should see:

```javascript
// ✅ Development mode (working):
WP_DEBUG: true
Vite server running: true
Vite dev server connected - live reload enabled
[vite] connecting...
[vite] connected.

// ❌ Production mode (WP_DEBUG disabled):
WP_DEBUG: false
Vite server running: true
Loading production assets
```

#### The Live Reload Process

1. **File Watch**: `vite-plugin-live-reload` monitors PHP files
2. **WebSocket**: `@vite/client` maintains connection to Vite server
3. **Change Detection**: Plugin detects PHP file changes
4. **Reload Signal**: Sends reload message via WebSocket
5. **Browser Refresh**: Client triggers `window.location.reload()`

### Building for Production  
1. `npm run build` - Creates optimized production assets
2. Assets include cache-busting timestamps
3. CSS/JS automatically minified and optimized

### WordPress Integration Notes
- Clean, minimal WordPress theme structure
- Bootstrap 5 navigation with custom walker class
- CDN loading for external dependencies
- Essential WordPress features only

## Development Philosophy

This **WordPress theme framework for experienced developers** prioritizes:

- **Clean Foundation**: Minimal starting point without unnecessary features
- **Developer Freedom**: Easy to modify, extend, or replace any component
- **Modern Tools**: Vite build system with HMR and live reload
- **Professional Quality**: Production-ready foundation for client projects
- **Performance**: CDN loading, minimal overhead, optimized builds

**Framework Approach:**
- Provide essential structure, let developers build the rest
- Modern development workflow without complexity
- Clean, readable code that's easy to understand and modify
- No vendor lock-in or proprietary systems

## Development Notes

- **Node.js v16+** required for development
- **Target Audience**: Experienced WordPress theme developers
- **Minimal by Design**: Create your own SASS architecture as needed
- **CDN Integration**: Bootstrap and Font Awesome loaded externally
- **Clean Structure**: Essential WordPress features and modern build tools
- **Extensible**: Framework designed to be modified and extended
- **Client Ready**: Professional foundation suitable for client projects