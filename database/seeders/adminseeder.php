<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        $adminlogin = [
            'user_id' => 1000,
            'password' => md5("admin"),
            'type' => 1,
            'ttl' => 0
        ];
        DB::table('logins')->insert($adminlogin);

        $admin_student = [
            'id' => 1,
            'admin_id' => 1000,
            'email' => 'admin@college.in',
            'name' => 'admin',
            'campus' => 'geu',
            'department' => 'IT',
            'phonenumber' => 9999999,
            'created_at' => now(),
            'updated_at' => now()
        ];
        DB::table('admins')->insert($admin_student);

    }
}
