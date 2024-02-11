<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $primaryKey = 'size_id';
    protected $table = 'parking_size';
    protected $fillable = [
        'size_id',
        'size_name'
    ];
}
