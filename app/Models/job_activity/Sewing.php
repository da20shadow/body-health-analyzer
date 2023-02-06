<?php

namespace App\Models\job_activity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewing extends Model
{
    use HasFactory;
    //Шиене на шевна машина
    protected $fillable = [
        'start_time',
        'end_time',
        'cal',
    ];
}
