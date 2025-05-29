<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\PermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /**
         * Seed an admin user with the name 'Admin NIC' and email 'admin@dummy.com'.
         * The password is securely hashed using Laravel's Hash facade.
         * This user can be used for initial administrative access to the application.
         */
        User::factory()->create([
            'name' => 'Admin NIC',
            'email' => 'admin@dummy.com',
            'password' => Hash::make('Admin@123'), 
        ]);

        $this->call(PermissionSeeder::class);
    }
}
