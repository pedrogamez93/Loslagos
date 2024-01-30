<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoliticaRegionalTurismo extends Model
{
    use HasFactory;
    protected $table = 'politica_regional_turismos';
    protected $fillable = ['titulo','url'];
}
