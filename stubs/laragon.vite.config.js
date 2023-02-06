import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from "@vitejs/plugin-react";
import basicSsl from '@vitejs/plugin-basic-ssl';
import {resolve} from 'path';

const host = 'laravel.test';

export default defineConfig({
    server: {
        hmr: {host},
        host,
        cors: true,
        https: https(host),
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

function https(host) {
    let keyPath = resolve(homedir(), "C:/laragon/etc/ssl/laragon.key");
    let certificatePath = resolve(homedir(), "C:/laragon/etc/ssl/laragon.crt");

    if (!fs.existsSync(keyPath)) {
        return {}
    }

    if (!fs.existsSync(certificatePath)) {
        return {}
    }

    return {
        key: fs.readFileSync(keyPath),
        cert: fs.readFileSync(certificatePath),
    }
}

