<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class gradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        $content = [
            'grade_id'=>'T1',
            'grade_name'=>'High School',
            'created_at'=>now(),
            'updated_at'=>now()
        ];
        DB::table('grades')->insert($content);
        $content = [
            'grade_id'=>'T2',
            'grade_name'=>'Intermediate',
            'created_at'=>now(),
            'updated_at'=>now()
        ];
        DB::table('grades')->insert($content);$content = [
            'grade_id'=>'T3',
            'grade_name'=>'Semester 1',
            'created_at'=>now(),
            'updated_at'=>now()
        ];
        DB::table('grades')->insert($content);$content = [
            'grade_id'=>'T4',
            'grade_name'=>'Semester 2',
            'created_at'=>now(),
            'updated_at'=>now()
        ];
        DB::table('grades')->insert($content);$content = [
            'grade_id'=>'T5',
            'grade_name'=>'Semester 3',
            'created_at'=>now(),
            'updated_at'=>now()
        ];
        DB::table('grades')->insert($content);$content = [
            'grade_id'=>'T6',
            'grade_name'=>'Semester 4',
            'created_at'=>now(),
            'updated_at'=>now()
        ];
        DB::table('grades')->insert($content);$content = [
            'grade_id'=>'T7',
            'grade_name'=>'Semester 5',
            'created_at'=>now(),
            'updated_at'=>now()
        ];
        DB::table('grades')->insert($content);$content = [
            'grade_id'=>'T8',
            'grade_name'=>'Semester 6',
            'created_at'=>now(),
            'updated_at'=>now()
        ];
        DB::table('grades')->insert($content);$content = [
            'grade_id'=>'T9',
            'grade_name'=>'Semester 7',
            'created_at'=>now(),
            'updated_at'=>now()
        ];
        DB::table('grades')->insert($content);$content = [
            'grade_id'=>'T10',
            'grade_name'=>'Semester 8',
            'created_at'=>now(),
            'updated_at'=>now()
        ];
        DB::table('grades')->insert($content);$content = [
            'grade_id'=>'T11',
            'grade_name'=>'Semester 9',
            'created_at'=>now(),
            'updated_at'=>now()
        ];
        DB::table('grades')->insert($content);$content = [
            'grade_id'=>'T12',
            'grade_name'=>'Semester 10',
            'created_at'=>now(),
            'updated_at'=>now()
        ];
        DB::table('grades')->insert($content);
    }
}
