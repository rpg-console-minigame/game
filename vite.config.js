import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    base: './', // Base URL para la aplicación
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',        // Asegúrate de mantener otros archivos
                'resources/js/react/main.jsx' // Agrega aquí tu archivo React
            ],
            refresh: true, // Recarga automática para desarrollo
        }),
        react(), // Plugin para soporte de React
    ],
});
