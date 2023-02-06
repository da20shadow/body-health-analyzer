<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sleep extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_sleep',
        'end_sleep',
        'additional_start_sleep',
        'additional_end_sleep',
        'added_at',
        'updated_at',
    ];
}
