<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductosdelaPoliticadeTurismo extends Model
{
    use HasFactory;
    protected $fillable = ['titulo'];

    public function ProductosdelaPoliticadeTurismoI()
    {
        return $this->hasMany(ProductosdelaPoliticadeTurismoI::class, 'ProductosdelaPoliticadeTurismoI_id');
    } 
}
