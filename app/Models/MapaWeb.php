<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapaWeb extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombreItem1',
        'urlItem1',
        'nombreSubItem1',
        'urlSubItem1',
    ];
    public function ItemWeb()
    {
        return $this->hasMany(ItemWeb::class, 'MapaWeb_id');
    } 
}
