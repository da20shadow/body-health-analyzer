<?php

namespace App\Models\personal_activity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pray extends Model
{
    use HasFactory;
    //Намаз
    protected $fillable = [
        'start_time',
        'end_time',
        'cal',
    ];
}
