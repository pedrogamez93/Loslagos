<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrabajoParticipativoMetodologiaI extends Model
{
    use HasFactory;
    protected $table = 'trabajo_participativo_metodologia_i_s';
    protected $fillable = ['TrabajoParticipativoMetodologiaI_id','nombreA', 'archivo'];

    public function TrabajoParticipativoMetodologia(){

    return $this->belongsTo(TrabajoParticipativoMetodologia::class, 'TrabajoParticipativoMetodologiaI_id');
    
    }
}
