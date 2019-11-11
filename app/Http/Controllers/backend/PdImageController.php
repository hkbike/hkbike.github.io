<?php 
namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Product_image;
use Illuminate\Http\Request;
use File;


class PdImageController extends Controller
{
    public function imgCT($id){
      // dd($id);
      $namepd = Product::find($id);
      $product = Product::all();
      $pdimage = Product_image::where('product_id',$id)->get();
      // dd($namepd->id);
      return view('backend.product.anh-chi-tiet',compact('product','pdimage','namepd'));
    }
    public function imgPCT(Request $req){
      $this->validate($req,
        [
          'link'=>'required',
          'product_id'=>'required',
      ],
      [
        'link.required'=>'vui lòng chọn ảnh cho sản phẩm',
        'product_id.reaquired'=>'vui lòng chọn sản phẩm',
    ]);
        if($req->hasFile('link')){
           $file = $req->link;
           $file->move('upload/pd',$file->getClientOriginalName());
           $image = $file->getClientOriginalName();
          
        }
        Product_image::create([
            'link' => $image,
            'product_id'=>$req->product_id,
            'status'=>$req->status,
        ]);
        return redirect()->back()->with('mes','thêm ảnh thành công');
    }
    public function image(){
    	$product = Product::all();
    	$pdimage = Product_image::paginate(10);
    	return view('backend.product.image-product',compact('product'),compact('pdimage'));
    }
    public function postImage(Request $req){
    	$this->validate($req,
    		[
    			'link'=>'required',
    			'product_id'=>'required',
			],
			[
				'link.required'=>'vui lòng chọn ảnh cho sản phẩm',
				'product_id.reaquired'=>'vui lòng chọn sản phẩm',
		]);

		 $image ='';
	      if($req->hasFile('link')){
	         $file = $req->link;
	         $file->move('upload/pd',$file->getClientOriginalName());
	         $image = $file->getClientOriginalName();
	        
	      }
	      Product_image::create([
	      		'link' => $image,
	      		'product_id'=>$req->product_id,
	      		'status'=>$req->status,
	      ]);
	      return redirect('admin/product/image-pd')->with('mes','thêm ảnh thành công');
    }
    // edit
    public function editImg($id){
    	$product = Product::all();
    	$image_pd = Product_image::find($id);
    	return view('backend.product.edit-img',compact('image_pd','product'));
    }
    public function postEditImg($id,Request $req){

        $update = Product_image::find($id);
        $pd = $update->product_id;
        // dd($pd);
        
          if($req->hasFile('link')){
             $file = $req->link;
             $duoi = $file->getClientOriginalExtension();
                if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') 
                {
                   return redirect('admin/product')->with('loi','ban chi duoc chon file co duoi jpg,png,jpeg');
                }
                 $link = $file->getClientOriginalName();
                 $hinh = str_random(4)."_".$link;
                 while(file_exists("upload/pd".$hinh))
                 {
                    $hinh = str_random(4)."_".$link;
                 }
                 $file->move('upload/pd',$hinh);
                    
          }
          else{
            $hinh = Product_image::find($id)->link;
          }
          // dd($hinh);
                $update->link = $hinh;
                $update->product_id = $req->product_id;
                $update->status = $req->status;
                $update->save();
         
          return redirect('admin/product/image-pd/'.$pd)->with('thong_bao','sửa thành công');
    }


    // end edit

    // delete
    public function deleteImg($id){
      $product =Product_image::find($id);
      $pd= $product->product_id;
      // dd($pd);
    	if($product->delete()){
    		return redirect('admin/product/chi-tiet-san-pham/'.$pd)->with('xoa_anh','xóa thành công');
    	}
    }

    // end delete
}
 ?>