<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subscription;

class SubscriptionSeeder extends Seeder
{
    public function run()
    {
        Subscription::insert([
            [
                'name' => 'Free',
                'price' => 0.00,
                'max_invitations' => 1,
                'customizable' => false,
                'guest_management' => false,
                'image_upload' => false,
                'video_upload' => false,
                'duration_days' => 7,
            ],
            [
                'name' => 'Premium',
                'price' => 9.99,
                'max_invitations' => 5,
                'customizable' => true,
                'guest_management' => true,
                'image_upload' => true,
                'video_upload' => false,
                'duration_days' => 30,
            ],
            [
                'name' => 'Deluxe',
                'price' => 19.99,
                'max_invitations' => 9999,
                'customizable' => true,
                'guest_management' => true,
                'image_upload' => true,
                'video_upload' => true,
                'duration_days' => 365,
            ],
        ]);
    }
}
