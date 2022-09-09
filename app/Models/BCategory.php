<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'slug',
    ];

    /////relation with DB
    ################Start Relations################
    public function blog(){
        return $this->hasMany('App\Models\Blog','category_id');
    }
    #################End Relations#################
}
