<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $news = [
            [
                'title' => 'Musyawarah Perencanaan Pembangunan Desa (Musrenbangdes) Desa Ketupat Tahun 2026',
                'category' => 'Pemerintahan',
                'excerpt' => 'Pemerintah Desa Ketupat menggelar Musrenbangdes untuk menyerap aspirasi warga dalam menyusun rencana kerja pembangunan desa.',
                'content' => '<p><strong>Ketupat, Raas</strong> — Pemerintah Desa Ketupat menggelar Musyawarah Perencanaan Pembangunan Desa (Musrenbangdes) bertempat di Balai Desa Ketupat, Kecamatan Raas. Acara ini dihadiri oleh Kepala Desa, BPD, tokoh masyarakat, perwakilan perempuan, serta jemaah karang taruna.</p><p>Musrenbangdes bertujuan menetapkan prioritas kegiatan pembangunan fisik dan non-fisik untuk anggaran tahun berjalan. Beberapa program prioritas yang disepakati meliputi perbaikan jalan lingkar dusun, peningkatan dermaga nelayan, serta pelatihan UMKM olahan hasil laut.</p>',
                'status' => 'published',
                'published_at' => now()->subDays(2),
                'views' => 142,
            ],
            [
                'title' => 'Penyaluran Bantuan Langsung Tunai (BLT) Dana Desa Tahap I Berjalan Tertib',
                'category' => 'Kesejahteraan',
                'excerpt' => 'Sebanyak 75 Keluarga Penerima Manfaat (KPM) di Desa Ketupat menerima BLT Dana Desa tahap pertama tahun 2026.',
                'content' => '<p><strong>Ketupat, Raas</strong> — Penyaluran Bantuan Langsung Tunai Dana Desa (BLT-DD) tahap pertama disalurkan secara transparan di Kantor Desa Ketupat. Kepala Desa menyampaikan bahwa bantuan ini diperuntukkan bagi warga lansia, disabilitas, dan keluarga kurang mampu.</p><p>Warga menyampaikan terima kasih atas kepedulian pemerintah desa yang menyalurkan bantuan dengan tepat waktu dan tepat sasaran.</p>',
                'status' => 'published',
                'published_at' => now()->subDays(5),
                'views' => 98,
            ],
            [
                'title' => 'Gotong Royong Pembersihan Pesisir Pantai dan Dermaga Desa Ketupat',
                'category' => 'Lingkungan',
                'excerpt' => 'Ratusan warga bersama perangkat desa kompak membersihkan kawasan pesisir pantai untuk mewujudkan lingkungan yang asri.',
                'content' => '<p><strong>Ketupat, Raas</strong> — Dalam rangka menjaga kelestarian ekosistem laut dan pesisir Pulau Raas, warga Desa Ketupat menggelar aksi bersih pantai secara serentak. Aksi ini berhasil mengumpulkan sampah plastik dan puing yang langsung diangkut ke tempat pembuangan akhir.</p>',
                'status' => 'published',
                'published_at' => now()->subDays(9),
                'views' => 215,
            ],
            [
                'title' => 'Pelatihan Digitalisasi Marketing bagi Pelaku UMKM Kerajinan dan Kuliner Khas Raas',
                'category' => 'Ekonomi',
                'excerpt' => 'Pemerintah desa memfasilitasi workshop pemasaran digital untuk mendongkrak penjualan produk olahan ikan dan kerajinan warga.',
                'content' => '<p><strong>Ketupat, Raas</strong> — Pelaku UMKM Desa Ketupat mendapatkan pelatihan khusus mengenai pemasaran digital, pembuatan foto produk menarik, dan pemanfaatan media sosial serta e-commerce. Diharapkan produk unggulan desa seperti kerupuk ikan dan minyak kelapa murni dapat menjangkau pasar nasional.</p>',
                'status' => 'published',
                'published_at' => now()->subDays(14),
                'views' => 176,
            ],
        ];

        foreach ($news as $item) {
            $item['slug'] = Str::slug($item['title']);
            Berita::updateOrCreate(
                ['slug' => $item['slug']],
                $item
            );
        }
    }
}
