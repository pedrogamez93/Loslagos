<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TramitesDigitales extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'tags',
        'descripcion',
        'fecha_apertura',
        'fecha_cierre',
        'icono',
        'url_single',
    ];

    public function documentos()
    {
        return $this->hasMany(TramitesDigitalesDocs::class, 'tramite_id');
    }

    public function btns()
    {
        return $this->hasMany(TramitesDigitalesBtns::class, 'tramite_id');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($tramite) {
            $tramite->documentos()->delete();
            $tramite->btns()->delete();
        });
    }

}
