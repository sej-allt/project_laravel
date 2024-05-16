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
        $admin_student = [
            'id' => 1,
            'student_id' => 1000,
            'email' => 'admin@college.in',
            'student_name' => 'admin',
            'type' => 1,
            'campus' => 'geu',
            'phone_number' => 9999999,
            'created_at' => now(),
            'updated_at' => now()
        ];
        DB::table('students')->insert($admin_student);
        $adminlogin = [
            'stu_id' => 1000,
            'password' => md5("admin"),
            'type' => 1,
            'ttl' => 0
        ];
        DB::table('logins')->insert($adminlogin);
    }
}
