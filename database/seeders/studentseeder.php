<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\student;
use DB;
use Illuminate\Support\LazyCollection;

class studentseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::disableQueryLog();
        LazyCollection::make(function () {        //files handle memory efficient
            $filecontent = fopen(storage_path('app\public\csv-files\csvFile.csv'), 'r');
            while (($line = fgetcsv($filecontent, 4500)) != false) {

                $datastring = implode(',', $line);
                $row = explode(',', $datastring);

                //like return

                yield $row;



            }

            fclose($filecontent);
        })->skip(1)
            ->chunk(1000)
            ->each(function (LazyCollection $chunk) {

                $records = $chunk->map(function ($row) {
                    // dd($row);
                    if (!$row[8])
                        $type = 0;
                    else
                        $type = $row[8];
                    return
                        [
                            'student_id' => $row[0],
                            'email' => $row[1],
                            'student_name' => $row[2],
                            'course' => $row[3],
                            'semester' => $row[4],
                            'father_name' => $row[5],
                            'phone_number' => $row[6],
                            'campus' => $row[7],
                            'type' => $type,
                            'address' => $row[9],
                            'marks10' => $row[10],
                            'marks12' => $row[11],
                            'sem1' => $row[12],
                            'sem2' => $row[13],
                            'sem3' => $row[14],
                            'sem4' => $row[15],
                            'sem5' => $row[16],
                            'sem6' => $row[17],
                            'sem7' => $row[18],
                            'sem8' => $row[19],
                            'sem9' => $row[20],
                            'sem10' => $row[21],
                            'cgpa' => $row[22],
                            'created_at' => now(),
                            'updated_at' => now()
                        ];
                })->toArray();

                DB::table('students')->insert($records);

                $login_array = $chunk->map(function ($row) {
                    if (!$row[8])
                        $type = 0;
                    else
                        $type = $row[8];

                    return [
                        'stu_id' => $row[0],
                        'password' => md5($row[0]),
                        'type' => $type,
                        'TTL' => 0
                    ];
                })->toArray();
                DB::table('logins')->insert($login_array);
            });


    }
}
