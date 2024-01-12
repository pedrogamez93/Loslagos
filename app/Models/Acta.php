<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acta extends Model
{
    use HasFactory;

    protected $table = 'actas';  // Asumiendo que la tabla de actas se llama 'actas'

    protected $fillable = [
        'documentonew_id', // Asegúrate de incluir la clave foránea
        // Agrega aquí los campos específicos de la tabla 'actas'
    ];

    public function documentonew()
    {
        return $this->belongsTo(Documentonew::class);
    }
}
