<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'keywords',
        'my_content',
        'slug',
        'photo',
        'writer_id',
    ];
    ################Start Relations################
    public function admin()
    {
        return $this->belongsTo('App\Models\Admin','writer_id');
    }
    #################End Relations#################
}
