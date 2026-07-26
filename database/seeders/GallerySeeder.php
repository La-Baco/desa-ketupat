<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galleries = [
            [
                'title' => 'Suasana Dermaga Nelayan Desa Ketupat',
                'description' => 'Aktivitas pagi nelayan Desa Ketupat saat membongkar hasil tangkapan laut segar.',
                'image' => 'images/placeholder.jpg',
                'event_date' => now()->subDays(3)->format('Y-m-d'),
            ],
            [
                'title' => 'Musrenbangdes Desa Ketupat 2026',
                'description' => 'Dokumentasi pelaksanaan musyawarah perencanaan pembangunan desa di balai desa.',
                'image' => 'images/placeholder.jpg',
                'event_date' => now()->subDays(6)->format('Y-m-d'),
            ],
            [
                'title' => 'Keindahan Sunset di Pantai Ketupat Raas',
                'description' => 'Pemandangan matahari terbenam yang mempesona di tepi pantai pesisir desa.',
                'image' => 'images/placeholder.jpg',
                'event_date' => now()->subDays(10)->format('Y-m-d'),
            ],
            [
                'title' => 'Kerja Bakti Warga Bersih Lingkungan',
                'description' => 'Kebersamaan warga dan aparatur desa membersihkan area publik desa.',
                'image' => 'images/placeholder.jpg',
                'event_date' => now()->subDays(15)->format('Y-m-d'),
            ],
            [
                'title' => 'Pelatihan Sentra UMKM Olahan Ikan',
                'description' => 'Ibu-ibu warga desa mengikuti sesi pembuatan dan pengemasan kerupuk ikan.',
                'image' => 'images/placeholder.jpg',
                'event_date' => now()->subDays(20)->format('Y-m-d'),
            ],
            [
                'title' => 'Pelayanan Administrasi Kependudukan di Balai Desa',
                'description' => 'Pelayanan publik ramah dan cepat bagi masyarakat Desa Ketupat.',
                'image' => 'images/placeholder.jpg',
                'event_date' => now()->subDays(25)->format('Y-m-d'),
            ],
        ];

        foreach ($galleries as $item) {
            Gallery::updateOrCreate(
                ['title' => $item['title']],
                $item
            );
        }
    }
}
