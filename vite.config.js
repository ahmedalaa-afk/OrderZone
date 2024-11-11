import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            input: [
                'public/css/style.css',
                'public/js/main.js',
            ],
            refresh: true,
        }),
    ],
});
