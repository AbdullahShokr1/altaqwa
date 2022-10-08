<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'location',
        'content',
    ];
    /////relation with DB
    ################Start Relations################
    public function MenuItem(){
        return $this->hasMany('App\Models\MenuItem','menu_id');
    }
    #################End Relations#################
}
