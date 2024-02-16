<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Landing extends Model
{
    use HasFactory;

    protected $fillable = [
        'tags',
        'titulo',   
        'descripcion',
        'img',
        'menu_ubicacion',
        'habilitado',
    ];

    public function documentos()
    {
        return $this->hasMany(LandingDocs::class, 'landing_id');
    }

    public function btns()
    {
        return $this->hasMany(LandingBtns::class, 'landing_id');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($tramite) {
            $tramite->documentos()->delete();
            $tramite->btns()->delete();
        });
    }

    public function images()
    {
        return $this->hasMany(LandingImages::class, 'landing_id');
    }
}
