<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_image extends Model
{
   protected $table = 'product_image';
   protected $fillable = ['link','product_id','status'];

   
   // public function pdimg(){
   // 		return $this->hasOne('App\Models\Product','id','product_id');
   // }
    public function pdimg(){
   		return $this->hasOne('App\Models\Product','id','product_id');
   }
   public function product(){
    	return $this->belongsTo('App\Models\Product','product_id','id');
    }
}

 ?>