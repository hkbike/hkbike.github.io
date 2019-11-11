@extends('backend.master')
@section('main')
<div class="col-md-12">
	<div class="row">
		<form action="" method="POST" role="form" enctype="multipart/form-data">
			<legend>Sửa tin tức: {{$blog1->name}}</legend>
			@csrf
			<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="form-group col-md-6">
						<label for="">Tiêu đề tin tức</label>
						<input type="text" name="name" value="{{$blog1->name}}" class="form-control" id="name" placeholder="Input field">
						@if($errors->has('name'))
							<div class="alert alert-danger">
								{!! $errors->first('name')!!}
							</div>
						@endif
					</div>
					<div class="form-group col-md-6">
						<label for="">Slug</label>
						<input type="text" name="slug" value="{{$blog1->slug}}" readonly class="form-control" id="slug" onclick="ChangeToSlug()" placeholder="Input field">
						@if($errors->has('slug'))
							<div class="alert alert-danger">
								{!! $errors->first('slug')!!}
							</div>
						@endif
					</div>
				</div>
			</div>
			
			<div class="col-md-12">
				<div class="row">
					<div class="form-group col-md-6">
						<label for="">Trạng thái</label>
						<input type="radio" value="0" name="status" {{(($blog1->status)==0)?'checked':''}} class="form" id=""  placeholder="Input field">Ẩn
						<input type="radio" value="1"  name="status" {{(($blog1->status)==1)?'checked':''}} class="form" id="" placeholder="Input field">Hiện
					</div>
					<div class="form-group col-md-6">
						<label for="">Thể loại</label>
						<select name="category_id" id="inputStatus" class="form-control" required="required">
							<option value="">--Chọn thể loại--</option>
							@foreach($cate as $cat)
							<option value="{{$cat->id}}" {{(($cat->id)==($blog1->category_id))?'selected':''}}>{{$cat->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<div class="col-md-12">
					<div class="form-group ">
						<label for="">Nội dung</label>
						<textarea type="text"  name="content" class="form-control ckeditor" id="demo" placeholder="Input field">{{$blog1->content}}</textarea>
						@if($errors->has('content'))
							<div class="alert alert-danger">
								{!! $errors->first('content')!!}
							</div>
						@endif
					</div>
			</div>
			<div class="col-md-12">
				<div class="row">
					<div class="form-group col-md-6">
						<label for="">Chọn Ảnh Đại Diện</label>
						<input type="file" name="image" class="form-control" id="" placeholder="Input field">
						<img src="{{asset('upload/tin-tuc')}}/{{$blog1->image}}" width="150px" alt="">
					</div>
					
				</div>
			</div>
			
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary">Cập nhật</button>
			</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript">
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