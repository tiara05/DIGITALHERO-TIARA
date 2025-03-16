<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class availability extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_date', 
        'start_time', 
        'end_time', 
        'rental_type', 
        'available_units'
    ];
}
