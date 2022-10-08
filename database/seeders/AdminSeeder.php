<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Admin = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => 'admin',
            ],
        ];
        $user = [
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => 'user123',
            ],
        ];
        $settings = [
            [
                'logo'=> "logo.png",
                'name'=> "Site",
                'description'=> "my first site",
                'social'=> "www.facebook.com|www.twitter.com|www.instagram.com|www.google.com",
                'photo'=> "banner.jpg",
            ],
        ];
        foreach ($Admin as $key => $value) {
            Admin::create($value);
        }
        foreach ($user as $key => $value) {
            User::create($value);

        }
        foreach ($settings as $key => $value) {
            Settings::create($value);

        }
    }
}
