<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'Users';
    protected $fillable = ['name','email','phone','password','address'];
    
}
 ?>