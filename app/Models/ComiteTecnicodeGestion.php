<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComiteTecnicodeGestion extends Model
{
    use HasFactory;
    protected $table = 'comite_tecnicode_gestions';
    protected $fillable = ['nombre','titulo','descripcion'];

    public function ComiteTecnicodeGestionI()
    {
        return $this->hasMany(ComiteTecnicodeGestionI::class, 'ComiteTecnicodeGestionI_id');
    } 
}
