<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Potensi;
use Illuminate\Support\Str;

class PotensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $potensis = [
            [
                'name' => 'Hasil Laut & Budidaya Ikan Kerapu',
                'category' => 'Perikanan',
                'description' => 'Desa Ketupat dikelilingi perairan laut jernih yang menjadi tempat berkembang biaknya tangkapan tangguh seperti ikan kerapu sunu, lobster, tongkol, dan cumi-cumi segar dengan kualitas terbaik.',
                'location' => 'Kawasan Pesisir & Keramba Laut Ketupat',
                'image' => null,
                'is_featured' => true,
            ],
            [
                'name' => 'Produksi Minyak Kelapa Murni (VCO)',
                'category' => 'Produk Unggulan',
                'description' => 'Minyak kelapa murni yang diolah secara tradisional-higienis oleh kelompok ibu-ibu desa dari hasil kebun kelapa segar Pulau Raas tanpa bahan kimia sintestis.',
                'location' => 'Sentra Olahan Kelapa Dusun II',
                'image' => null,
                'is_featured' => true,
            ],
            [
                'name' => 'Kerupuk Ikan & Terasi Khas Raas',
                'category' => 'UMKM',
                'description' => 'Produk olahan pangan gurih khas berbahan baku ikan segar pilihan dan udang rebon asli perairan Desa Ketupat yang renyah dan nikmat.',
                'location' => 'Sentra UMKM Pangan Ketupat',
                'image' => null,
                'is_featured' => true,
            ],
            [
                'name' => 'Wisata Bahari Pantai Ketupat',
                'category' => 'Wisata',
                'description' => 'Pantai pasir putih alami dengan panorama matahari terbit dan gugusan terumbu karang yang eksotis sangat cocok untuk kegiatan snorkeling dan wisata bahari.',
                'location' => 'Pesisir Timur Desa Ketupat',
                'image' => null,
                'is_featured' => true,
            ],
            [
                'name' => 'Kerajinan Anyaman Daun Lontar',
                'category' => 'Kerajinan',
                'description' => 'Kerajinan tangan khas karya warga lokal yang mengolah daun lontar dan kelapa menjadi tas, tikar, dan pernak-pernik souvenir indah.',
                'location' => 'Dusun III Desa Ketupat',
                'image' => null,
                'is_featured' => false,
            ],
        ];

        foreach ($potensis as $item) {
            $item['slug'] = Str::slug($item['name']);
            Potensi::updateOrCreate(
                ['slug' => $item['slug']],
                $item
            );
        }
    }
}
