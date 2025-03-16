<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayStation extends Model
{
    use HasFactory;

    protected $table = 'playstations';
    protected $fillable = ['jenis', 'slot', 'status'];
}
