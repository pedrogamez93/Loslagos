<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeria extends Model{

    use HasFactory;

    protected $table = 'galerias'; 

    protected $fillable = ['nombre'];

    public function imagenes(){

    return $this->hasMany(Imagen::class);
    
    }
}


