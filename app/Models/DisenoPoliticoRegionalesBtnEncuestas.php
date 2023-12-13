<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DisenoPoliticoRegionalesBtnEncuestas extends Model
{
    protected $table = 'diseno_politico_regionales_btnencuestas'; // Ajusta según sea necesario

    protected $fillable = [
        'nombre_encuesta',
        'nombre_btn_encuesta',
        'url_btn_encuesta',
        'diseno_politico_regionales_id'
    ];

    public function disenoPoliticoRegionales()
    {
        return $this->belongsTo(DisenoPoliticoRegionales::class, 'diseno_politico_regionales_id');
    }
}

