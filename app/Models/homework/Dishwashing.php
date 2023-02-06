<?php

namespace App\Models\homework;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dishwashing extends Model
{
    use HasFactory;
    //Миене на чинии
    protected $fillable = [
        'start_time',
        'end_time',
        'cal',
    ];
}
