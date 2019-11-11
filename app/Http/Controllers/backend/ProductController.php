<?php 	
namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\PdDetail;
use App\Models\Product_image;
use App\Models\Tenchnical;
use Illuminate\Http\Request;
use File;


class ProductController extends Controller
{
  //searh sp
    public function chiTietSP($id){
      $chiTiet = Product::find($id);
      $pdimg = Product_image::where('product_id',$id)->get();
      $detail = PdDetail::where('product_id',$id)->get();
      $tenchnical = Tenchnical::where('id_product',$id)->get();
      // dd($pdimg->all());
      return view('backend.product.xem-chi-tiet',compact('chiTiet','pdimg','detail','tenchnical'));
    }
    public function get_search(Request $req){
      // $cate1 = Category::where('status',0)->get();
      $products = Product::where('name','like','%'.$req->keyword.'%')->paginate(12);
      // dd($req->category_id);
      return view('backend.product.product',compact('products'));
    }
    public function get_hien(Request $req){
      // dd($req->all());
      $products = Product::where('status','like','%'.$req->hien.'%')->where('status',1)->paginate(12);
      return view('backend.product.product',compact('products'));
    }
    public function get_an(Request $req){
          // dd($req);
          $products = Product::where('status','like','%'.$req->hien.'%')->where('status',0)->paginate(12);
        return view('backend.product.product',compact('products'));
    }
    public function get_new(Request $req){
      // dd($req->new);
      $products = Product::where('type','like','%'.$req->new.'%')->where('type',2)->paginate(12);
       return view('backend.product.product',compact('products'));
    }
    public function get_hot(Request $req){
      // dd($req->new);
      $products = Product::where('type','like','%'.$req->hot.'%')->where('type',1)->paginate(12);
       return view('backend.product.product',compact('products'));
    }
  // end searh

    public function product(){
    	$products = Product::paginate(12);
   	return view('backend.product.product',compact('products'));
   }
   public function addProduct(){
      $category = Category::where('status',0)->get();

   	return view('backend.product.add_product',compact('category'));
   }

   public function store(Request $req){

    // dd($req->all());
      $this->validate($req,
         [
            'name' => 'required|min:3',
            'price' =>'required',
            'slug' =>'required|unique:product,slug',
            'description'=> 'required',
            'image' => 'required',
         ],
         [
            'name.required'=>'không để trống tên',
            'name.min'=>'không để trống tên',
            'slug.required'=>'Slug không được bỏ trống',
            'slug.unique'=>'Slug đã tồn tại',
            'price.required'=>'hãy nhập giá bán cho sản phẩm',
            'description.required'=>'hãy nhập mô tả cho sản phẩm',
            'image.required' =>'hãy chọn ảnh cho sản phẩm',
         ]);
      $image ='';
      if($req->hasFile('image')){
         $file = $req->image;
         //chi cho nhap hinh theo duoi minh muon
         $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') 
            {
               return redirect('admin/product')->with('loi','ban chi duoc chon file co duoi jpg,png,jpeg');
            }
         $image = $file->getClientOriginalName();
         $hinh = str_random(4)."_".$image;
         while(file_exists("upload".$hinh))
         {
            $hinh = str_random(4)."_".$image;
         }
         $file->move('upload',$hinh);
         // $file->getClientOriginalName()
      }  
   		$pro =Product::create([
   			'name'=> $req->name,
   			'slug'=> $req->slug,
   			'image'=> $hinh,
   			
   			'price'=> $req->price,
   			'description'=> $req->description,
   			'sale_price'=> $req->sale_price,
   			'category_id'=> $req->category_id,
   			'status'=> $req->status,
        'type'=> $req->type,

   		]);

      // foreach ($req->link as $value) {
      //     // $name = $value->getClientOriginalName();
      //     $duoi = $value->getClientOriginalExtension();
      //       if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') 
      //       {
      //          return redirect('admin/product')->with('loi','ban chi duoc chon file co duoi jpg,png,jpeg');
      //       }
      //        $link = $value->getClientOriginalName();
      //        $hinh2 = str_random(4)."_".$link;
      //        while(file_exists("upload/pd".$hinh2))
      //        {
      //           $hinh = str_random(4)."_".$link;
      //        }
      //     $value->move('upload/pd',$hinh2);
      //     Product_image::create([
      //       'link' => $hinh2,
      //       'product_id'=>$pro->id,
      //       'status'=>$req->status,
      //   ]);
      //   }

      foreach($req->link as $image) {
        
        $name = $image->getClientOriginalName();
        $image->move('upload/pd',$name);
        Product_image::create([
          'link'=>$name,
          'product_id'=>$pro->id,
          'status'=>$req->status,
        ]);
      }
      
      
         PdDetail::create([
          'product_id'=>$pro->id,
          'xuat_xu'=>$req->xuat_xu,
          'hang_san_xuat'=>$req->hang_san_xuat,
          'co_banh'=>$req->co_banh,
          'trong_luong'=>$req->trong_luong,
        ]);
         Tenchnical::create([
          'id_product'=>$pro->id,
          'yen'=>$req->yen,
          'lop'=>$req->lop,
          'co_khung'=>$req->co_khung,
          'khung_suon'=>$req->khung_suon,
          'tay_lai'=>$req->tay_lai,
          'phuoc'=>$req->phuoc,
          'tay_phanh'=>$req->tay_phanh,
          'phanh'=>$req->phanh,
          'dia_xich'=>$req->dia_xich,
          'vanh'=>$req->vanh,
        ]);


   		return redirect('admin/product/add-product')->with('thong_bao','Thêm sản phẩm thành công...');
   }

