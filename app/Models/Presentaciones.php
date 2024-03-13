<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presentaciones extends Model
{
    use HasFactory;
    
    protected $fillable = ['titulo', 'urldocs'];
}
