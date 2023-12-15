<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanificacionInstitucional extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'urldocs'];
}
