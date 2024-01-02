<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvolucionInversionfFNDR extends Model
{
    use HasFactory;
    protected $table = 'EvolucionInversionfFNDR';
    protected $fillable = ['id','titulo','periodo','provincia','ano'];
}
