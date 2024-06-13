<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
 
    use HasFactory;

    protected $table = 'home';

    protected $fillable = [
        'titulobanner', 
        'descripcionbanner', 
        'minibanners1',
        'url_minibanner1',
        'minibanners2',
        'url_minibanner2',
        'minibanners3',
        'url_minibanner3',
        'minibanners4',
        'url_minibanner4',
        'minibanners5',
        'url_minibanner5',
        'minibanners6',
        'url_minibanner6',
        'minibanners7',
        'url_minibanner7',
        'minibanners8',
        'url_minibanner8',
        'minibanners9',
        'url_minibanner9',
        'minibanners10',
        'url_minibanner10',
        'minibanners11',
        'url_minibanner11',
        'minibanners12',
        'url_minibanner12',
        'minibanners13',
        'url_minibanner13',
        'minibanners14',
        'url_minibanner14',
        'minibanners15',
        'url_minibanner15',
        'minibanners16',
        'url_minibanner16',
        'slider1',
        'slider2',
        'slider3',
        'slider4',
        'slider5',
        'banner1',
        'banner2',
        'banner3',
        'banner4',
        'bannerurl1',
        'bannerurl2',
        'bannerurl3',
        'bannerurl4',
    ];

}
