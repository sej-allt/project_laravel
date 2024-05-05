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
                    return
                        [
                            'student_id' => $row[0],
                            'email' => $row[1],
                            'student_name' => $row[2],
                            'father_name' => $row[3],
                            'phone_number' => $row[4],
                            'campus' => $row[5],
                            'type' => $row[6]
                        ];
                })->toArray();

                $email_array = $chunk->map(function ($row) {
                    return
                        [
                            'stu_id' => $row[0],
                            'email' => $row[1]
                        ];
                })->toArray();
                DB::table('students')->insert($records);
                DB::table('emails')->insert($email_array);


                $login_array = $chunk->map(function ($row) {

                    $uidfr = DB::table('emails')->select('id')->where('stu_id', '=', $row[0])->first();
                    return [
                        'uid' => $uidfr->id,
                        'stu_id' => $row[0],
                        'password' => fake()->password(),
                        'type' => $row[6],
                        'TTL' => 0
                    ];
                })->toArray();
                DB::table('logins')->insert($login_array);
            });


    }
}
