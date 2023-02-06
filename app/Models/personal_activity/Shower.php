<?php

namespace App\Models\personal_activity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shower extends Model
{
    use HasFactory;
    //Вземане на душ
    protected $fillable = [
        'start_time',
        'end_time',
        'cal',
    ];
}
