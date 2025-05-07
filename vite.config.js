import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/js/app.js', 'resources/js/react/main.jsx'],
      refresh: true,
    }),
    react(),
  ],
  build: {
    manifest: true,
    outDir: 'public/build',
    rollupOptions: {
      input: ['resources/js/app.js', 'resources/js/react/main.jsx'],
    },
  },
});
