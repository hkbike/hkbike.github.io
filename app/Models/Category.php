<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    protected $fillable = ['name','slug','status'];
     public function blog(){
    	return $this->hasMany('App\Models\Blog','category_id','id');
    }
    public function product(){
    	return $this->hasMany('App\Models\Product','category_id','id')->take(6);
    }

    public function products(){
    	return $this->hasMany(Product::class,'category_id','id')->where('status',1);
    }
}
