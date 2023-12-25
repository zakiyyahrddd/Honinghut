<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PrivilegeCodeSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(StaffSeeder::class);
    }
}
