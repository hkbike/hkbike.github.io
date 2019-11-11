<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Blog_img extends Model
{
    protected $table = 'blog_image';
    protected $fillable = ['link','blog_id','status'];

    public function blog2(){
    	return $this->hasOne('App\Models\Blog','id','blog_id');
    }
      public function blog(){
    	return $this->belongsTo('App\Models\Blog','blog_id','id');
    }
}
 ?>