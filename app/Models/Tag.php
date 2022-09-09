<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'slug',
    ];

    /////relation with DB
    ################Start Relations################
    public function tagpost(){
        return $this->hasMany('App\Models\TagPost','tag_id');
    }
    #################End Relations#################
}
