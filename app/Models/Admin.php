<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard='admin';

    protected $fillable = [
        'name',
        'email',
        'password',
        'photo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        if (trim($value) === '') {
            return;
        }
        $this->attributes['password'] = bcrypt($value);
    }
    ################Start Relations################
    public function blog(){
        return $this->hasMany('App\Models\Blog','writer_id');
    }
    public function page(){
        return $this->hasMany('App\Models\Page','writer_id');
    }
    #################End Relations#################
}
