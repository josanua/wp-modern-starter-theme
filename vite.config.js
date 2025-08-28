import { defineConfig } from 'vite'
import liveReload from 'vite-plugin-live-reload'
import { viteStaticCopy } from 'vite-plugin-static-copy'
import { resolve } from 'path'

const localDevPath = 'http://theme-vite-framework.test/'

export default defineConfig({
  plugins: [
    liveReload([__dirname + '/**/*.php']),
    
    // Copy static assets
    viteStaticCopy({
      targets: [
        {
          src: 'assets/images/**/*',
          dest: 'assets/images'
        }
      ]
    })
  ],
  
  // Build configuration
  build: {
    outDir: 'dist',
    emptyOutDir: true,
    manifest: false,
    rollupOptions: {
      input: {
        main: resolve(__dirname + '/src/js/main.js'),
        admin: resolve(__dirname + '/src/js/admin.js'),
        blocks: resolve(__dirname + '/src/js/blocks.js')
      },
      output: {
        entryFileNames: '[name].js',
        chunkFileNames: '[name][hash].js',
        assetFileNames: (assetInfo) => {
          let extType = assetInfo.name.split('.')
          let extSuffix = extType[extType.length - 1]
          return `assets/${extSuffix}/[name][extname]`
        }
      }
    },
    minify: true
  },
  
  // Development server
  server: {
    cors: true,
    strictPort: true,
    port: 3001,
    open: localDevPath,
    https: false,
    hmr: {
      host: 'localhost',
      protocol: 'ws'
    }
  },
  
  // Source map configuration
  esbuild: {
    sourcemap: true
  },
  
  // CSS configuration
  css: {
    // PostCSS configuration will be loaded from postcss.config.js
    devSourcemap: true, // Enable source maps in development
    preprocessorOptions: {
      scss: {
        // Enable source maps for SCSS
        sourceMap: true,
        sourceMapContents: true
      }
    }
  },
  
  // Resolve configuration
  resolve: {
    alias: {
      '@': resolve(__dirname, 'src'),
      '@styles': resolve(__dirname, 'src/sass'),
      '@scripts': resolve(__dirname, 'src/js'),
      '@assets': resolve(__dirname, 'assets')
    }
  },
  
  // Define global constants
  define: {
    __THEME_VERSION__: JSON.stringify(process.env.npm_package_version || '1.0.0'),
    __DEV__: JSON.stringify(process.env.NODE_ENV === 'development')
  }
})