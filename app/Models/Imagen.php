<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model{

    use HasFactory;

    protected $table = 'imagens'; // Asegúrate de especificar el nombre de la tabla

    protected $fillable = ['galeria_id', 'nombre', 'archivo'];

    public function galeria(){

    return $this->belongsTo(Galeria::class);
    
    }
}
