<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PoliticaPersonasMayoresDocs extends Model
{
    protected $fillable = ['nombredocs', 'urldocs', 'politica_personas_mayores_id'];

    public function politicaPersonasMayores()
    {
        return $this->belongsTo(PoliticaPersonasMayores::class, 'politica_personas_mayores_id');
    }
}