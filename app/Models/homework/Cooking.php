<?php

namespace App\Models\homework;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cooking extends Model
{
    use HasFactory;
    //Готвене
    protected $fillable = [
        'start_time',
        'end_time',
        'cal',
    ];
}
