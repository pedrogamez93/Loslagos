<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubcomisionesI extends Model
{
    use HasFactory;
    protected $table = 'subcomisiones_i_s';
    protected $fillable = ['SubcomisionesI_id','nombreA', 'archivo'];

    public function Subcomisiones(){

    return $this->belongsTo(Subcomisiones::class, 'SubcomisionesI_id');
    
    }
}
