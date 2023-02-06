<?php

namespace App\Models\homework;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WoodInStove extends Model
{
    use HasFactory;
    //Слагане на дърва в печката
    protected $fillable = [
        'start_time',
        'end_time',
        'cal',
    ];
}
