<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class campusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        $content = [
            'campus_id'=>'GEHUD',
            'campus_name'=>'Graphic Era Hill University Dehradun',
            'created_at'=>now(),
            'updated_at'=>now()
        ];
        DB::table('campus')->insert($content);
        $content = [
            'campus_id'=>'GEHUB',
            'campus_name'=>'Graphic Era Hill University Bhimtal',
            'created_at'=>now(),
            'updated_at'=>now()
        ];
        DB::table('campus')->insert($content);
        $content = [
            'campus_id'=>'GEHUH',
            'campus_name'=>'Graphic Era Hill University Haldwani',
            'created_at'=>now(),
            'updated_at'=>now()
        ];
        DB::table('campus')->insert($content);
        $content = [
            'campus_id'=>'GEU',
            'campus_name'=>'Graphic Era University',
            'created_at'=>now(),
            'updated_at'=>now()
        ];
        DB::table('campus')->insert($content);
        $content = [
            'campus_id'=>'UPES',
            'campus_name'=>'University of Petrolreum and Energy Studies',
            'created_at'=>now(),
            'updated_at'=>now()
        ];
        DB::table('campus')->insert($content);
    }
}
