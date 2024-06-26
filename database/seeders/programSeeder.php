<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class programSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $content = [
            'program_id'=>'MBA',
            'program_name'=>'Master of Business Administration',
            'created_at'=>now(),
            'updated_at'=>now()
        ];
        DB::table('programs')->insert($content);
        $content = [
            'program_id'=>'BCA',
            'program_name'=>'Bachelor of Computer Science',
            'created_at'=>now(),
            'updated_at'=>now()
        ];
        DB::table('programs')->insert($content);
        $content = [
            'program_id'=>'BSCS',
            'program_name'=>'Bachelor in computer science',
            'created_at'=>now(),
            'updated_at'=>now()
        ];
        DB::table('programs')->insert($content);
        $content = [
            'program_id'=>'BAH',
            'program_name'=>'Bachelor of arts in History',
            'created_at'=>now(),
            'updated_at'=>now()
        ];
        DB::table('programs')->insert($content);
        $content = [
            'program_id'=>'Btech',
            'program_name'=>'Bachelor of Technology',
            'created_at'=>now(),
            'updated_at'=>now()
        ];
        DB::table('programs')->insert($content);
    }
}
