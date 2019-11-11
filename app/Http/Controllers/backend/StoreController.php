<?php 
namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;


class StoreController extends Controller
{
    public function getST(){
    	$store = Store::paginate(10);
    	return view('backend.store.store',compact('store'));
    }
    public function postST(Request $req){
    	$this->validate($req,[
    		'name'=>'required',
    		'phone'=>'required',
    		'address'=>'required',
    		'email'=>'required',
    		'ordering'=>'required',
    	],
    	[
    		'name.required'=>'Tên cửa hàng không được để trông...',
    		'phone.required'=>'Số điện thoại không được bỏ trống...',
    		'address.required'=>'Địa chỉ không được bỏ trống...',
    		'email.required'=>'email không được bỏ trống...',
    		'ordering.required'=>'Thứ tự không được để trống...',
    	]);

    	Store::create([
    		'name'=>$req->name,
    		'email'=>$req->email,
    		'phone'=>$req->phone,
    		'address'=>$req->address,
    		'ordering'=>$req->ordering,
    		'status'=>$req->status
    	]);
    	return redirect()->route('cua-hang')->with('thong_bao','Thêm cửa hàng thành công...');
    }
    public function editST($id){
    	$store = Store::find($id);
    	return view('backend.store.edit_store',compact('store'));
    }
    public function posteditST(Request $req,$id){
    	$update = Store::find($id);
    	$update->name = $req->name;
    	$update->address = $req->address;
    	$update->phone = $req->phone;
    	$update->email = $req->email;
    	$update->ordering = $req->ordering;
    	$update->status = $req->status;
    	$update->save();

    	return redirect()->route('cua-hang')->with('thong_bao','Cập nhật thành công...');

    }
    public function xoaST($id){
    	$store = Store::find($id);

    	if ($store->delete()) {
    		return redirect()->route('cua-hang')->with('thong_bao','Xóa thành công...');
    	}

    }
}

 ?>