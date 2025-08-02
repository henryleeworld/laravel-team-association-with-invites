<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        $users = [
            [
                'id'             => 1,
                'name'           => __('Administrator'),
                'email'          => 'admin@admin.com',
                'password'       => Hash::make('password'),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
