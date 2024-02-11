<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    protected $primaryKey = 'time_id';
    protected $table = 'parking_time';
    protected $fillable = [
        'time_id',
        'time'
    ];
}
