<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Store extends Model
{
    protected $table = 'store';
    protected $fillable = ['name','phone','email','status','ordering','address'];
}


 ?>