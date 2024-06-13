<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenRegionDocs extends Model
{
    use HasFactory;

    protected $fillable = ['nombredoc', 'urldoc', 'imagenregion_id'];

    public function imagenregion()
    {
        return $this->belongsTo(ImagenRegion::class);
    }
}