   public function deletePd($id){
      $pro = Product::find($id);
      Product_image::where('product_id',$id)->delete();
      PdDetail::where('product_id',$id)->delete();
      Tenchnical::where('id_product',$id)->delete();
	   	if ($pro->delete()) {
          return redirect('admin/product')->with('thong_bao','Xóa sản phẩm thành công...');
      }
	   
   }
   public function editPd($id){
      $cate = Category::all();
      $product = Product::find($id);
      return view('backend.product.edit-pd',['product'=>$product],compact('cate'));
   }
   public function postEditPd($id,Request $req){
      // $this->validate($req,
      //    [
      //       'name' => 'required|min:3',
      //       'price' =>'required',
      //       'sale_price' => 'required',
      //       'description'=> 'required',
      //       'image' => 'required',
      //    ],
      //    [
      //       'name.required'=>'không để trống tên',
      //       'name.min'=>'không để trống tên',
      //       'price.required'=>'hãy nhập giá bán cho sản phẩm',
      //       'sale_price.required'=>'hãy nhập giá khuyến mại cho sản phẩm',
      //       'description.required'=>'hãy nhập mô tả cho sản phẩm',
      //       'image.required' =>'hãy chọn ảnh cho sản phẩm',
      //    ]);
      $model = Product::find($id);
       // $image ='';
         if($req->hasFile('image')){
            $file = $req->image;
             $duoi = $file->getClientOriginalExtension();
               if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') 
               {
                  return redirect('admin/product')->with('loi','ban chi duoc chon file co duoi jpg,png,jpeg');
               }
            $image = $file->getClientOriginalName();
            $hinh = str_random(4)."_".$image;
            while(file_exists("upload".$hinh))
            {
               $hinh = str_random(4)."_".$image;
            }

            $file->move('upload',$hinh);
            // unlink("upload".$model->image);
            // $file->getClientOriginalName()
         } else{
            $hinh = Product::find($id)->image;
         }

            
            $model->name= $req->name;
            $model->slug= $req->slug;
            $model->image= $hinh;
            $model->price= $req->price;
            $model->description= $req->description;
            $model->sale_price= $req->sale_price;
            $model->category_id= $req->category_id;
            $model->status= $req->status;
            $model->type = $req->type;

            $model->save();
         



         return redirect('admin/product');
   }

//detail
   public function detail2($id){
      $product = Product::all();
      $detail = PdDetail::where('product_id',$id)->get();
      return view('backend.product.product-detail.detail2',compact('product','detail'));
   }
   public function detail(){
      $product = Product::all();
      $detail = PdDetail::paginate(5);
      return view('backend.product.product-detail.detail',compact('product','detail'));
   }
   public function addDetail(Request $req){
      $this->validate($req,
         [
            'xuat_xu'=>'required',
            'hang_san_xuat'=>'required',
            'co_banh'=>'required',
            'trong_luong'=>'required',

         ],
         [
            'xuat_xu.required'=>'không được bỏ trống xuất xứ..',
            'hang_san_xuat.required'=>'không được bỏ trống hãng sản xuất..',
            'co_banh.required'=>'không được bỏ trống cỡ bánh..',
            'trong_luong.required'=>'không được bỏ trống trọng lượng..',
         ]);
      PdDetail::create($req->all());
      return redirect('admin/product/detail')->with('thong_bao' , 'Thêm sản phẩm thành công ...');


   }
   public function editDetail($id){
      $product = Product::all();
      $detail = PdDetail::find($id);
      return view('backend.product.product-detail.edit',compact('detail','product'));
   }
   public function postEditDetail($id,Request $req){
       $this->validate($req,
         [
            'xuat_xu'=>'required',
            'hang_san_xuat'=>'required',
            'co_banh'=>'required',
            'trong_luong'=>'required',

         ],
         [
            'xuat_xu.required'=>'không được bỏ trống xuất xứ..',
            'hang_san_xuat.required'=>'không được bỏ trống hãng sản xuất..',
            'co_banh.required'=>'không được bỏ trống cỡ bánh..',
            'trong_luong.required'=>'không được bỏ trống trọng lượng..',
         ]);
       $update = PdDetail::find($id);

       $update->xuat_xu = $req->xuat_xu;
       $update->hang_san_xuat = $req->hang_san_xuat;
       $update->product_id = $req->product_id;
       $update->co_banh = $req->co_banh;
       $update->trong_luong = $req->trong_luong;
       $update->save();

       return redirect()->back()->with('thong_bao','Sửa sản phẩm thành công ... ');
   }
   public function deleteDT($id){
      if (PdDetail::find($id)->delete()) {
         return redirect('admin/product/detail')->with('thong_bao','Xóa sản phẩm thành công ... ');
      }
   }
// end detail
// tenchical
   public function tenchnical2($id){

      $tenchnical2 = Tenchnical::where('id_product',$id)->get();
      return view('backend.product.tenchnical.tenchnical2',compact('tenchnical2'));
  
   }

