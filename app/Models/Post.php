<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'keywords',
        'my_content',
        'telephone',
        'slug',
        'category_id',
        'writer_id',
        'photo',
    ];

    /////relation with DB
    ################Start Relations################
    public function category(){
        return $this-> belongsTo('App\Models\Category','category_id');
    }
    public function tagpost(){
        return $this->hasMany('App\Models\TagPost','post_id');
    }
    #################End Relations#################
}
