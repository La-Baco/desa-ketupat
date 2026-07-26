<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agenda;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agendas = [
            [
                'title' => 'Posyandu Balita & Lansia Rutin Dusun I',
                'description' => 'Pemeriksaan kesehatan, penimbangan balita, dan pemberian makanan tambahan (PMT).',
                'event_date' => now()->addDays(3)->format('Y-m-d'),
                'start_time' => '08:00',
                'end_time' => '11:30',
                'location' => 'Poskesdes Desa Ketupat',
                'image' => null,
            ],
            [
                'title' => 'Kerja Bakti Massal Sambut HUT RI',
                'description' => 'Pembersihan jalan utama desa, pengecatan gapura, dan pemasangan bendera merah putih.',
                'event_date' => now()->addDays(8)->format('Y-m-d'),
                'start_time' => '07:00',
                'end_time' => '10:00',
                'location' => 'Sepanjang Jalan Utama Desa Ketupat',
                'image' => null,
            ],
            [
                'title' => 'Pengajian Rutin dan Doa Bersama Nelayan Raas',
                'description' => 'Kegiatan pengajian dan syukuran keselamatan melaut bagi seluruh kelompok nelayan Desa Ketupat.',
                'event_date' => now()->addDays(12)->format('Y-m-d'),
                'start_time' => '19:30',
                'end_time' => '21:30',
                'location' => 'Masjid Jami\' Desa Ketupat',
                'image' => null,
            ],
        ];

        foreach ($agendas as $agenda) {
            Agenda::updateOrCreate(
                ['title' => $agenda['title']],
                $agenda
            );
        }
    }
}
