<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'admins';
    protected $hidden = ['password'];

    protected $guard = 'admin';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'password','otp');

    protected $casts = [
        'password' => 'hashed'
    ];

}
