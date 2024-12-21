import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/jquery.min.js', 'resources/js/app.js', 'resources/css/slick.css', 'resources/js/slick.min.js'],
            refresh: true,
        }),
    ],
});
