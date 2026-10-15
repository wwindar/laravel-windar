<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AlatMedisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(AlatSeeder::class);
    }
}
