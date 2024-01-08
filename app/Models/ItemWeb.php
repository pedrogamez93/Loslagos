<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemWeb extends Model
{
    use HasFactory;
    protected $fillable = [
        'MapaWeb_id',
        'SubNombreSubItem1',
        'SubUrlSubItem1',
    ];
    public function MapaWeb(){

    return $this->belongsTo(MapaWeb::class, 'MapaWeb_id');

    }
}
