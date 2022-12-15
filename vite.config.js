import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/scss/app.scss', 'resources/css/acc.css',
                'resources/css/salle.css','resources/js/app.js'],
            refresh: true,
        }),
    ],
});
