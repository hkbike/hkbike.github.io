@extends('backend.master')
@section('main')
<div class="col-md-12 tieu-de-ad" style="">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-home"></i><a href="{{route('trang-chu-admin')}}">Home</a>
					<i class="fa fa-angle-right"></i><a href="{{route('backend-product')}}">Quản lý Sản phẩm</a>
					<i class="fa fa-angle-right"></i><a><i>Chỉnh sửa Sản phẩm: {{$product->name}}</i></a>
					
				</h3>
				
			</div>
			
		</div>
	</div>
</div>
<div class="col-md-9">
	<div class="row">
		<form action="" method="POST" role="form" enctype="multipart/form-data">
			
			<!-- @if(session('thongbao'))
				<div class="alert alert-success">
					{{session('thongbao')}}
				</div>
			@endif -->
			<input type="hidden" class="" name="_token" value="{{csrf_token()}}">
			
					<div class="form-group ">
						<label for="">Tên sản phẩm</label>
						<input type="text" name="name" class="form-control" value="{{$product->name}}" onchange="ChangeToSlug()" id="name" placeholder="Input field">
						
					</div>

					<div class="form-group">
						<label for="">Slug</label>
						<input type="text" name="slug" value="{{$product->slug}}" class="form-control" id="slug" readonly placeholder="Input field">
					</div>
				
			
					<div class="form-group ">
						<label for="">Giá bán</label>
						<input type="number" name="price" value="{{$product->price}}" class="form-control" id="" placeholder="Input field">
						
					</div>
					<div class="form-group ">
						<label for="">Giá khuyến mại</label>
						<input type="number" name="sale_price" value="{{$product->sale_price}}" class="form-control" id="" placeholder="Input field">
						
					</div>
			
			
					<div class="form-group ">
						<label for="">Trạng thái</label>
						<select name="status" id="inputStatus" class="form-control" required="required">
							<option value="0" {{(($product->status)==0)?  'checked':''}}>Ẩn</option>
							<option value="1" {{(($product->status)==1)?'checked':''}}>Hiện</option>
						</select>
					</div>
					<div class="form-group ">
						<label for="">thể loại</label>
						<select name="category_id" id="input" class="form-control" required="required">
							<option >--Chọn thể loại--</option>
							@foreach($cate as $value)
								<option value="{{$value->id}}"{{(($value->id)==($product->category_id))?'selected':''}}>{{$value->name}}</option>
							@endforeach
							
						</select>
					</div>
					<div class="form-group ">
						<label for="">Tình trạng của sản  phẩm</label>
						<select name="type"  class="form-control" required="required">
							<option value="0" {{(($product->type)==0)?'selected':''}} >Bình thường</option>
							<option value="1" {{(($product->type)==1)?'selected':''}}>Sản phẩm bán chạy</option>
							<option value="2" {{(($product->type)==2)?'selected':''}}>Sản phẩm mới</option>
						</select>
					</div>
			
					<div class="form-group ">
						<label for="">Mô tả</label>
						<textarea type="text"  name="description" class="form-control ckeditor" id="demo" placeholder="Input field">{{$product->description}}</textarea>
						
					</div>
					
					<div class="form-group ">
						<label for="">image</label>
						<input type="file" name="image" value="{{$product->image}}" class="form-control" id="" placeholder="{{$product->image}}">
						<img src="{{asset('upload/')}}/{{$product->image}}" width="200px" alt="">
						
					</div>
			
			<button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
		</form>
	</div>
</div>
<script>
	
	function ChangeToSlug()
{
    var title, slug;
 
    //Lấy text từ thẻ input title 
    title = document.getElementById("name").value;
 
    //Đổi chữ hoa thành chữ thường
    slug = title.toLowerCase();
 
    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    document.getElementById('slug').value = slug;
}
</script>
@stop