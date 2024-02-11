<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    use HasFactory;

    protected $primaryKey = 'parking_id';
    protected $table = 'parking';
    protected $fillable = [
        'parking_id',
        'parking_size_id',
        'parking_time_id',
        'A01',
        'A02',
        'A03',
        'A04',
        'A05',
        'A06',
        'updated_at'
    ];
}
