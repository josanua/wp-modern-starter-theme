# Setup Guide - WP Modern Starter

Quick setup guide for experienced WordPress developers using this theme framework.

## Prerequisites

- **Node.js 16+** with npm
- **WordPress 6.0+** development environment
- **PHP 7.4+**
- Basic familiarity with Vite, SASS, and modern JavaScript

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
- **JavaScript**: Edit files in `src/js/` (main.js, admin.js, blocks.js)
- **Styles**: Create `src/sass/` directory and build your SASS architecture
- **Static Assets**: Place images, fonts, etc. in `assets/`

### Development Server
- Vite serves assets from `localhost:3001` during development
- PHP file changes trigger browser refresh automatically
- JavaScript/CSS changes update instantly via HMR

### Building for Production
```bash
npm run build    # Creates optimized assets in dist/
npm run clean    # Removes dist/ directory
```

## Framework Customization

### Basic Configuration
Edit `inc/site-config.php`:
```php
private static $config = [
    'site' => [
        'author' => 'Your Name',
        'description' => 'Your site description'
    ],
    'content' => [
        'posts_per_page' => 6,
        'excerpt_length' => 25
    ]
];
```

### Build System
Modify `vite.config.js` to:
- Add new JavaScript entry points
- Configure asset paths
- Adjust development server settings
- Add build plugins

### Template Structure
- **Main Templates**: Follow WordPress template hierarchy
- **Template Parts**: Reusable components in `template-parts/`
- **Template Blocks**: Custom content sections in `template-blocks/`

## Common Customizations

### Adding New JavaScript Entry Point
1. Create file in `src/js/`
2. Add to `vite.config.js` rollupOptions.input
3. Enqueue in `functions.php` asset loading logic

### SASS Architecture Setup
```bash
# Create SASS structure (not included by default)
mkdir -p src/sass/{abstracts,base,components,layouts,pages,utilities,vendors}
```

### Custom Bootstrap Build
- Framework includes custom Bootstrap with essential components only
- Modify Bootstrap imports by editing Bootstrap-related files
- Rebuilds automatically with `npm run build`

## WordPress Integration

### Theme Functions
- Main functions in `functions.php`
- Modular functions in `inc/` directory
- Configuration helpers available via `site_config()`

### Asset Loading
- **Development**: Assets from Vite dev server (`localhost:3001`)
- **Production**: Assets from `dist/` with versioning
- **Automatic**: Switches based on `WP_DEBUG` and dev server status

### Template Usage
```php
// Get config values
$author = site_config('site.author', 'Default Name');

// Use in templates
echo esc_html($author);
```

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
- [ ] Check asset versioning for cache busting

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
- Firewall might block dev server
- Check network connectivity to `localhost:3001`

## Next Steps

This framework provides the foundation. Common next steps:
1. **Set up SASS architecture** in `src/sass/`
2. **Customize Bootstrap variables** and components
3. **Add your JavaScript modules** in `src/js/modules/`
4. **Create custom template parts** for your design
5. **Implement your custom post types** and fields
6. **Add build optimizations** in `vite.config.js`

---

*This framework is designed for experienced developers. Modify any part to fit your project needs.*