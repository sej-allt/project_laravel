<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailContent extends Model
{
    use HasFactory;
    protected $table = 'email_contents';
    protected $fillable = [
        'type',
        'subject', // Add subject to fillable properties
        'body',
        'link',
        'conclusion',
    ];
}
