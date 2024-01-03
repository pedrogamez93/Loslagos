<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InversionPublicaEfectiva extends Model
{
    use HasFactory;
    protected $table = 'InversionPublicaEfectiva';
    protected $fillable = ['titulo', 'periodo', 'fuente', 'descripcion'];

    public function InversionPublicaEfectivaSector()
    {
        return $this->hasMany(InversionPublicaEfectivaSector::class, 'InversionPublicaEfectiva_id');
    } 
}
