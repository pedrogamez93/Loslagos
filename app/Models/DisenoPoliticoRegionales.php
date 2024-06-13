<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class DisenoPoliticoRegionales extends Model
{
    use HasFactory;

    protected $table = 'diseno_politico_regionales';

    protected $fillable = ['titulo', 'bajada', 'titulo_seccion_form', 'titulo_seccion_encue', 'bajada_seccion_encue'];

    public function btnForms()
    {
        return $this->hasMany(DisenoPoliticoRegionalesBtnforms::class);
    }

    public function btnEncuestas()
    {
        return $this->hasMany(DisenoPoliticoRegionalesBtnEncuestas::class);
    }
}

