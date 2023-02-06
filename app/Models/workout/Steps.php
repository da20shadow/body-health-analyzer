<?php

namespace App\Models\workout;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Steps extends Model
{
    use HasFactory;
    //Крачки/ходене
    protected $fillable = [
        'steps',
        'cal',
    ];
}
