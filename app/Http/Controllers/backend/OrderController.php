<?php 
namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Order_detail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function get_orderTk(Request $req){
        $orders = Orders::where('email','like','%'.$req->email.'%')->where('status','like','%'.$req->status.'%')->paginate(12);
        return view('backend.orders.orders',compact('orders'));
    }
    public function getOder(){
    	$orders = Orders::paginate(10);
    	return view('backend.orders.orders',compact('orders'));
    }
    public function CTOrder($id){
    	$orders = Orders::find($id);
    	$chitiet = Order_detail::where('order_id',$id)->get();
    	// dd($chitiet->all());
    	return view('backend.orders.chi-tiet-don-hang',compact('orders','chitiet'));
    }
    public function UPStatus(Request $req,$id){
    	$update =  Orders::find($id);
    	$update->status = $req->status;
    	$update->save();
    	return redirect()->back()->with('thong_bao','Cập nhật trạng thái thành công...');
    }
}


 ?>