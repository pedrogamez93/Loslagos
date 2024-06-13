<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sitios extends Model
{
    use HasFactory;

    protected $table = 'sitios';

    protected $fillable = ['titulo', 'descripcion', 'archivo_path','url'];
}
