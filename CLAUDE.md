# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is **WP Modern Starter**, a WordPress theme framework for experienced developers. Built on the Underscores (_s) foundation with modern development tools, this framework provides a solid starting point for custom theme development.

**Key Characteristics:**
- **Developer Framework**: Designed for experienced WordPress theme developers
- **Client Project Ready**: Professional starting point for custom themes
- **Modern Architecture**: Vite build system, SASS 7-1, Bootstrap 5 integration
- **Performance Focused**: Custom Bootstrap build with 60% size reduction
- **Extensible Foundation**: Clean, minimal codebase easy to modify and build upon

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
This is a modern WordPress theme framework built on Underscores (_s) foundation with:

- **Vite Build System**: ES6+ modules, SASS preprocessing, HMR in development
- **Bootstrap 5 Integration**: Custom build with 60% size reduction 
- **Clean Architecture**: Minimal, extensible foundation for custom development
- **Developer-First**: Built for experienced developers to modify and extend

### Key Entry Points
- `src/js/main.js` - Frontend JavaScript entry point
- `src/js/admin.js` - Admin area JavaScript 
- `src/js/blocks.js` - Block editor JavaScript
- Main stylesheet loaded via Vite build process

### Asset Management
- **Development**: Assets served from Vite dev server with HMR
- **Production**: Built assets in `/dist` with automatic file versioning
- **Images**: Static assets copied from `/assets/images` to `/dist/assets/images`

### Framework Architecture
- `/inc/` - WordPress functionality modules:
  - `site-config.php` - Basic configuration system (modify as needed)
  - `template-functions.php` - Custom theme functions
  - `walker-nav-class.php` - Bootstrap 5 navigation walker
  - `seo-functions.php` - SEO enhancements and meta tags

- `/template-blocks/` - Example content blocks:
  - `recent-posts.php` - Simple recent posts example

- `/template-parts/` - Reusable template components:
  - Content display components (`content-*.php`)
  - Navigation components (`main-nav.php`)

**Developer Notes**: Modify, replace, or extend these components as needed for your projects.

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

This **WordPress theme framework for experienced developers** prioritizes:

- **Developer Experience**: Modern tooling, hot reloading, optimized build processes
- **Performance Over Compatibility**: Aggressive optimizations, custom builds, modern CSS/JS
- **Code Quality**: Industry-standard architecture patterns (SASS 7-1, clean code)
- **Professional Foundation**: Solid starting point for client projects
- **Developer Freedom**: Easy to modify, extend, or replace any component

**Framework Decisions:**
- Use modern ES6+ JavaScript and build tools
- Implement advanced SASS features and custom Bootstrap builds
- Prioritize performance and maintainability
- Provide clean foundation rather than complex feature systems
- Focus on extensibility for diverse project needs

## Development Notes

- **Node.js v16+** required for development
- **Target Audience**: Experienced WordPress theme developers
- **CSS**: Framework expects SASS workflow (create `src/sass/` directory)
- **Standards**: Follows WordPress coding standards with modern development practices
- **Bootstrap**: Custom build with only essential components (60% size reduction)
- **Performance**: All decisions favor speed and efficiency
- **Extensible**: Modify any part of the framework to fit project needs
- **Client Ready**: Professional foundation suitable for client projects

