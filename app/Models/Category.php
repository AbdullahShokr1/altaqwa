<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'slug',
        'photo',
    ];

    /////relation with DB
    ################Start Relations################
    public function post(){
        return $this->hasMany('App\Models\Post','category_id');
    }
    #################End Relations#################

}
