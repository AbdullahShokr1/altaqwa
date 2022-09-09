<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'slug',
    ];

    /////relation with DB
    ################Start Relations################
    public function tagblog(){
        return $this->hasMany('App\Models\TagBlog','tag_id');
    }
    #################End Relations#################
}
