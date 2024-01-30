<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcomisiones extends Model
{
    use HasFactory;
    protected $table = 'subcomisiones';
    protected $fillable = ['nombre','titulo','descripcion'];

    public function SubcomisionesI()
    {
        return $this->hasMany(SubcomisionesI::class, 'SubcomisionesI_id');
    } 
}
