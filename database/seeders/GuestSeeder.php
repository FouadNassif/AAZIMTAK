<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('guests')->insert([
            [
                'wedding_id' => 1,
                'name' => 'John Doe',
                'attending_status' => 'attending',
                'message' => 'Looking forward to the wedding!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'wedding_id' => 1,
                'name' => 'Jane Smith',
                'attending_status' => 'maybe',
                'message' => 'I might be able to make it.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'wedding_id' => 2,
                'name' => 'Alice Johnson',
                'attending_status' => 'not attending',
                'message' => 'Sorry, I can’t make it.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'wedding_id' => 2,
                'name' => 'Bob Brown',
                'attending_status' => 'attending',
                'message' => 'Excited for the wedding!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
