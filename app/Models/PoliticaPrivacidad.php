<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoliticaPrivacidad extends Model
{
    use HasFactory;
    protected $fillable = ['descripcionG1', 'imagen', 'descripcionG2'];
}
