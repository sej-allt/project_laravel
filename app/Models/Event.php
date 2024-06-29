<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'event_id',

        'name',
        'startdate',
        'enddate',
        'starttime',
        'endtime',
        'marks10',
        'marks12',
        'cgpa',
        'campus_id',
        'company',
        'role',
        'responsibility',
        'program_id',
        'registration_date',
        'last_date_of_registration',
    ];
}
