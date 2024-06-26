<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\student;
use Illuminate\Support\Facades\DB;
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

                $login_array = $chunk->map(function ($row) {
                    if (!$row[8])
                        $type = 0;
                    else
                        $type = $row[8];

                    return [
                        'user_id' => $row[0],
                        'password' => md5($row[0]),
                        'type' => $type,
                        'TTL' => 0
                    ];
                })->toArray();
                DB::table('logins')->insert($login_array);

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
                            'T1' => $row[10],
                            'T2' => $row[11],
                            'T3' => $row[12],
                            'T4' => $row[13],
                            'T5' => $row[14],
                            'T6' => $row[15],
                            'T7' => $row[16],
                            'T8' => $row[17],
                            'T9' => $row[18],
                            'T10' => $row[19],
                            'T11' => $row[20],
                            'T12' => $row[21],
                            'cgpa' => $row[22],
                            'created_at' => now(),
                            'updated_at' => now()
                        ];
                })->toArray();

                DB::table('students')->insert($records);


            });


    }
}
