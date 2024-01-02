<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salaprensa extends Model
{
    use HasFactory;

    protected $table = 'salaprensa';

    protected $fillable = ['nombre', 'categoria', 'archivo_path', 'fecha'];
}
