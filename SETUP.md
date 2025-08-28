# Setup Guide - WP Modern Starter

Quick setup guide for experienced WordPress developers using this theme framework.

## Prerequisites

- **Node.js 16+** with npm
- **WordPress 6.0+** development environment
- **PHP 7.4+**
- Basic familiarity with Vite and modern JavaScript

## Installation

### 1. Download Framework
```bash
# Clone to your themes directory
cd wp-content/themes/
git clone [your-repo-url] your-project-name
cd your-project-name
```

### 2. Install Dependencies
```bash
npm install
```

### 3. Start Development
```bash
# Starts Vite dev server on localhost:3001
npm run dev
```

### 4. Configure WordPress
- Ensure `WP_DEBUG` is `true` for development mode
- Activate the theme in WordPress admin

## Development Workflow

### Asset Development
- **JavaScript**: Create files in `src/js/` (main.js, admin.js, blocks.js)
- **Styles**: Create `src/sass/` directory for your SASS files
- **Static Assets**: Place images, fonts, etc. in `assets/`

### Development Environment
- **WordPress Site**: `http://theme-vite-framework.test/` (or your local setup)
- **Vite Dev Server**: `http://localhost:3001/` (assets only - don't browse directly)
- **Workflow**: Browse your WordPress site, assets load from Vite server automatically

### Development Workflow
- **WordPress Site**: Access your site through your local environment (e.g., `http://yoursite.test` with Valet)
- **Vite Dev Server**: Runs on `localhost:3001` - serves assets only (JS/CSS)
- **Live Reload**: PHP file changes trigger browser refresh on your WordPress site
- **HMR**: JavaScript/CSS changes update instantly without page refresh

### Building for Production
```bash
npm run build    # Creates optimized assets in dist/
npm run clean    # Removes dist/ directory
```

## Framework Structure

### Basic Configuration
Edit `inc/site-config.php`:
```php
private static $config = [
    'site' => [
        'author' => 'Your Name',
        'description' => 'Your site description'
    ]
];
```

### Build System
Modify `vite.config.js` to:
- Add new JavaScript entry points
- Configure asset paths
- Adjust development server settings

### Template Structure
- **Main Templates**: Follow WordPress template hierarchy
- **Template Parts**: Reusable components in `template-parts/`
- **Template Blocks**: Custom content sections in `template-blocks/`

## Common Customizations

### Adding New JavaScript Entry Point
1. Create file in `src/js/`
2. Add to `vite.config.js` rollupOptions.input
3. Update `functions.php` asset loading logic

### SASS Setup
```bash
# Create SASS structure
mkdir -p src/sass/{abstracts,base,components,layouts,pages,utilities}
```

### WordPress Integration
- Main functions in `functions.php`
- Configuration helpers via `site_config()`
- Bootstrap 5 + Font Awesome loaded from CDN

## Asset Loading

### Development Mode
- Assets served from Vite dev server (`localhost:3001`)
- Automatic detection when `WP_DEBUG` is true and dev server running

### Production Mode
- Assets loaded from `dist/` directory
- Automatic file versioning for cache busting

## Production Deployment

### Building Assets
```bash
npm run build
```

### Deployment Checklist
- [ ] Set `WP_DEBUG` to `false`
- [ ] Run `npm run build`
- [ ] Test that assets load from `dist/` directory
- [ ] Verify all functionality without dev server

### File Structure for Deployment
```
theme-folder/
├── dist/           # Built assets (required)
├── inc/            # WordPress functions
├── template-parts/ # Template components
├── template-blocks/# Content blocks
├── functions.php   # Main theme file
├── style.css      # WordPress theme header
└── ...            # Other theme files

# Not needed in production:
├── src/           # Source files
├── node_modules/  # Dependencies
├── package.json   # Build config
└── vite.config.js # Vite config
```

## Troubleshooting

### Assets Not Loading
- Check that Vite dev server is running (`npm run dev`)
- Verify `WP_DEBUG` is set correctly
- Check browser console for 404 errors

### Build Issues
- Clear `dist/` with `npm run clean`
- Reinstall dependencies: `rm -rf node_modules && npm install`
- Check Node.js version compatibility

### Development Server Issues
- Port 3001 might be in use - check `vite.config.js`
- Check network connectivity to `localhost:3001`

## Next Steps

This framework provides the foundation. Common next steps:
1. **Set up SASS architecture** in `src/sass/`
2. **Create your JavaScript modules** in `src/js/`
3. **Customize template parts** for your design
4. **Implement custom post types** and fields
5. **Add build optimizations** in `vite.config.js`

---

*This framework is designed for experienced developers. Modify any part to fit your project needs.*