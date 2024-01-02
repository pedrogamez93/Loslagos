<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $fillable = [
        'titulo_seccion',
        'bajada_seccion',
        'img_seccion',
    ];

    public function consejoRegional()
    {
        return $this->belongsTo(ConsejoRegional::class, 'consejo_regional_id');
    }
}