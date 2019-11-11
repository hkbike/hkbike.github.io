@extends('backend.master')
@section('main')
<div class="col-md-12 tieu-de-ad" style="">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-home"></i><a href="{{route('trang-chu-admin')}}">Home</a>
					<i class="fa fa-angle-right"></i><a href="{{route('backend-product')}}">Sản phẩm</a>
					<i class="fa fa-angle-right"></i><a><i>Thêm sản phẩm</i></a>

				</h3>
			</div>		
		</div>
	</div>
</div>
<div class="col-md-12">
	<div class="row">
		@if(session('thong_bao'))
				<div class="alert alert-success">
					{{session('thong_bao')}}
				</div>
			@endif
	</div>
</div>
<div class="col-md-12">
	<div class="row">
		<form action="" method="POST" role="form" enctype="multipart/form-data">
			
			
			<input type="hidden" class="" name="_token" value="{{csrf_token()}}">
			<div class="row">
			<div class="col-md-6">
				
					<div class="form-group ">
						<label for="">Tên sản phẩm</label>
						<input type="text" name="name" class="form-control" onchange="ChangeToSlug()" id="name" placeholder="Input field">
						@if($errors->has('name'))
							<div class="help-block alert-danger">
								{!! $errors->first('name')!!}
							</div>
						@endif
					</div>

					<div class="form-group">
						<label for="">Slug</label>
						<input type="text" name="slug" class="form-control" id="slug" readonly placeholder="Input field">
					</div>
				
			
					<div class="form-group ">
						<label for="">Giá bán</label>
						<input type="number" name="price" class="form-control" id="" placeholder="Input field">
						@if($errors->has('price'))
							<div class="help-block alert-danger">
								{!! $errors->first('price')!!}
							</div>
						@endif
					</div>
					<div class="form-group ">
						<label for="">Giá khuyến mại</label>
						<input type="number" name="sale_price" class="form-control" id="" placeholder="Input field">
						@if($errors->has('sale_price'))
							<div class="help-block alert-danger">
								{!! $errors->first('sale_price')!!}
							</div>
						@endif
					</div>
			
			
					<div class="form-group ">
						<label for="">Trạng thái</label>
						<select name="status" id="inputStatus" class="form-control" required="required">
							<option value="0" selected>Ẩn</option>
							<option value="1">Hiện</option>
						</select>
					</div>
					<div class="form-group ">
						<label for="">Tình trạng của sản  phẩm</label>
						<select name="type"  class="form-control" required="required">
							<option value="0" selected >Bình thường</option>
							<option value="1">Sản phẩm bán chạy</option>
							<option value="2">Sản phẩm mới</option>
						</select>
					</div>
					
					<div class="form-group ">
						<label for="">thể loại</label>
						<select name="category_id" id="input" class="form-control" required="required">
							<option >--Chọn thể loại--</option>
							@foreach($category as $cate)
								<option value="{{$cate->id}}" selected>{{$cate->name}}</option>
							@endforeach
						</select>
					</div>
				
			</div>
			<div class="col-md-6">
				
					<div class="form-group">
						<label for="">Xuất xứ sản phẩm</label>
						<input type="text" name="xuat_xu" class="form-control" id="" placeholder="Input field">
					</div>
					<div class="form-group">
						<label for="">Hãng sản xuất</label>
						<input type="text" name="hang_san_xuat" class="form-control" placeholder="Input field">
					</div>
					<div class="form-group">
						<label for="">Cỡ bánh</label>
						<input type="number" name="co_banh" class="form-control" placeholder="co bánh theo ich">
					</div>
					<div class="form-group">
						<label for="">Trọng lượng</label>
						<input type="text" name="trong_luong" class="form-control" placeholder="theo kilogram">
					</div>

					<div class="form-group ">
						<label for="">image</label>
						<input type="file" name="image" class="form-control" id="" placeholder="Input field">
						@if($errors->has('image'))
							<div class="help-block alert-danger">
								{!! $errors->first('image')!!}
							</div>
						@endif
					</div>
					<div class="form-group">
					<label for="">Chọn Ảnh</label>
					<input type="file" name="link[]" class="form-control" multiple="multiple">
						@if($errors->has('link'))
							<div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<strong>{!!$errors->first('link')!!}</strong>  ...
							</div>
							
						@endif
					</div>
				
			</div>
			<div class="col-md-12">
				
					<div class="form-group ">
						<label for="">Mô tả</label>
						<textarea type="text"  name="description" class="form-control ckeditor" id="demo" placeholder="Input field"></textarea>
						@if($errors->has('description'))
							<div class="help-block alert-danger">
								{!! $errors->first('description')!!}
							</div>
						@endif
					</div>
			
			</div>
			<div class="col-md-12">
			<div class="row">
					<div class="form-group col-md-6">
						<label for="">Lốp</label>
						<input type="text" name="lop" placeholder="chất liệu cao su..." id="" class="form-control" >
					</div>
					<div class="form-group col-md-6">
						<label for="">yên xe</label>
						<input type="text" name="yen" id="" class="form-control" placeholder="Chất liệu gì " >
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="row">
					<div class="form-group col-md-6">
						<label for="">Cỡ khung xe</label>
						<input type="text" name="co_khung" id="" placeholder="bao nhiêu inches" class="form-control" >
					</div>
					<div class="form-group col-md-6">
						<label for="">Khung sườn</label>
						<input type="text" name="khung_suon" id="" placeholder="chất liệu: inox,sắt chịu lực,cao cấp thấp cấp" class="form-control" >
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="row">
					<div class="form-group col-md-6">
						<label for="">Tay lái</label>
						<input type="text" name="tay_lai" placeholder="chất liệu: inox,sắt chịu lực,cao cấp thấp cấp" id="" class="form-control" >
					</div>
					<div class="form-group col-md-6">
						<label for="">Phuộc</label>
						<input type="text" name="phuoc" placeholder="chất liệu:inox,sắt chịu lực,cao cấp thấp cấp" id="" class="form-control" >
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="row">
					<div class="form-group col-md-6">
						<label for="">Tay phanh</label>
						<input type="text" name="tay_phanh" placeholder="chất liệu:nhôm,.." id="" class="form-control" >
					</div>
					<div class="form-group col-md-6">
						<label for="">Phanh</label>
						<input type="text" name="phanh" placeholder="chất liệu:nhôm,.." id="" class="form-control" >
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="row">
					<div class="form-group col-md-6">
						<label for="">Đĩa xích</label>
						<input type="text" name="dia_xich" placeholder="bao nhiêu mắt" id="" class="form-control" >
					</div>
					<div class="form-group col-md-6">
						<label for="">Vành</label>
						<input type="text" name="vanh" placeholder="kích thước 24''x1.75" id="" class="form-control" >
					</div>
				</div>
			</div>
			<div class="col-md-12">
				
					<button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
					

			</div>
		</div>
			
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