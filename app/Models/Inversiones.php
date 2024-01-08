<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inversiones extends Model
{
    use HasFactory;
    protected $fillable = ['titulo1','descripcionG', 'imagenD2', 'titulo2', 'descripcionG2', 'titulo3', 'descripcionG3', 'imagenD3', 'titulo3acordeon1', 'acordeon1', 'titulo3acordeon2', 'acordeon2'];
}
