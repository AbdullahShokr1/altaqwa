<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagBlog extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag_id',
        'blog_id',
    ];

    /////relation with DB
    ################Start Relations################
    public function btag(){
        return $this-> belongsTo('App\Models\BTag','tag_id');
    }
    public function blog(){
        return $this-> belongsTo('App\Models\Blog','blog_id');
    }
    #################End Relations#################
}
