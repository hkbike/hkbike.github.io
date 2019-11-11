<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

use App\Models\Banner;
use App\Models\Tenchnical;
use App\Models\Category;
// use App\Models\Banner;
use App\Models\Product_image; 
use App\Models\Customer; 
use App\Models\Orders;
use App\Models\Blog;
use App\Models\Slide;
use App\Models\Order_detail;
use App\Models\Users;


/**
 * 
 */
class HomeController extends Controller
{
	
	


	
	public function gioi_thieu(){
		return view('web.gioi-thieu'); 
	}

	public function blog(){
			$blog = Blog::all();

		return view('web.blog',compact('blog')); 
	}
	
	public function mien_trung(){
		return view('web.mien-trung'); 
	}
	public function mien_bac(){
		return view('web.mien-bac'); 
	}
	public function mien_nam(){
		return view('web.mien-nam'); 
	}
	public function lien_he(){
		return view('web.lien-he');  
	}

	// -----------dang-ki-----------------------

	public function get_dang_ki(){

		return view('web.dang-ki'); 
	}
	public function post_dang_ki(Request $req){
			// dd($req->all());
			$user = new Users();
			$user->name = $req->name;
			$user->email = $req->email;
			$user->phone = $req->phone;
			$user->password = bcrypt($req->password);
			$user->address = $req->address; 
			$user->save(); 

			if ($user->id) {
				return redirect()->route('get_dang_nhap');
			}
			return redirect()->back();
	}
	// -------end-dang-ki-----------


	// --------dang-nhap---------------
	public function get_dang_nhap(){
		return view('web.dang-nhap'); 
	}

	public function post_dang_nhap(Request $req){
		$credentials = $req->only('email','password');
		if (\Auth::attempt($credentials)) {
			return redirect()->route('home');
		}
		 
	}

	// public function dang_xuat(){
	// 		Auth::logout();
	// 		return redirect()->route('home');
	// }


	
//-----------tim-kiem-----
	public function getSearch(Request $req){
			$pro_timkiem = Product::where('name','like','%'.$req->key.'%')
					
					->get();
			return view('web.search',compact('pro_timkiem'));
	}
//-------dat-hang-------
	// public function dat_hang(Request $req){
		// $cart = Session::get('cart');
		// dd($cart);
	// 	$customer = new Customer;
	// 	$customer->name = $req->name;
	// 	$customer->email = $req->email;
	// 	$customer->address = $req->address;
	// 	$customer->phone_number = $req->phone_number;
	// 	$customer->save();


	// 	$order = new Orders;
	// 	$order->customer_id=$customer->id;
	// 	$order->name=$req->name;
	// 	$order->email=$req->email;
	// 	$order->phone=$req->phone;
	// 	$order->address=$req->address;
	// 	$order->status=$req->status;
	// 	$order->save();

	// 	foreach ($cart['items'] as $value) {
	// 		$order_detail = new Order_detail;
	// 		$order_detail->order_id=$order->id;
	// 		$order_detail->product_id=$key;
	// 	}
		
		
	// }





	public function index(){
		$product = Product::paginate(9);
		$top_product = Product::limit(3)->orderBy('name','ASC')->get();
		$sale_product = Product::where('sale_price','>',0)->limit(3)->orderBy('id','DESC')->get();
		$banner_slide = banner::where('ordering',1)->get();
		$banner = banner::where('ordering',3)->get(); 
		// dd($banner);
		
		// $slide = Slide::all();
		$blog = Blog::all();
		// dd($slide);
		// die();
		return view('web.index',compact('top_product','sale_product','product','banner','blog','banner_slide')); 
	}


	public function singler_pro($id){
		$imgPro = Product_image::where('product_id',$id)->get(); 
		$kiThuat = tenchnical::where('id_product',$id)->get();
		$proItem = Product::where('id',$id)->first();
		// dd($proItem);
		return view('web.detail',[
			'proItem'=>$proItem,
			'imgPro'=>$imgPro,
			'kiThuat'=>$kiThuat
		]);
	}
	public function product_category($id, Request $req)
	{
		$cate2 = Category::find($id);

		$proCat = Product::where('category_id',$id)->paginate(4);
		// dd($proCat);

		// if ($req->price) {
		// 	$prices = $req->price;
			// dd($req->price);
			// switch ($prices)
		 // {
				// case '1':
				// 	$proCat->where('prices','<',1000000);
					// dd($proCat);
					// break;
				// case '2':
				// 	$proCat->whereBetween('price',1000000,3000000);
				// 	break;
				// case '3':
				// 	$proCat->whereBetween('price',3000000,5000000);
				// 	break;
				// case '4':
				// 	$proCat->whereBetween('price',5000000,7000000);
				// 	break;
				// case '5':
				// 	$proCat->whereBetween('price',7000000,10000000);
				// 	break;
				// case '5':
				// 	$proCat->where('price','>',10000000);
				// 	break;
		// 	}
		// }
		// $proCat = Product::all();

		return view('web.dien-tro-luc',[
			'proCat'=>$proCat,
			'cate2'=>$cate2,
		]);
	}
	public function ajax(Request $req)
	{
		$id = $req->id;
		$item = "";
		$pro = Product::where('category_id',$id)->get();

		foreach ($pro as $value) {
			$item .=  "<div class='product-item style2 col-md-4'>".
                                                "<div class='product-inner equal-elem'>".
                                                    "<div class='product-thumb style1'>".
                                                        "<div class='thumb-inner'>"
                                                            ."<a href='#'>"."<img src='http://localhost/poject-trung/upload/"."$value->image"."'alt='b1'>"."</a>".
                                                        "</div>".
                                                    "</div>".
                                                    "<div class='product-innfo'>".
                                                        "<div class='product-name'>"."<a href='#'>'{$value->name}'</a>"."</div>".
                                                        "<span class='price'>".
                                                            "<ins>"."3.229.000₫"."</ins>".
                                                            "<del>"."3.259.000₫"."</del>".
                                                            "<span class='onsale'>"."-50%"."</span>".
                                                        "</span>".
                                                        "<span class='star-rating'>".
                                                            "<i class='fa fa-star' aria-hidden='true'>"."</i>".
                                                            "<i class='fa fa-star' aria-hidden='true'>"."</i>".
                                                            "<i class='fa fa-star' aria-hidden='true'>"."</i>".
                                                            "<i class='fa fa-star' aria-hidden='true'>"."</i>".
                                                            "<i class='fa fa-star' aria-hidden='true'>"."</i>".
                                                            "<span class='review'>"."5 Review(s)"."</span>".
                                                        "</span>".
                                                        "<a href='#' class='btn-add-to-cart'>"."thêm vào giỏ hàng"."</a>".
                                                    "</div>".
                                                "</div>".
                                            "</div>";
		};
		// dd($item);
		return response($item, 200);
	}



	public function ajaxView(Request $req){
		$id = $req->id;
		$pro = Product::find($id);

		return response()->json($pro);
	}
}



 ?>