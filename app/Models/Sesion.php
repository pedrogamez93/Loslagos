<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    use HasFactory;

    protected $table = 'sesiones';
    protected $fillable = ['nombre', 'lugar']; // Añade todos los campos que quieras asignar masivamente
    protected $dates = ['fecha_hora'];
    public function documentos()
    {
        return $this->hasMany(Documento_Sesion::class);
    }
}
