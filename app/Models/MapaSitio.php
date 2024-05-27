<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapaSitio extends Model
{
    use HasFactory;
    protected $fillable = [
        'urlPadre',
        'nombreUrl',
        'url',
    ];
}
