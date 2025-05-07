import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    base: '/', // mantenemos esto
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/js/react/main.jsx'
            ],
            refresh: true,
        }),
        react(),
    ],
    server: {
        https: true, // solo afecta desarrollo, pero lo dejamos igual
    },
    build: {
        manifest: true, // importante para producción
    },
});
