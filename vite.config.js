import { defineConfig } from 'vite'
import liveReload from 'vite-plugin-live-reload'
import { viteStaticCopy } from 'vite-plugin-static-copy'
import { resolve } from 'path'

const localDevPath = 'http://theme-vite-framework.test/'

export default defineConfig({
  plugins: [
    // Live reload for PHP files
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
        main: resolve(__dirname, 'src/js/main.js')
        // Add more entry points as needed:
        // admin: resolve(__dirname, 'src/js/admin.js'),
        // blocks: resolve(__dirname, 'src/js/blocks.js')
      },
      output: {
        entryFileNames: '[name].js',
        chunkFileNames: '[name].[hash].js',
        assetFileNames: (assetInfo) => {
          const extType = assetInfo.name.split('.');
          const extSuffix = extType[extType.length - 1];
          return `assets/${extSuffix}/[name].[extname]`;
        }
      }
    }
  },
  
  // Development server
  server: {
    cors: true,
    strictPort: true,
    port: 3001,
    open: localDevPath,
    hmr: {
      host: 'localhost',
      protocol: 'ws'
    }
  },

    // Source map configuration
    esbuild: {
        sourcemap: true
    },
  
  // CSS preprocessing
  css: {
    devSourcemap: true,
    preprocessorOptions: {
      scss: {
        sourceMap: true
      }
    }
  },
  
  // Resolve aliases
  resolve: {
    alias: {
      '@': resolve(__dirname, 'src'),
      '@js': resolve(__dirname, 'src/js'),
      '@sass': resolve(__dirname, 'src/sass'),
      '@assets': resolve(__dirname, 'assets')
    }
  },

    // Define global constants
    define: {
        __THEME_VERSION__: JSON.stringify(process.env.npm_package_version || '1.0.0'),
        __DEV__: JSON.stringify(process.env.NODE_ENV === 'development')
    }
})