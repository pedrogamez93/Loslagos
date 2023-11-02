<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargoRegionLagos extends Model
{
    use HasFactory;
    protected $table = 'CargoRegionLagos';
    protected $fillable = ['id','nombre'];
}
