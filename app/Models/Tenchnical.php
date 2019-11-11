<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Tenchnical extends Model
{
  protected $table = 'tenchnical';
  protected $fillable = ['id_product','yen','co_khung','khung_suon','tay_lai','phuoc','tay_phanh','phanh','dia_xich','vanh','lop'];

 // public function product(){
 // 	return $this->hasOne('App\Models\Product','id','id_product');
 // } 	
  public function product(){
    	return $this->belongsTo('App\Models\Product','id_product','id');
    }
 
}
	
 ?>