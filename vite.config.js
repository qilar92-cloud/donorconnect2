import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',

                /* Auth */
                'resources/css/auth/login.css',
                'resources/css/auth/register.css',
                'resources/css/auth/petugas-login.css',

                /* Dashboard */
                'resources/css/dashboard/pendonor.css',
                'resources/css/dashboard/petugas.css',

                /* Kegiatan Donor */
                'resources/css/kegiatan-donor/index.css',
                'resources/css/kegiatan-donor/show-pendonor.css',

                /* Hasil Donor */
                'resources/css/hasil-donor/create.css',

                /* Landing */
                'resources/css/landing/index.css',

                /* Laporan Donor */
                'resources/css/laporan-donor/index.css',

                /* Pendonor */
                'resources/css/pendonor/data-index.css',
                'resources/css/pendonor/data-edit.css',
                'resources/css/pendonor/data-show.css',
                'resources/css/pendonor/kegiatan.css',
                'resources/css/pendonor/pendaftaran-daftar.css',
                'resources/css/pendonor/profile.css',
                'resources/css/pendonor/profile-edit.css',
                'resources/css/pendonor/riwayat-donor.css',
                'resources/css/pendonor/status.css',

                /* Petugas */
                'resources/css/petugas/profile.css',
                'resources/css/petugas/profile-edit.css',
                'resources/css/petugas/riwayat-donor.css',

                /* Layout */
                'resources/css/layouts/app-layout.css',
            ],

            refresh: true,

            fonts: [
                bunny('Instrument Sans', {
                    weights: [400, 500, 600],
                }),
            ],
        }),

        tailwindcss(),
    ],

    server: {

        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});