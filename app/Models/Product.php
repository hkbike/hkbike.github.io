<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends model
{
    protected $table = 'product';
    protected $fillable = ['name','slug','image','price','description','sale_price','category_id','status','type'];
    // return $this->hasOne('App\Models\Category','id','category_id');
      public function category(){
    	return $this->belongsTo('App\Models\Category','category_id','id');
    }
    public function product_image(){
    	return $this->hasMany('App\Models\Product_image','product_id','id');
    }
     public function product_detail(){
    	return $this->hasMany('App\Models\Product_detail','product_id','id');
    }
    public function tenchnical(){
        return $this->hasMany('App\Models\Tenchnical','id_product','id');
    }
    public function order_detail(){
        return $this->hasMany('App\Models\Order_detail','product_id','id');
    }
}

 ?>