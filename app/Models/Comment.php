<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'comment',
        'post_id',
    ];

    ################Start Relations################
    public function post()
    {
        return $this->belongsTo('App\Models\Blog','post_id');
    }
    #################End Relations#################
}
