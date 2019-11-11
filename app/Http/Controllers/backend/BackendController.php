<?php 
namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use file;

class BackendController extends Controller
{
   public function trangChu(){
      return view('backend.trang-chu');
   }
   public function index(){
   	return view('backend.index');
   }

   public function login(){
   	return view('backend.login');
   }
//category
   public function category(){
      $category = Category::all();
      // $category = Category::select('id','name','type','status')->orderBy('id','DESC')->paginate(4);

   	return view('backend.category.category',compact('category'));
   }
   public function store(Request $req){
      // echo $req->name;
      $this->validate($req,
         [
            'name' =>'required|min:3|max:100'
         ],
         [
            'name.required' => 'ban chưa nhập tên thể loại',
            'name.min' =>'Tên thể loại phải có độ dài từ 3 ký tự',
         ]);
      Category::create([
         'name' => $req->name,
         'slug' => $req->slug,
         'status' => $req->status,
      ]);
       return redirect('admin/category')->with('thongbao','thêm thành công');
      
   }

   public function editCate($id){
      $cate = Category::find($id);

      return view('backend.category.suacate',['cate'=>$cate]);
   }
   public function postEditCate($id,Request $req){
      $cate = Category::find($id);
      
      $cate->name = $req->name;
      $cate->slug = $req->slug;
      $cate->status = $req->status;

      $cate->save();

      return redirect('admin/category');
   }
  
   public function deleteCate($id){
      Category::destroy($id);
      return redirect('admin/category');
   }


// end category
  
}

 ?>