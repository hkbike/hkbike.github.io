<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Helper\CartHelper;
use App\models\Product;
use App\models\Orders;
use App\models\Order_detail;


/**
 * 
 */
class CartController extends Controller
{
	public function view(CartHelper $cart){
		// dd($cart);
		return view('web.order.cart');
	}
	
	public function add(CartHelper $cart,$id)
	{
		$product = Product::find($id);
		$cart->add($product);
		// return redirect()->back();
		return redirect()->route('cart.view');


	}
	public function remove(CartHelper $cart,$id)
	{
		$cart->remove($id);
		return redirect()->back();
	}

	public function update(CartHelper $cart,$id)
	{
		// dd($id);
		$quantity = request()->quantity ? request()->quantity : 1;
		$cart->update($id,$quantity);
		return redirect()->back();
	}
	public function clear(CartHelper $cart)
	{
		$cart->clear();
		return redirect()->back();
	}




	
	//-----thanh toan--------
	public function getFormPay(CartHelper $cart)
	{
		// dd($cart);
		return view('web.order.thanh-toan');
	}

	// public function saveInfoshoppingCart(Request $req,CartHelper $cart)
	// {
		
	// 	$orders = Orders::insertGetId([
	// 		'name' => $req->name,
	// 		'email' => $req->email,
	// 		'phone' => $req->phone,
	// 		'address' => $req->address,
	// 		'total_price' => $req->total_price,
	// 	]);
		 
	// 	if ($orders)
	// 	{
	// 		foreach ($cart->items as $item)
	// 		{
				// Order_detail::insert([
					// 'product_id' => $orders->id,
					// 'order_id' => $item->id,
					// 'quantity' =>$item->quantity,
					// 'price' => $item->price,
			// 	]);
	// 		}
	// 	}
	// 	// $Cart->clear();
	// 	return redirect()->route('home');
	// }
}


 ?> 