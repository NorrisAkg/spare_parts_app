<?php

namespace Database\Seeders;

use App\Core\Users\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "firstname"          => "Admin",
            "lastname"           => "Admin",
            "email"              => "admin@email.com",
            "password"           => "@admin2023",
            "is_admin"           => true,
            "email_verified_at"  => now(),
            "created_at"         => now(),
            "updated_at"         => now(),
        ]);
    }
}
