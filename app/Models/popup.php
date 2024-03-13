<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class popup extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'description', 'image_url', 'url', 'accion'];
}
