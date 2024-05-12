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
                    if (!$row[6])
                        $type = 0;
                    else
                        $type = $row[6];
                    return
                        [
                            'student_id' => $row[0],
                            'email' => $row[1],
                            'student_name' => $row[2],
                            'father_name' => $row[3],
                            'phone_number' => $row[4],
                            'campus' => $row[5],
                            'type' => $type,
                            'address' => $row[7],
                            'marks10' => $row[8],
                            'marks12' => $row[9],
                            'sem1' => $row[10],
                            'sem2' => $row[11],
                            'sem3' => $row[12],
                            'sem4' => $row[13],
                            'sem5' => $row[14],
                            'sem6' => $row[15],
                            'sem7' => $row[16],
                            'sem8' => $row[17],
                            'sem9' => $row[18],
                            'sem10' => $row[19],

                        ];
                })->toArray();

                DB::table('students')->insert($records);

                $login_array = $chunk->map(function ($row) {

                    return [
                        'stu_id' => $row[0],
                        'password' => md5($row[0]),
                        'type' => $row[6],
                        'TTL' => 0
                    ];
                })->toArray();
                DB::table('logins')->insert($login_array);
            });


    }
}
