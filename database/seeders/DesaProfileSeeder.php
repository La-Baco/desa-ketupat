<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DesaProfile;

class DesaProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DesaProfile::updateOrCreate(
            ['id' => 1],
            [
                'sejarah' => 'Desa Ketupat merupakan salah satu desa bersejarah yang terletak di Kecamatan Raas, Kabupaten Sumenep, Kepulauan Madura, Jawa Timur. Berada di gugusan kepulauan yang indah, Desa Ketupat tumbuh menjadi pusat peradaban lokal yang kaya akan nilai kebudayaan, kearifan lokal bahari, serta keharmonisan antar warga.',
                'deskripsi' => 'Desa Ketupat adalah desa pesisir dan kepulauan di Kecamatan Raas, Kabupaten Sumenep yang kaya akan potensi hasil laut, perkebunan kelapa, serta usaha mikro kecil dan menengah (UMKM). Masyarakat Desa Ketupat dikenal ramah, religius, dan bergotong royong.',
                'visi' => 'Terwujudnya Desa Ketupat yang Maju, Mandiri, Sejahtera, Transparan, dan Berdaya Saing Berlandaskan Gotong Royong dan Nilai-Nilai Religius.',
                'misi' => "1. Meningkatkan kualitas tata kelola pemerintahan desa yang bersih, transparan, dan akuntabel.\n2. Mengembangkan potensi ekonomi desa di sektor kelautan, pertanian, dan UMKM berbasis teknologi ramah lingkungan.\n3. Meningkatkan ketersediaan dan kualitas infrastruktur publik yang inklusif serta merata di seluruh dusun.\n4. Menguatkan kualitas sumber daya manusia (SDM) melalui peningkatan pendidikan, pelayanan kesehatan, dan pembinaan pemuda.\n5. Melestarikan nilai-nilai kebudayaan lokal, keagamaan, dan gotong royong dalam kehidupan bermasyarakat.",
                'sambutan' => 'Assalamu\'alaikum Warahmatullahi Wabarakatuh, Salam Sejahtera untuk kita semua.\n\nPuji syukur kita panjatkan kehadirat Allah SWT atas rahmat dan karunia-Nya, peluncuran Website Resmi Portal Informasi Desa Ketupat Kecamatan Raas ini dapat terwujud.\n\nWebsite ini kami hadirkan sebagai sarana keterbukaan informasi publik, pelayanan digital desa, serta media komunikasi interaktif antara Pemerintah Desa Ketupat dengan seluruh lapisan masyarakat dan khalayak umum. Melalui portal ini, kami berkomitmen menyajikan data profil desa, pelayanan publik, potensi ekonomi, berita pembangunan, serta transparansi tata kelola desa secara akurat dan akuntabel.\n\nMari bersama-sama kita dukung kemajuan Desa Ketupat menuju masa depan yang lebih cerah, sejahtera, dan bermartabat. Wassalamu\'alaikum Wr. Wb.',
                'foto_kantor' => 'images/kantor.jpg',
            ]
        );
    }
}
