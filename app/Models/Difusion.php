<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Difusion extends Model
{
    protected $fillable = ['titulo', 'bajada'];

    public function documentos()
    {
        return $this->hasMany(DifusionDocs::class);
    }
}
