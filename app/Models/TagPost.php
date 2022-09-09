<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag_id',
        'post_id',
    ];

    /////relation with DB
    ################Start Relations################
    public function tag(){
        return $this-> belongsTo('App\Models\Tag','tag_id');
    }
    public function post(){
        return $this-> belongsTo('App\Models\Post','post_id');
    }
    #################End Relations#################
}
