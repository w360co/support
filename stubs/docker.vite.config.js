import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from "@vitejs/plugin-react";
import {resolve} from 'path';
import basicSsl from '@vitejs/plugin-basic-ssl';

const host='laravel.test';

export default defineConfig({
    server:{
        host: host,
        https: true
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
            '~bootstrap': resolve(__dirname, 'node_modules/bootstrap')
        }
    },
    build: {
        chunkSizeWarningLimit: 1600,
    },
});