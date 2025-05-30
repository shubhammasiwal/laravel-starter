<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\LGDStateSeeder;
use Database\Seeders\LGDDistrictSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /**
         * Seed initial users for the application with predefined names and emails.
         * All users are created with the password 'Admin@123', securely hashed using Laravel's Hash facade.
         * These users provide initial administrative and operational access to the application.
         */
        User::factory()->create([
            'name' => 'Portal Admin NIC',
            'email' => 'portaladminnic@dummy.com',
            'password' => Hash::make('Admin@123'),
        ]);

        User::factory()->create([
            'name' => 'Admin NIC',
            'email' => 'adminnic@dummy.com',
            'password' => Hash::make('Admin@123'),
        ]);

        User::factory()->create([
            'name' => 'Welfare Commissioner NIC',
            'email' => 'welfarecommissionernic@dummy.com',
            'password' => Hash::make('Admin@123'),
        ]);

        User::factory()->create([
            'name' => 'Data Operator NIC',
            'email' => 'dataoperatornic@dummy.com',
            'password' => Hash::make('Admin@123'),
        ]);

        $this->call(PermissionSeeder::class);
        $this->call(LGDStateSeeder::class);
        $this->call(LGDDistrictSeeder::class);
    }
}
