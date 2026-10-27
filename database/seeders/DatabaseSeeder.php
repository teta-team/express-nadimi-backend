<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // The default super user (admin / admin) is created by the
        // "add_username_and_superuser_to_users_table" migration.
        // Recreate it here only if it is missing (e.g. after truncating users).
        User::firstOrCreate(
            ['username' => 'admin'],
            ['name' => 'Admin', 'password' => 'admin']
        )->forceFill(['is_superuser' => true])->save();
    }
}
