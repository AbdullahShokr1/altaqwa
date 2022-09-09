<?php

namespace Database\Seeders;

use App\Models\Admin;
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
        foreach ($Admin as $key => $value) {
            Admin::create($value);
        }
        foreach ($user as $key => $value) {
            User::create($value);

        }
    }
}
