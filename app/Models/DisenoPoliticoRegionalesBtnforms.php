<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DisenoPoliticoRegionalesBtnforms extends Model
{
    protected $table = 'diseno_politico_regionales_btnforms';

    protected $fillable = [
        'nombre_btn_form',
        'url_btn_form',
        'diseno_politico_regionales_id',
    ];

    public function disenoPoliticoRegionales()
    {
        return $this->belongsTo(DisenoPoliticoRegionales::class, 'diseno_politico_regionales_id');
    }
}

