# WPForPro WordPress Theme

> **Modern WordPress development theme built on Underscores foundation with contemporary tools and architecture**

A highly customized WordPress theme that began with the [Underscores (_s)](http://underscores.me/) framework but has been extensively modernized with cutting-edge development tools, performance optimizations, and modern web development practices.

[![License: GPL v2](https://img.shields.io/badge/License-GPL%20v2-blue.svg)](https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html)
[![WordPress](https://img.shields.io/badge/WordPress-6.4+-blue.svg)](https://wordpress.org/)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3.3-purple.svg)](https://getbootstrap.com/)
[![Vite](https://img.shields.io/badge/Vite-7.0+-646CFF.svg)](https://vitejs.dev/)

## 🚀 Overview

**WPForPro** is a personal WordPress theme designed specifically for [wpforpro.com](https://wpforpro.com) - a blog focused on WordPress development, tutorials, and full-stack development resources. While it started with the solid foundation of Underscores, it has evolved into a modern, performance-optimized theme with contemporary development workflows.

### 🎯 Key Characteristics

- **🏗️ Modern Foundation**: Built on Underscores (_s) framework with extensive customizations
- **⚡ Performance First**: Custom Bootstrap build with 60% size reduction (200KB → 90KB)
- **🛠️ Developer-Focused**: Designed for full-stack WordPress developers
- **📱 Responsive Design**: Mobile-first approach with Bootstrap 5 grid system
- **🎨 Component-Driven**: Modular architecture with reusable components
- **🔧 Modern Tooling**: Vite build system, ES6+ modules, SASS 7-1 architecture

## ✨ Features

### 🏛️ Architecture & Structure

- **SASS 7-1 Architecture**: Complete implementation of industry-standard SASS organization
- **BEM Methodology**: CSS classes following Block Element Modifier convention
- **Component-Driven Design**: Reusable UI components and template blocks
- **Semantic HTML5**: Modern, accessible markup throughout

### 🚀 Performance Optimizations

- **Custom Bootstrap Build**: Only essential components (60% size reduction)
- **Modern JavaScript**: ES6+ modules with tree-shaking
- **CSS Optimization**: PostCSS processing with autoprefixer and cssnano
- **SEO-Optimized**: Comprehensive meta tags, structured data, and social sharing
- **Image Optimization**: WebP support, lazy loading, and responsive images

### 🛠️ Modern Development Tools

- **Vite Build System**: Fast development server with HMR (Hot Module Replacement)
- **ES6+ JavaScript**: Modern JavaScript with Babel transpilation
- **SASS Preprocessing**: Advanced CSS preprocessing with variables and mixins
- **Code Quality Tools**: ESLint, StyleLint, and WordPress coding standards
- **Git Integration**: Version control with meaningful commit history

### 🎨 Design Features

- **Bootstrap 5 Integration**: Modern responsive framework
- **Custom Color Palette**: Carefully crafted color scheme
- **Typography**: Lato font family with multiple weights
- **Animations**: Smooth transitions and hover effects
- **Dark Mode Support**: System preference detection

## 📋 Requirements

- **WordPress**: 6.0 or higher
- **PHP**: 7.4 or higher
- **Node.js**: 16 or higher
- **Composer**: For PHP dependencies

## 🚀 Installation & Setup

### 1. Download & Install

```bash
# Clone or download the theme
cd wp-content/themes/
git clone [repository-url] wpforpro
cd wpforpro
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### 3. Build Assets

```bash
# Production build
npm run build

# Development with hot reloading
npm run dev
```

## 🛠️ Development Commands

### Build System (Vite)
```bash
npm run dev         # Start development server with hot reloading
npm run build       # Build for production (outputs to dist/)
npm run preview     # Preview production build locally
npm run watch       # Build and watch for changes
npm run clean       # Remove dist directory
npm run fresh       # Clean build from scratch
```

### Code Quality & Linting
```bash
npm run lint:scss   # Check SASS files against CSS coding standards
npm run lint:js     # Check JavaScript files against JS coding standards
npm run lint        # Run both SCSS and JS linting

composer lint:wpcs  # Check PHP files against WordPress coding standards
composer lint:php   # Check PHP files for syntax errors
```

### Build & Distribution
```bash
npm run compile:rtl # Generate RTL stylesheet from built CSS
npm run bundle      # Generate .zip archive for distribution
composer make-pot   # Generate .pot translation file
```

## 📁 Project Structure

```
wpforpro/
├── 📂 assets/              # Static assets (images, fonts)
├── 📂 dist/                # Built assets (generated)
├── 📂 inc/                 # WordPress functionality
│   ├── 📄 seo-functions.php        # SEO enhancements
│   ├── 📄 template-functions.php   # Custom functions
│   ├── 📄 template-setup.php       # Theme setup
│   └── 📄 walker-nav-class.php     # Bootstrap 5 navigation
├── 📂 src/                 # Source files
│   ├── 📂 js/              # JavaScript modules
│   │   ├── 📂 modules/     # ES6+ modules
│   │   ├── 📄 main.js      # Frontend entry point
│   │   └── 📄 admin.js     # Admin scripts
│   └── 📂 sass/            # SASS 7-1 architecture
│       ├── 📂 abstracts/   # Variables, mixins
│       ├── 📂 base/        # Base styles
│       ├── 📂 components/  # UI components
│       ├── 📂 layouts/     # Layout styles
│       ├── 📂 pages/       # Page-specific styles
│       ├── 📂 utilities/   # Helper classes
│       └── 📂 vendors/     # Third-party CSS
├── 📂 template-blocks/     # Custom blocks
├── 📂 template-parts/      # Template components
├── 📄 style.css           # WordPress theme info
├── 📄 functions.php       # Main functions file
├── 📄 index.php           # Main template
└── 📄 front-page.php      # Homepage template
```

## 🎨 SASS 7-1 Architecture

The theme implements the complete SASS 7-1 architecture pattern:

- **`abstracts/`** - Variables, mixins, functions (Bootstrap overrides)
- **`vendors/`** - Third-party CSS (Custom Bootstrap build, normalize)
- **`base/`** - Base styles, typography, elements
- **`layouts/`** - Layout-specific styles (header, footer, sidebars)
- **`components/`** - Reusable UI components (blocks, navigation, comments)
- **`pages/`** - WordPress page-specific styles (home, blog, archive)
- **`utilities/`** - Helper classes, accessibility utilities
- **`plugins/`** - Plugin-specific styles (Yoast SEO integration)

## ⚙️ Custom Features

### 🎯 Template Blocks
- **Hero Section**: Site introduction with floating animations
- **Resources & Guides**: Featured WordPress tutorials and guides
- **Recent Posts**: Blog posts with featured post layout

### 🧭 Navigation
- **Bootstrap 5 Walker**: Custom navigation walker for Bootstrap dropdowns
- **Hover Effects**: Smooth transitions and animations
- **Mobile Responsive**: Collapsible mobile navigation

### 🦶 Footer
- **Modern Design**: Four-column layout with brand, services, projects, and about sections
- **Social Links**: GitHub, Portfolio, LinkedIn integration
- **Responsive**: Adapts to mobile with stacked layout

### 🔍 SEO Enhancements
- **Meta Tags**: Dynamic meta descriptions and Open Graph tags
- **Structured Data**: JSON-LD schema markup (compatible with Yoast SEO)
- **Performance**: Image optimization, WebP support, lazy loading
- **Social Sharing**: Twitter Cards and Facebook Open Graph integration

### ⚙️ Centralized Configuration System
- **Single Source of Truth**: All site settings, social links, and content managed from one file
- **No Admin Dashboard Needed**: Perfect for custom themes - no database overhead
- **Feature Flags**: Easy enable/disable of theme features and integrations
- **Developer Friendly**: Simple PHP configuration with dot notation access

## 🔧 Customization

### Fonts
The theme uses Google Fonts with Lato as the primary font family. Font configuration is handled in `functions.php`:

```php
const GOOGLE_FONT_PATH = 'https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&display=swap';
```

### Colors
Primary colors can be customized in `src/sass/abstracts/_variables.scss`:

```scss
$primary: #your-color;
$secondary: #your-secondary-color;
```

### Bootstrap Customization
Modify `src/sass/vendors/_bootstrap-custom.scss` to include/exclude Bootstrap components.

## 🤝 Contributing

This is a personal theme for wpforpro.com, but contributions and suggestions are welcome:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

This theme is licensed under the [GPL v2 or later](https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html), the same license as WordPress.

```
WPForPro WordPress Theme, Copyright 2024 Josanu Andrei
WPForPro is distributed under the terms of the GNU GPL v2 or later.

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
```

## 🙏 Credits

- **[Underscores (_s)](http://underscores.me/)** - The foundation framework that started it all
- **[Bootstrap](https://getbootstrap.com/)** - Responsive CSS framework
- **[Vite](https://vitejs.dev/)** - Modern build tool and development server
- **[WordPress](https://wordpress.org/)** - The content management system

## 👨‍💻 Author

**Josanu Andrei**
- Website: [josanua.github.io/mycv](https://josanua.github.io/mycv/)
- Blog: [wpforpro.com](https://wpforpro.com)
- GitHub: [@josanua](https://github.com/josanua)

---

> **Note**: This theme is specifically designed for wpforpro.com and may require customization for other use cases. It prioritizes performance and modern development practices over broad compatibility.