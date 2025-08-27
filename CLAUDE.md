# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a **personal WordPress theme** called "wpforpro" for the wpforpro.com blog. Built on the Underscores (_s) framework with optimized Bootstrap 5, this theme is specifically designed for a WordPress full-stack developer's personal use.

**Key Characteristics:**
- **Personal Project**: Custom theme for wpforpro.com blog only
- **Developer-Focused**: Built for full-stack WordPress developer usage
- **No Universal Compatibility**: Not designed for selling or non-programmer users
- **Modern Architecture**: Implements SASS 7-1 architecture and component-driven design
- **Performance Optimized**: Custom Bootstrap build with 60% size reduction

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
npm install
npm run build
```

## Architecture

### Modern WordPress Theme Structure
This is a modern WordPress theme built on Underscores (_s) foundation with:

- **Vite Build System**: ES6+ modules, SASS preprocessing, HMR in development
- **Bootstrap 5 Integration**: Custom build with 60% size reduction 
- **SASS 7-1 Architecture**: Complete implementation with organized stylesheets
- **Component-Driven Design**: Modular template blocks and parts

### Key Entry Points
- `src/js/main.js` - Frontend JavaScript entry point
- `src/js/admin.js` - Admin area JavaScript 
- `src/js/blocks.js` - Block editor JavaScript
- Main stylesheet loaded via Vite build process

### Asset Management
- **Development**: Assets served from Vite dev server with HMR
- **Production**: Built assets in `/dist` with automatic file versioning
- **Images**: Static assets copied from `/assets/images` to `/dist/assets/images`

### Modular Architecture
- `/inc/` - WordPress functionality modules:
  - `seo-functions.php` - SEO enhancements and meta tags
  - `site-config.php` - Centralized site configuration 
  - `template-functions.php` - Custom theme functions
  - `walker-nav-class.php` - Bootstrap 5 navigation walker

- `/template-blocks/` - Custom content blocks:
  - `resources-and-guides.php` - Featured tutorials grid
  - `recent-posts.php` - Blog posts display
  - `hosting-providers-grid.php` - Service provider listings

- `/template-parts/` - Reusable template components:
  - Content display components (`content-*.php`)
  - Navigation components (`main-nav.php`)

### Vite Configuration Details
- **Development server**: Port 3001 with CORS enabled
- **Entry points**: main.js, admin.js, blocks.js
- **Asset output**: Organized by type in `/dist/assets/`
- **PHP integration**: Automatic detection of dev vs production mode
- **Live reload**: Watches PHP files for changes during development

### Asset Loading Strategy
The theme uses intelligent asset loading in `functions.php:167-234`:
- Detects if Vite dev server is running
- Development: Loads module script directly from Vite server
- Production: Loads built assets with file modification timestamps
- Conditionally loads admin and blocks assets based on context

### Styling Architecture
- SASS 7-1 pattern (though source files may need to be created in `/src/sass/`)
- Bootstrap 5 custom build for optimal performance
- CSS loaded through Vite build process, not WordPress enqueue

### Key Configuration Constants
- `VITE_SERVER` - Development server URL (http://localhost:3001/)
- `VITE_ENTRY_POINT` - Main JavaScript entry point (src/js/main.js)
- Google Fonts integration via constants in functions.php

## Development Workflow

### Starting Development
1. `npm run dev` - Starts Vite dev server with HMR
2. Ensure WordPress `WP_DEBUG` is true for development mode
3. Assets automatically reload on changes to JS/SASS files
4. PHP files trigger browser refresh via live-reload plugin

### Building for Production  
1. `npm run build` - Creates optimized production assets
2. Assets include cache-busting timestamps
3. CSS/JS automatically minified and optimized

### WordPress Integration Notes
- Theme follows WordPress coding standards and template hierarchy
- Custom post types and fields managed through site-config.php
- SEO functionality separate from plugin dependencies
- Bootstrap 5 navigation requires custom walker class

## Development Philosophy

Since this is a **personal theme for a full-stack WordPress developer**, the development approach prioritizes:

- **Developer Experience**: Modern tooling, hot reloading, optimized build processes
- **Performance Over Compatibility**: Aggressive optimizations, custom builds, modern CSS/JS
- **Code Quality**: Industry-standard architecture patterns (SASS 7-1, component-driven design)
- **Personal Needs**: Tailored specifically for wpforpro.com blog requirements
- **No Universal Support**: Not designed for theme marketplace or non-technical users

**Code Decisions:**
- Use modern ES6+ JavaScript without legacy browser support
- Implement advanced SASS features and custom Bootstrap builds
- Prioritize performance and maintainability over broad compatibility
- Focus on blog-specific functionality rather than general-purpose features

## Development Notes

- **Node.js v16+** required for development
- **CSS**: Always edit `.scss` files, never `.css` (compiled from SASS)
- **Standards**: Follows WordPress coding standards but prioritizes modern practices
- **Bootstrap**: Custom build with only essential components (60% size reduction)
- **Performance**: All decisions favor speed and efficiency over universal compatibility
- **Personal Use**: Optimized specifically for wpforpro.com blog needs

