<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrabajoParticipativoTalleresProvincialesI extends Model
{
    use HasFactory;
    protected $table = 'trabajo_participativo_talleres_provinciales_i_s';
    protected $fillable = ['TrabajoParticipativoTalleresProvincialesI_id','nombreA', 'archivo'];

    public function TrabajoParticipativoTalleresProvinciales(){

    return $this->belongsTo(TrabajoParticipativoTalleresProvinciales::class, 'TrabajoParticipativoTalleresProvincialesI_id');
    
    }
}
