import { defineConfig } from 'vite';
import './bootstrap';
import '../css/app.css'; 
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel([
            'resources/css/app.css',
            'resources/js/app.js',
        ]),
    ],
});
