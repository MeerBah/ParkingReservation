<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservation';
    protected $fillable = [
        'user_id',
        'vehicle_number',
        'parking_slot',
        'parking_size_id',
        'parking_date',
        'parking_time_id',
        'status',
        'updated_at'
    ];
}
