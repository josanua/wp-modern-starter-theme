# WP Modern Starter Theme Framework

> **A modern WordPress starter theme framework for experienced developers**

A professional WordPress theme framework built on Underscores foundation with modern development tools. Designed specifically for **experienced WordPress theme developers** who want a clean, performant starting point for custom projects.

[![License: GPL v2](https://img.shields.io/badge/License-GPL%20v2-blue.svg)](https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html)
[![WordPress](https://img.shields.io/badge/WordPress-6.0+-blue.svg)](https://wordpress.org/)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3.3-purple.svg)](https://getbootstrap.com/)
[![Vite](https://img.shields.io/badge/Vite-7.0+-646CFF.svg)](https://vitejs.dev/)

## 🎯 For Experienced Developers

This framework is **not** for end-users or beginners. It's designed for:
- **WordPress theme developers** building custom client projects
- **Agencies** needing a modern, performance-optimized starting point
- **Freelancers** who want to skip the boilerplate setup
- **Developers** familiar with modern build tools and WordPress architecture

## ⚡ What You Get

### Modern Development Stack
- **Vite Build System** - Fast development server with HMR
- **Bootstrap 5.3.3** - CDN integration with Font Awesome
- **Clean Architecture** - Minimal, extensible foundation
- **ES6+ JavaScript** - Modern JavaScript structure
- **WordPress Best Practices** - Clean, semantic code

### Developer Experience
- **Hot Module Replacement** - Instant updates during development
- **Automatic Browser Refresh** - PHP file changes trigger page reload
- **Clean Codebase** - Well-organized, minimal structure
- **Extensible Foundation** - Easy to modify and build upon

## 🚀 Quick Start

### Prerequisites
- **Node.js 16+** 
- **WordPress 6.0+**
- **PHP 7.4+**

### Installation

```bash
# 1. Download/clone to your themes directory
cd wp-content/themes/
git clone [your-repo] your-theme-name
cd your-theme-name

# 2. Install dependencies
npm install

# 3. Start development
npm run dev

# 4. Build for production
npm run build
```

### Development Commands

```bash
npm run dev         # Start Vite dev server (localhost:3001)
npm run build       # Build production assets
npm run clean       # Remove dist directory
```

## 📁 Architecture

```
your-theme/
├── src/js/                 # JavaScript source files (create as needed)
│   ├── main.js            # Frontend entry point
│   ├── admin.js           # Admin scripts
│   └── blocks.js          # Block editor scripts
├── assets/                # Static assets
├── dist/                  # Built assets (auto-generated)
├── inc/                   # WordPress functionality
│   ├── site-config.php    # Basic configuration
│   ├── template-functions.php
│   ├── template-tags.php
│   ├── customizer.php
│   └── walker-nav-class.php
├── template-parts/        # Reusable template components
├── template-blocks/       # Custom content blocks
│   └── recent-posts.php   # Example posts display
├── functions.php          # Main theme functions
└── vite.config.js         # Build configuration
```

## 🔧 Key Features

### Intelligent Asset Loading
- **Development**: Assets served from Vite dev server with HMR
- **Production**: Optimized assets with automatic versioning
- **Automatic Detection**: Switches based on `WP_DEBUG` and dev server status

### Bootstrap 5 Integration
- **CDN Loading**: Bootstrap 5.3.3 + Font Awesome 6 from CDN
- **Custom Walker**: Bootstrap-compatible navigation
- **Modern Grid**: Flexbox-based responsive system

### Clean Foundation
- **Minimal Setup**: Essential WordPress features only
- **Modern Structure**: Clean, organized codebase
- **Easy Customization**: Modify any part to fit your needs

## 🛠️ Customization

### Basic Configuration
Edit `inc/site-config.php` for basic settings:

```php
private static $config = [
    'site' => [
        'author' => 'Your Name Here',
        'description' => 'Modern WordPress starter theme'
    ]
];
```

### Build System
Modify `vite.config.js` for build customization:
- Add new entry points
- Configure asset paths
- Adjust development server settings

### Styling
- Create `src/sass/` directory for your styles
- Set up your preferred SASS architecture
- Customize Bootstrap variables as needed

### JavaScript
- **Entry Points**: `src/js/main.js`, `admin.js`, `blocks.js`
- **Modern Syntax**: ES6+, imports/exports, async/await

## 🎨 What's Included

### Template Files
- Complete WordPress template hierarchy
- Semantic HTML5 markup
- Clean, minimal code structure

### Components
- Bootstrap 5 navigation with custom walker
- Simple recent posts example
- Basic footer structure

### Build Tools
- **Vite** for fast development and optimized builds
- **Live reload** for PHP file changes
- **File versioning** for cache busting

## 📋 Developer Notes

### This Framework Is For You If:
- ✅ You build custom WordPress themes professionally
- ✅ You're comfortable with modern JavaScript and build tools
- ✅ You want a clean starting point without bloat
- ✅ You prefer to customize code rather than use admin options
- ✅ You understand WordPress template hierarchy and hooks

### This Framework Is NOT For You If:
- ❌ You're looking for a ready-to-use theme
- ❌ You prefer GUI theme customizers
- ❌ You're not familiar with command line tools
- ❌ You need extensive documentation for basic WordPress concepts

## 🤝 Development Philosophy

**Clean Foundation Over Feature Bloat**
- Minimal starting point that's easy to understand and modify
- Modern tools without unnecessary complexity
- Performance-first approach to all decisions

**Developer Freedom**
- Modify any part of the framework to fit your needs
- Replace systems (config, build tools, etc.) as required
- No vendor lock-in or proprietary systems

**Professional Quality**
- Production-ready code from day one
- Follows WordPress and web development best practices
- Optimized for client project requirements

## 📄 License

This theme is licensed under the [GPL v2 or later](https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html), the same license as WordPress.

## 🙏 Credits

- **[Underscores (_s)](http://underscores.me/)** - The solid foundation
- **[Bootstrap](https://getbootstrap.com/)** - Responsive CSS framework
- **[Vite](https://vitejs.dev/)** - Modern build tool
- **[WordPress](https://wordpress.org/)** - The content management system

---

> **Professional WordPress theme development made modern.**