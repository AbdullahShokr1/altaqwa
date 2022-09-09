<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'keywords',
        'telephone',
        'slug',
        'photos',
        'user_id',
    ];

    ################Start Relations################
    public function review(){
        return $this->hasMany('App\Models\Review','product_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    #################End Relations#################
}
