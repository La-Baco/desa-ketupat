<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            SiteSettingSeeder::class,
            DesaProfileSeeder::class,
            DesaStatisticSeeder::class,
            AparaturDesaSeeder::class,
            BeritaSeeder::class,
            AgendaSeeder::class,
            PotensiSeeder::class,
            GallerySeeder::class,
        ]);
    }
}
