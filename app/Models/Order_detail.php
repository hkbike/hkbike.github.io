<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $table = 'order_detail';
    protected $fillable = ['product_id','order_id','quantity','price'];
    public function product(){
    	return $this->belongsTo('App\Models\Product','product_id','id');
    }
    public function orders(){
    	return $this->belongsTo('App\Models\orders','order_id','id');
    }
}
