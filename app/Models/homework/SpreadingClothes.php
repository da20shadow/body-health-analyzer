<?php

namespace App\Models\homework;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpreadingClothes extends Model
{
    use HasFactory;

    //Простиране на дрехи
    protected $fillable = [
        'start_time',
        'end_time',
        'cal',
    ];
}
