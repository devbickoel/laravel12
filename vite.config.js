import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

const oneYearInSeconds = 60 * 60 * 24 * 365;
export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],

    server: {
        https: true,
        headers: {
        "Strict-Transport-Security": `max-age=${oneYearInSeconds}`,
        },
    },
});
