<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudienciasPartes extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'bajada', 'titulo_secciontwo'];

    public function documentos()
    {
        return $this->hasMany(AudienciasPartesDocs::class, 'audiencias_parte_id');
    }
}
