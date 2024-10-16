<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model 
{

    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = array('title', 'details');

    public function products(){
        return $this->hasMany(Product::class);
    }

}