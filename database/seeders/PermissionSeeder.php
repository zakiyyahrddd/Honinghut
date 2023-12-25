<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'role_id' => 1,
                'privilege_code_id' => 1
            ],
            [
                'role_id' => 1,
                'privilege_code_id' => 2
            ],
            [
                'role_id' => 1,
                'privilege_code_id' => 3
            ],
            [
                'role_id' => 1,
                'privilege_code_id' => 4
            ],
            [
                'role_id' => 1,
                'privilege_code_id' => 5
            ],
            [
                'role_id' => 1,
                'privilege_code_id' => 6
            ],
            [
                'role_id' => 1,
                'privilege_code_id' => 7
            ],
            [
                'role_id' => 1,
                'privilege_code_id' => 8
            ],
            [
                'role_id' => 1,
                'privilege_code_id' => 9
            ],
            [
                'role_id' => 1,
                'privilege_code_id' => 10
            ],
            [
                'role_id' => 1,
                'privilege_code_id' => 11
            ],
            [
                'role_id' => 1,
                'privilege_code_id' => 12
            ],
            [
                'role_id' => 1,
                'privilege_code_id' => 13
            ],
            [
                'role_id' => 1,
                'privilege_code_id' => 14
            ],
            [
                'role_id' => 1,
                'privilege_code_id' => 15
            ],
            [
                'role_id' => 1,
                'privilege_code_id' => 16
            ],
            [
                'role_id' => 1,
                'privilege_code_id' => 17
            ],
            [
                'role_id' => 1,
                'privilege_code_id' => 18
            ],
            [
                'role_id' => 1,
                'privilege_code_id' => 19
            ],
        ]);
    }
}
