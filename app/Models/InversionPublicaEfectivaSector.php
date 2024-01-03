<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InversionPublicaEfectivaSector extends Model
{
    use HasFactory;
    protected $table = 'InversionPublicaEfectivaSector';
    protected $fillable = ['InversionPublicaEfectiva_id','sector', 'inversionD', 'inversionP'];

    public function InversionPublicaEfectiva(){

    return $this->belongsTo(InversionPublicaEfectiva::class, 'InversionPublicaEfectiva_id');
    
    }
}
