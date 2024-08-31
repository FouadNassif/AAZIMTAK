<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WeddingDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wedding_details')->insert([
            [
                'wedding_id' => 2,
                'wedding_date' => '2024-11-03',
                'ceremony_place' => 'Garden of Eden',
                'ceremony_time' => '17:00:00',
                'ceremony_maps' => 'https://maps.google.com/?q=Garden+of+Eden',
                'party_place' => 'Royal Palace',
                'party_time' => '20:00:00',
                'party_maps' => 'https://maps.google.com/?q=Royal+Palace',
                'gift_type' => 'Cash',
                'gift_details' => 'Bring Cash to the Wedding',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
