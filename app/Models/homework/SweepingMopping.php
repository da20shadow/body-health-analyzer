<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SweepingMopping extends Model
{
    use HasFactory;
    //Метене забърсване
    protected $fillable = [
        'start_time',
        'end_time',
        'cal',
    ];

}
