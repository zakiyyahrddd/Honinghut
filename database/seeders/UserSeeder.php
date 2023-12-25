<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Superadmin',
                'username' => 'superadmin',
                'email' => 'superadmin@kadangkoding.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
                'role_id' => 1,
                'type' => 'staff',
                'created_at' => now()
            ]
        ]);
    }
}
