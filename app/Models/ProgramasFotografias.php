<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramasFotografias extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'imagen',
    ];

    public function Programas() {
        return $this->belongsTo(Programas::class);
    }
}


