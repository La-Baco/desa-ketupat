<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DesaStatistic;

class DesaStatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stats = [
            ['name' => 'Jumlah Penduduk', 'value' => 2540, 'unit' => 'Jiwa', 'year' => 2026, 'category' => 'penduduk'],
            ['name' => 'Jumlah Kepala Keluarga', 'value' => 745, 'unit' => 'KK', 'year' => 2026, 'category' => 'penduduk'],
            ['name' => 'Jumlah Dusun', 'value' => 4, 'unit' => 'Dusun', 'year' => 2026, 'category' => 'wilayah'],
            ['name' => 'Jumlah RT', 'value' => 12, 'unit' => 'RT', 'year' => 2026, 'category' => 'wilayah'],
            ['name' => 'Jumlah RW', 'value' => 4, 'unit' => 'RW', 'year' => 2026, 'category' => 'wilayah'],
            ['name' => 'Penduduk Laki-laki', 'value' => 1260, 'unit' => 'Jiwa', 'year' => 2026, 'category' => 'gender'],
            ['name' => 'Penduduk Perempuan', 'value' => 1280, 'unit' => 'Jiwa', 'year' => 2026, 'category' => 'gender'],
        ];

        foreach ($stats as $stat) {
            DesaStatistic::updateOrCreate(
                ['name' => $stat['name'], 'year' => $stat['year']],
                $stat
            );
        }
    }
}
