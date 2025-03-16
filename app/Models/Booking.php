<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id'; // Set ID sebagai primary key
    public $incrementing = false; // Matikan auto-increment
    protected $keyType = 'string'; // ID berupa string

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            // Generate ID dengan format "S12345"
            $model->id = 'S' . mt_rand(10000, 99999);
        });
    }

    protected $fillable = [
        'id',
        'user_name',
        'alamat',
        'telp',
        'booking_date',
        'start_time',
        'end_time',
        'rental_type',
        'qty',
        'total_price',
        'payment_status',
    ];
}