   public function tenchnical(){
      $tenchnical = Tenchnical::paginate(10);
      return view('backend.product.tenchnical.tenchnical',compact('tenchnical'));
   }
   
   public function getTen(){
      $product = Product::all();
      return view('backend.product.tenchnical.add_tenchnical',compact('product'));
   }
   public function postTen(Request $req){
      $this->validate($req,
         [
            'yen'=>'required',
            'co_khung'=>'required',
            'khung_suon'=>'required',
            'tay_lai'=>'required',
            'phuoc'=>'required',
            'tay_phanh'=>'required',
            'phanh'=>'required',
            'dia_xich'=>'required',
            'vanh'=>'required',
            'lop'=>'required',
         ],
         [
            'yen.required'=>'yên không được để trông ...',
            'co_khung.required'=>'cỡ khung không được để trông ...',
            'khung_suon.required'=>'khung sườn không được để trông ...',
            'tay_lai.required'=>'tay lái không được để trông ...',
            'phuoc.required'=>'phuộc không được để trông ...',
            'tay_phanh.required'=>'tay phanh không được để trông ...',
            'phanh.required'=>'phanh không được để trông ...',
            'dia_xich.required'=>'đĩa xích không được để trông ...',
            'vanh.required'=>'vành không được để trông ...',
            'lop.required'=>'lốp không được để trông ...',
         ]);
      Tenchnical::create($req->all());
      return redirect('admin/product/tenchnical')->with('thong_bao','Thêm thông số kỹ thuật thành công..');
   }
   public function editTen($id){
      $product = Product::all();
      $ten = Tenchnical::find($id);
      return view('backend.product.tenchnical.edit_tenchnical',compact('ten','product'));
   }
   public function postEditTen($id,Request $req){
       $this->validate($req,
         [
            'yen'=>'required',
            'co_khung'=>'required',
            'khung_suon'=>'required',
            'tay_lai'=>'required',
            'phuoc'=>'required',
            'tay_phanh'=>'required',
            'phanh'=>'required',
            'dia_xich'=>'required',
            'vanh'=>'required',
            'lop'=>'required',
         ],
         [
            'yen.required'=>'yên không được để trông ...',
            'co_khung.required'=>'cỡ khung không được để trông ...',
            'khung_suon.required'=>'khung sườn không được để trông ...',
            'tay_lai.required'=>'tay lái không được để trông ...',
            'phuoc.required'=>'phuộc không được để trông ...',
            'tay_phanh.required'=>'tay phanh không được để trông ...',
            'phanh.required'=>'phanh không được để trông ...',
            'dia_xich.required'=>'đĩa xích không được để trông ...',
            'vanh.required'=>'vành không được để trông ...',
            'lop.required'=>'lốp không được để trông ...',
         ]);
       $ten = Tenchnical::find($id);
       $ten->yen = $req->yen; 
       $ten->co_khung = $req->co_khung; 
       $ten->khung_suon = $req->khung_suon; 
       $ten->tay_lai = $req->tay_lai; 
       $ten->phuoc = $req->phuoc; 
       $ten->tay_phanh = $req->tay_phanh; 
       $ten->phanh = $req->phanh; 
       $ten->dia_xich = $req->dia_xich; 
       $ten->vanh = $req->vanh; 
       $ten->lop = $req->lop; 
       $ten->save();
       return redirect('admin/product/tenchnical')->with('thong_bao','update thông số kỹ thuật cho sản phẩm thành công...');
   }
   public function deleteTen($id){
      if (Tenchnical::find($id)->delete()) {
         return redirect('admin/product/tenchnical')->with('thong_bao','Xóa thông số kỹ thuật thành công..');
      }
   }
//end tenchical
}


 ?>