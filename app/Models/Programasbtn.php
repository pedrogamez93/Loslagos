<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programasbtn extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombrebtn',
        'urlbtn',
    ];
}
