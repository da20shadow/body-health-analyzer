<?php

namespace App\Models\homework;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArrangClothes extends Model
{
    use HasFactory;
    //Подреждане оправяне на дрехи
    protected $fillable = [
        'start_time',
        'end_time',
        'cal',
    ];
}
