<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PrivilegeCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('privilege_codes')->insert([
            [
                'parent' => 'Akademik',
                'name' => 'Program Studi',
                'route_name' => 'majors',
                'description' => 'Manajemen Program Studi',
                'order' => 1,
                'icon' => 'fas fa-graduation-cap'
            ],
            [
                'parent' => 'Akademik',
                'name' => 'Tahun Ajaran',
                'route_name' => 'school-years',
                'description' => 'Manajemen Tahun Ajaran',
                'order' => 2,
                'icon' => 'fas fa-calendar'
            ],
            [
                'parent' => 'Akademik',
                'name' => 'Semester',
                'route_name' => 'semesters',
                'description' => 'Manajemen Semester',
                'order' => 3,
                'icon' => 'fas fa-calendar-alt'
            ],
            [
                'parent' => 'Akademik',
                'name' => 'Mata Kuliah',
                'route_name' => 'subjects',
                'description' => 'Manajemen Mata Kuliah',
                'order' => 4,
                'icon' => 'fas fa-book'
            ],
            [
                'parent' => 'Akademik',
                'name' => 'Mahasiswa',
                'route_name' => 'students',
                'description' => 'Manajemen Mahasiswa',
                'order' => 5,
                'icon' => 'fas fa-user-tag'
            ],
            [
                'parent' => 'Akademik',
                'name' => 'Pembimbing Akademik',
                'route_name' => 'supervisions',
                'description' => 'Manajemen Pembimbing Akademik',
                'order' => 6,
                'icon' => 'fas fa-user-friends'
            ],
            [
                'parent' => 'Akademik',
                'name' => 'Penugasan Dosen',
                'route_name' => 'assignments',
                'description' => 'Manajemen Penugasan Dosen',
                'order' => 7,
                'icon' => 'fas fa-user-check'
            ],
            [
                'parent' => 'PMB',
                'name' => 'Waktu PMB',
                'route_name' => 'pmb-times',
                'description' => 'Manajemen Waktu PMB',
                'order' => 1,
                'icon' => 'fas fa-calendar'
            ],
            [
                'parent' => 'PMB',
                'name' => 'Pendaftar',
                'route_name' => 'registrants',
                'description' => 'Manajemen Pendaftar',
                'order' => 2,
                'icon' => 'fas fa-user-plus'
            ],
            [
                'parent' => 'Setting',
                'name' => 'Setting',
                'route_name' => 'settings',
                'description' => 'Manajemen Setting',
                'order' => 1,
                'icon' => 'fas fa-cog'
            ],
            [
                'parent' => 'User Management',
                'name' => 'User',
                'route_name' => 'users',
                'description' => 'Manajemen User',
                'order' => 1,
                'icon' => 'fas fa-users'
            ],
            [
                'parent' => 'User Management',
                'name' => 'Role',
                'route_name' => 'roles',
                'description' => 'Manajemen Role',
                'order' => 2,
                'icon' => 'fas fa-lock'
            ],
            [
                'parent' => 'User Management',
                'name' => 'Privilege Code',
                'route_name' => 'privilege-codes',
                'description' => 'Manajemen Privilege Code',
                'order' => 3,
                'icon' => 'fas fa-code'
            ],
            [
                'parent' => 'User Management',
                'name' => 'Permission',
                'route_name' => 'permissions',
                'description' => 'Manajemen Permission',
                'order' => 4,
                'icon' => 'fas fa-tasks'
            ],
            [
                'parent' => 'Keuangan',
                'name' => 'Tipe Pembayaran',
                'route_name' => 'payment-types',
                'description' => 'Manajemen Tipe Pembayaran',
                'order' => 1,
                'icon' => 'fas fa-tags'
            ],
            [
                'parent' => 'Keuangan',
                'name' => 'Komponen Pembayaran',
                'route_name' => 'payment-components',
                'description' => 'Manajemen Komponen Pembayaran',
                'order' => 2,
                'icon' => 'fas fa-money-bill'
            ],
            [
                'parent' => 'Keuangan',
                'name' => 'Rekening Bank',
                'route_name' => 'bank-accounts',
                'description' => 'Manajemen Rekening Bank',
                'order' => 3,
                'icon' => 'fas fa-university'
            ],
            [
                'parent' => 'Inventaris',
                'name' => 'Gedung',
                'route_name' => 'buildings',
                'description' => 'Manajemen Gedung',
                'order' => 1,
                'icon' => 'fas fa-building'
            ],
            [
                'parent' => 'Inventaris',
                'name' => 'Ruang',
                'route_name' => 'rooms',
                'description' => 'Manajemen Ruang',
                'order' => 2,
                'icon' => 'fas fa-th-large'
            ],
        ]);
    }
}
