<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AparaturDesa;

class AparaturDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aparatur = [
            [
                'name' => 'H. Ahmad Syarif, S.Sos.',
                'position' => 'Kepala Desa',
                'photo' => 'images/kades.jpg',
                'description' => 'Memimpin jalannya pemerintahan Desa Ketupat secara berintegritas, melayani masyarakat sepenuh hati, dan mendorong pembangunan desa yang berkelanjutan.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Moh. Zainuddin, S.Pd.',
                'position' => 'Sekretaris Desa',
                'photo' => null,
                'description' => 'Mengkoordinasikan administrasi pemerintahan desa dan pengelolaan dokumen pelayanan publik.',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Siti Nurhayati, S.E.',
                'position' => 'Kaur Keuangan',
                'photo' => null,
                'description' => 'Mengelola keuangan desa, penyusunan APBDes, dan akuntabilitas anggaran APBDes.',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Fathur Rahman, S.IP.',
                'position' => 'Kaur Perencanaan',
                'photo' => null,
                'description' => 'Menyusun RKPDes dan dokumen perencanaan program pembangunan skala desa.',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Abdur Rasjid',
                'position' => 'Kasi Pemerintahan',
                'photo' => null,
                'description' => 'Mengurus administrasi kependudukan, pertanahan, dan ketentraman wilayah desa.',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Nurul Hidayah',
                'position' => 'Kasi Kesejahteraan',
                'photo' => null,
                'description' => 'Mengelola program bantuan sosial, pemberdayaan ekonomi warga, dan kesehatan.',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($aparatur as $data) {
            AparaturDesa::updateOrCreate(
                ['position' => $data['position']],
                $data
            );
        }
    }
}
