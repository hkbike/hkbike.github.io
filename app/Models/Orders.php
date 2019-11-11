<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $fillable = ['name','email','phone','address','total_price','status'];

    
    public function order_detail(){
    	return $this->hasMany('App\Models\Order_detail','order_id','id');
    }
    
}
