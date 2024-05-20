<?php
// app/Models/EventPage.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventPage extends Model
{
    use HasFactory;

    protected $table = 'events'; // Specify the correct table name

    protected $fillable = [
        'name', 'image', 'description', 'start_date', 'end_date', 'start_time', 'end_time'
    ];
}
