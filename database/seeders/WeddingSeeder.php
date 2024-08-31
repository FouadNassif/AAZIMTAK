<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WeddingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('weddings')->insert([
            [
                'bride_name' => 'Lina',
                'groom_name' => 'Joseph',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'bride_name' => 'Sarah',
                'groom_name' => 'David',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
