<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eligible extends Model
{
    use HasFactory;
    protected $table = 'eligibles';

    protected $fillable = [
        'event_id',
        'student_id',
        'present',
    ];
}
