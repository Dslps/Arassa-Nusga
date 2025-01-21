import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: '192.168.0.104',
        port: 5173,
        strictPort: true,
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',                    // Основной CSS
                'node_modules/jquery/dist/jquery.min.js',   // jQuery из node_modules
                'node_modules/slick-carousel/slick/slick.css', // CSS для Slick
                'node_modules/slick-carousel/slick/slick-theme.css', // Тема для Slick
                'node_modules/slick-carousel/slick/slick.min.js', // JS для Slick
                'resources/js/app.js',                     // Ваш основной JS
                'node_modules/@fortawesome/fontawesome-free/css/all.min.css',
            ],
            refresh: true,
        }),
    ],
    assetsInclude: ['**/*.ttf'],
});
