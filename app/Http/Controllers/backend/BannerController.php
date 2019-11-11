<?php 
namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use file;


class BannerController extends Controller
{
   public function banner(){
   		$banner = Banner::paginate(6);
   		return view('backend.banner.banner',compact('banner'));
   }
   public function postBanner(Request $req){
   	$this->validate($req,
		[
			
			'name'=>'required|min:3',
			'content'=>'required|min:3|max:150',
   		],
   		[
   			'name.required'=>'vui lòng nhập tên banner',
   			'name.min'=>'vui long nhap ten tren 3 ky tu',
   			'content.required'=>'vui lòng nhập nội dung banner',
   			'content.min'=>'vui long viet noi dung tren 3 ky tu',
   			'content.max'=>'ban viết quá ký tự cho phép',
   		]);
   	
   	if ($req->hasFile('image')) {
   		$file = $req->image;
   		$duoi = $file->getClientOriginalExtension();
   		if($duoi != 'png' && $duoi != 'jpeg' && $duoi != 'jpg'){
   			return redirect('backend.banner')->with('canhbao','file ảnh không hợp lệ');
   		}
   		$name = $file->getClientOriginalname();
   		$anh = str_random(4)."_".$name;
   		while(file_exists("upload/banner".$anh)){
   			$anh = str_random(4)."_".$name;
   		}
   		$file->move('upload/banner',$anh);
   	}

   	
   	// $req->merge(['image'=>$anh]);
   	// Banner::create($req->all());
   	Banner::create([
   		'name'=>$req->name,
   		'image'=>$anh,
   		'content'=>$req->content,
   		'ordering'=>$req->ordering,
   		'status'=>$req->status,
   	]);

   	return redirect('admin/banner');

   }
   public function editBanner($id){
   		$banner = Banner::find($id);
   		return view('backend.banner.edit-banner',compact('banner'));
   }
   public function postEditBanner($id,Request $req){
   		$this->validate($req,[
   			'name'=>'required|min:3',
   			'content'=>'required|min:10|max:150',
   		],
   		[
   			'name.required'=>'không được để trống tên',
   			'content.required'=>'không được để trống nội dung',
   			'name.min'=>'Tên phải từ 3 ký tự trở lên',
   			'content.min'=>'Nội dung phải từ 10 ký tự trở lên',
   			'content.max'=>'Nội dung viết quá ký tự cho phép',
   		]);
   		if ($req->hasFile('image')) {
   			$file = $req->image;
   			$duoi = $file->getClientOriginalExtension();
   			if ($duoi != 'png' && $duoi != 'jpg' && $duoi != 'jpeg') {
   				return redirect('admin/banner/edit-banner')->with('canhbao','file ảnh không hợp lệ');
   			}
   			$name = $file->getClientOriginalname();
   			$anh = str_random(4)."_".$name;
   			while(file_exists("upload/banner".$anh)){
	   			$anh = str_random(4)."_".$name;
	   		}
	   		$file->move('upload/banner',$anh);
   		}else
   		{
   			$anh = Banner::find($id)->image;
   		}
   		Banner::find($id)->update([
   			'name'=>$req->name,
	   		'image'=>$anh,
	   		'content'=>$req->content,
	   		'ordering'=>$req->ordering,
	   		'status'=>$req->status,
   		]);
   		return redirect('admin/banner')->with('thong_bao','sửa banner thành công..');
   }


// delete banner
   public function deleteBanner($id){
   	// dd($id);
   	// Banner::destroy($id);
   	// return redirect('admin/banner')->with('mes','đã xóa thành công');
   	if (Banner::find($id)->delete())
   	 {
   		return redirect('admin/banner')->with('mes','đã xóa thành công..');
   		
   	}
   }
}
 ?>