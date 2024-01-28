<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenRegion extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'bajada'];

    public function documentos()
    {
        return $this->hasMany(ImagenRegionDocs::class, 'imagenregion_id');
    }
}
