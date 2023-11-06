<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DptoGestionPersonas extends Model
{
    protected $table = 'dpto_gestion_personas';

    protected $fillable = ['titulo', 'bajada'];

    public function documentos()
    {
        return $this->hasMany(DocGestionPersonas::class, 'departamento_id');
    }
}
