export default defineConfig({
    base: '/build/', // relativo al dominio (¡NO http!)
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/js/react/main.jsx',
            ],
            refresh: true,
        }),
        react(),
    ],
});
