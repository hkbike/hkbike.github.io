<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';
    protected $fillable = ['name','slug','image','content','status','category_id'];
    // public function category(){
    // 	return $this->hasOne('App\Models\Category','id','category_id');
    // }
      public function category(){
    	return $this->belongsTo('App\Models\Category','category_id','id');
    }
    public function blog_image(){
    	return $this->hasMany('App\Models\Blog','id','blog_id');
    }
}
 ?>