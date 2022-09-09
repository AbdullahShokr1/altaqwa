<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'keywords',
        'my_content',
        'slug',
        'writer_id',
        'category_id',
        'photo',
    ];

    ################Start Relations################
    public function admin()
    {
        return $this->belongsTo('App\Models\Admin','writer_id');
    }
    public function category(){
        return $this-> belongsTo('App\Models\BCategory','category_id');
    }
    public function tagblog(){
        return $this->hasMany('App\Models\TagBlog','blog_id');
    }
    public function comment()
    {
        return $this->hasMany('App\Models\Comment','post_id');
    }
    #################End Relations#################
}
