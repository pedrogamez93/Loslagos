<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DifusionDocs extends Model
{
    protected $fillable = ['nombredoc', 'urldoc', 'difusion_id'];

    public function difusion()
    {
        return $this->belongsTo(Difusion::class);
    }
}