import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from "@vitejs/plugin-react";
import {resolve} from 'path';
import basicSsl from '@vitejs/plugin-basic-ssl';


export default defineConfig({
    server: {
        https: true,
        host: 'laravel.test',
    },
    plugins: [
        react(),
        basicSsl(),
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/index.tsx'
            ],
            buildDirectory: 'bundle',
            refresh: true
        }),
    ],
    resolve: {
        alias: {
            '~bootstrap': resolve(__dirname, 'node_modules/bootstrap'),
        }
    },
});
