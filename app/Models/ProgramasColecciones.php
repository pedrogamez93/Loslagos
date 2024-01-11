<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramasColecciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'imagen',
    ];

    
}
class ProgramasColecciones extends Model {
    public function Programas() {
        return $this->belongsTo(Programas::class);
    }
}