<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PdDetail extends Model
{
    protected $table = 'product_detail';
    protected $fillable = ['product_id','xuat_xu','hang_san_xuat','co_banh','trong_luong'];
    // public function product(){
    // 	return $this->hasOne('App\Models\Product','id','product_id');
    // }
     public function product(){
    	return $this->belongsTo('App\Models\Product','product_id','id');
    }
}

 ?>