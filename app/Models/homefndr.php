<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class homefndr extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 
        'bajada', 
        'descripcion',
    ];
}
