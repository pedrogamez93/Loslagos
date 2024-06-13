<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PoliticaPersonasMayores extends Model
{
    protected $fillable = ['titulo', 'bajada',];

    public function documentos()
    {
        return $this->hasMany(PoliticaPersonasMayoresDocs::class, 'politica_personas_mayores_id');
    }
}