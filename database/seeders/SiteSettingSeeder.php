<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteSetting::updateOrCreate(
            ['id' => 1],
            [
                'site_name' => 'Desa Ketupat',
                'logo' => null,
                'favicon' => null,
                'description' => 'Website Resmi dan Portal Informasi Desa Ketupat, Kecamatan Raas, Kabupaten Sumenep, Provinsi Jawa Timur.',
                'email' => 'kontak@desaketupat.id',
                'phone' => '+62 812-3456-7890',
                'address' => 'Jl. Raya Desa Ketupat No. 01, Pulau Raas, Kabupaten Sumenep, Jawa Timur 69493',
                'facebook' => 'https://facebook.com/desaketupatraas',
                'instagram' => 'https://instagram.com/desaketupat_official',
                'youtube' => 'https://youtube.com/@desaketupatraas',
            ]
        );
    }
}
