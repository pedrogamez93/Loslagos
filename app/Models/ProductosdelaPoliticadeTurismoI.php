<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductosdelaPoliticadeTurismoI extends Model
{
    use HasFactory;
    protected $fillable = ['titulo','nombre', 'url', 'ProductosdelaPoliticadeTurismoI_id'];

    public function ProductosdelaPoliticadeTurismo(){

    return $this->belongsTo(ProductosdelaPoliticadeTurismo::class, 'ProductosdelaPoliticadeTurismoI_id');
    
    }
}
