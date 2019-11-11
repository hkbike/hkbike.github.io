<?php 
namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Blog_img;
use App\Models\Category;
use Illuminate\Http\Request;
use File;

class BlogController extends Controller
{
    public function CtBlog($id){
        $blog1 = Blog::find($id);
        // dd($blog->name);
        return view('backend.blog.chi-tiet-blog',compact('blog1'));
    }
    public function blog(){
    	$blog = Blog::paginate(12);
    	return view('backend.blog.blog',compact('blog'));
    }
    public function addBlog(){
    	$cate = Category::where('status',1)->get();
    	return view('backend.blog.add_blog',compact('cate'));
    }
    public function postAddBlog(Request $req){
    	$this->validate($req,
    		[
    			'name' =>'required|min:10|max:200',
    			'slug' =>'required',
    			'content' =>'required|min:10',
    			'image' =>'required',
    			
    		],
    		[
    			'name.min'=>'Tiêu đề phải từ 10 ký tự trở lên...',
    			'name.max'=>'Tiêu đề vượt quá ký tự cho phép...',
    			'name.required'=>'Tiêu đề không được để trông...',
    			'slug.required'=>'Không được để trông slug...',
    			'content.required'=>'Nội dung không được để trống...',
    			'content.min'=>'Nội dung bài viết phải từ 10 ký tự trở lên...',
    			'image.required'=>'Yêu cầu chọn ảnh đại diện cho bài viết...',
    		]);
    	if ($req->hasFile('image')) {
    		$file = $req->image;
    		$duoi = $file->getClientOriginalExtension();
    		if( $duoi!='png' && $duoi != 'jpg' && $duoi != 'jpeg'){
    			return redirect('admin\blog')->with('thong_bao','File không hợp lệ ...');
    		}
    		$image = $file->getClientOriginalName();
    		$hinh = str_random(4)."_".$image;
    		while(file_exists("upload/tin-tuc".$hinh))
	         {
	            $hinh = str_random(4)."_".$image;
	         }
	         $file->move('upload/tin-tuc',$hinh);
    	}
    	$blog =Blog::create([
    			'name' => $req->name,
    			'slug' => $req->slug,
    			'image' => $hinh,
    			'status' => $req->status,
    			'category_id' => $req->category_id,
    			'content' => $req->content,
	    	]);
        foreach($req->link as $image) {

            $name = $image->getClientOriginalName();
            $image->move('upload/tin-tuc/img-tin-tuc',$name);
            Blog_img::create([
              'link'=>$name,
              'blog_id'=>$blog->id,
              'status'=>$req->status,
            ]);

          }
    	return redirect('admin/blog/add-blog')->with('thong_bao','Thêm tin tức thành công ...');

    }
    public function editBlog($id){
    	$cate = Category::where('status',1)->get();
    	$blog1 = Blog::find($id);

        // dd($cate->all());
    	return view('backend.blog.edit_blog',compact('blog1','cate'));
    }
    public function postEditBlog($id,Request $req){
    	$update = Blog::find($id);
    	$this->validate($req,
    		[
    			'name' =>'required|min:10|max:200',
    			'slug' =>'required',
    			'content' =>'required|min:10',
    			
    			
    		],
    		[
    			'name.min'=>'Tiêu đề phải từ 10 ký tự trở lên...',
    			'name.max'=>'Tiêu đề vượt quá ký tự cho phép...',
    			'name.required'=>'Tiêu đề không được để trông...',
    			'slug.required'=>'Không được để trông slug...',
    			'content.required'=>'Nội dung không được để trống...',
    			'content.min'=>'Nội dung bài viết phải từ 10 ký tự trở lên...',
    			
    		]);
    	if ($req->hasFile('image')) {
    		$file = $req->image;
    		$duoi = $file->getClientOriginalExtension();
    		if( $duoi!='png' && $duoi != 'jpg' && $duoi != 'jpeg'){
    			return redirect('admin\blog')->with('thong_bao','File không hợp lệ ...');
    		}
    		$image = $file->getClientOriginalName();
    		$hinh = str_random(4)."_".$image;
    		while(file_exists("upload/tin-tuc".$hinh))
	         {
	            $hinh = str_random(4)."_".$image;
	         }
	        
	         $file->move('upload/tin-tuc',$hinh);
	      
    	}else
    	{
    		$hinh = Blog::find($id)->image;
    	}
    	

    	$update->name = $req->name;
    	$update->slug = $req->name;
    	$update->image = $hinh;
    	$update->status = $req->status;
    	$update->category_id = $req->category_id;
    	$update->content = $req->content;

    	$update->save();
    	return redirect('admin/blog')->with('thong_bao','Update dữ liệu tin tức thành công...');

    }
    public function deleteBlog($id){
    	if (Blog::find($id)->delete()) {
    		return redirect('admin/blog')->with('thong_bao','Xóa thành công...');
    	}
    	
    }
   // end blog

    public function blogImg(){
        // dd('cc');
    	$blog = Blog::all();
    	$blog_img = Blog_img::all();
    	return view('backend.blog.blog-img.blog-img',compact('blog','blog_img'));
    }
    public function postblogImg(Request $req){
    	if ($req->hasFile('link')) {
    		$file = $req->link;
    		$duoi = $file->getClientOriginalExtension();
    		if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
    			return redirect('admin/blog/blog-img')->with('loi','file ảnh không hợp lệ');
    		}
    		$image = $file->getClientOriginalName();
    		$hinh = str_random(4)."_".$image;
    		while(file_exists("upload/tin-tuc".$hinh))
	         {
	            $hinh = str_random(4)."_".$image;
	         }
	        
	         $file->move('upload/tin-tuc/img-tin-tuc',$hinh);

    	}
    	Blog_img::create([
    		'link' => $hinh,
    		'blog_id' => $req->blog_id,
    		'status' => $req->status,
    	]);
    	return redirect('admin/blog/blog-img')->with('thong_bao','Thêm ảnh thành công ...');
    }

    public function editImg($id){
    	$blog_img = Blog_img::find($id);
    	$blog = Blog::all();
    	return view('backend.blog.blog-img.edit-img',compact('blog_img','blog'));
    }
    public function postEditImg($id,Request $req){
    	$update = Blog_img::find($id);
    	if ($req->hasFile('link')) {
    		$file = $req->link;
    		$duoi = $file->getClientOriginalExtension();
    		if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
    			return redirect('admin/blog/blog-img')->with('loi','file ảnh không hợp lệ');
    		}
    		$image = $file->getClientOriginalName();
    		$hinh = str_random(4)."_".$image;
    		while(file_exists("upload/tin-tuc".$hinh))
	         {
	            $hinh = str_random(4)."_".$image;
	         }
	        
	         $file->move('upload/tin-tuc/img-tin-tuc',$hinh);

    	}else
    	{
    		$hinh = $update->link;
    	}
    	$update->link = $hinh;
    	$update->blog_id = $req->blog_id;
    	$update->status = $req->status;
    	$update->save();
    	return redirect('admin/blog/blog-img')->with('thong_bao','Thay đổi thành công ...');
    }



    public function deleteImg($id){
    	if (Blog_img::find($id)->delete()) {
    		return redirect('admin/blog/blog-img')->with('thong_bao','Xóa thành công...');
    	}
    }
}
 ?>