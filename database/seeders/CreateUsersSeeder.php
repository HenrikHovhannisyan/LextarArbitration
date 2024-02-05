<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'phone' => '+447407605360',
                'is_admin' => '1',
                'password' => bcrypt('123456789'),
            ],

            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'phone' => '+447407605361',
                'is_admin' => '0',
                'password' => bcrypt('123456789'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
