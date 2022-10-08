<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'name',
        'slug',
        'type',
        'target',
        'menu_id',
    ];

    /////relation with DB
    ################Start Relations################
    public function menu(){
        return $this-> belongsTo('App\Models\Menu','menu_id');
    }
    #################End Relations#################
}
