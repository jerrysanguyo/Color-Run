<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate(
            [
                'email' => 'jsanguyo1624@gmail.com',
                'contact_number' => '092718252710',
            ],
            [
                'name' => 'Jerry Sanguyo Jr.',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
            ]
        );
        $user->assignRole('superadmin');
    }
}
