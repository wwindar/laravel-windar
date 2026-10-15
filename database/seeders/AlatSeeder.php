<?php

namespace Database\Seeders;

use App\Models\Alat;
use Illuminate\Database\Seeder;

class AlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alats = [
            [
                'nama_alat' => 'Elektrokardiograf (EKG)',
                'merek' => 'GE Healthcare',
                'tahun' => 2021,
                'lokasi' => 'IGD',
            ],
            [
                'nama_alat' => 'Ventilator Mekanik',
                'merek' => 'Hamilton Medical',
                'tahun' => 2022,
                'lokasi' => 'ICU',
            ],
            [
                'nama_alat' => 'Defibrillator Biphasic',
                'merek' => 'Mindray',
                'tahun' => 2020,
                'lokasi' => 'IGD',
            ],
            [
                'nama_alat' => 'USG 4D Diagnostic',
                'merek' => 'Samsung Medison',
                'tahun' => 2023,
                'lokasi' => 'Poli Obgyn',
            ],
            [
                'nama_alat' => 'Syringe Pump',
                'merek' => 'Terumo',
                'tahun' => 2022,
                'lokasi' => 'ICU',
            ],
            [
                'nama_alat' => 'Patient Monitor 7 Parameter',
                'merek' => 'Philips',
                'tahun' => 2021,
                'lokasi' => 'Ruang OK',
            ],
            [
                'nama_alat' => 'Mesin Anestesi',
                'merek' => 'Dräger',
                'tahun' => 2020,
                'lokasi' => 'Ruang OK',
            ],
            [
                'nama_alat' => 'X-Ray Mobile Diagnostic',
                'merek' => 'Siemens Health',
                'tahun' => 2023,
                'lokasi' => 'Radiologi',
            ],
        ];

        foreach ($alats as $item) {
            Alat::updateOrCreate(
                ['nama_alat' => $item['nama_alat']],
                $item
            );
        }
    }
}
