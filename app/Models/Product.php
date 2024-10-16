<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model 
{

    protected $table = 'products';
    public $timestamps = true;
    protected $fillable = array('title', 'brand', 'image', 'details', 'price','category_id');

    public function category(){
        return $this->belongsTo(Category::class);
    }

}