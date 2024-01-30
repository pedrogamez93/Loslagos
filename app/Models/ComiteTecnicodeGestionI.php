<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComiteTecnicodeGestionI extends Model
{
    use HasFactory;
    
    protected $table = 'comite_tecnicode_gestion_i_s';
    protected $fillable = ['ComiteTecnicodeGestionI_id','nombreA', 'archivo'];

    public function ComiteTecnicodeGestion(){

    return $this->belongsTo(ComiteTecnicodeGestion::class, 'ComiteTecnicodeGestionI_id');
    
    }
}
