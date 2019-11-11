@extends('backend.master')
@section('main')
<div class="col-md-12 tieu-de-ad" style="">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-home"></i><a href="{{route('trang-chu-admin')}}">Home</a>
					<i class="fa fa-angle-right"></i><a>Danh mục thể loại</a>
					
				</h3>
				
			</div>
			
		</div>
	</div>
</div>
<div class="col-md-12">
	<div class="row">
		@if(count($errors)>0)
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			@foreach($errors->all() as $err)
			<strong>{{$err}}</strong> ...
			@endforeach

		</div>
		@endif
		@if(session('thongbao'))
			<div class="alert alert-success">
				{{session('thongbao')}}
			</div>
		@endif
	</div>
</div>
<div class="col-md-12" style="margin-top: 15px;">
<div class="row">
<div class="row">
<div class="col-md-4">
	<!-- <div class="row"> -->
	<div class="panel panel-primary"style="margin: 2px;margin-top: 1px; width: 100%">
		<div class="panel-heading">
	           <h3 class="panel-title"><i class="fa fa-plus" style="padding-right: 10px"></i>Thêm thể loại</h3>
	       </div>
		
		<!-- @if($errors->has('name'))
			<div class="help-block">
				{!! $errors->first('name')!!}
			</div>
		@endif -->
		<div class="panel-body">
		<form action="category" method="POST" role="form">
			
			<input type="hidden" class="" name="_token" value="{{csrf_token()}}">
			<div class="form-group">
				<label for="">Tên thể loại</label>
				<input type="text" name="name" class="form-control" onchange="ChangeToSlug()" id="name" placeholder="Input field">
			</div>
			<div class="form-group">
				<label for="">Slug</label>
				<input type="text" name="slug" class="form-control" id="slug" readonly  placeholder="Input field">
			</div>
			<div class="form-group">
				<label for="">Loại sản phẩm</label>
				<select name="status" id="inputStatus" class="form-control" required="required">
					<option value="0">SP xe đạp</option>
					<option value="1">Tin tức</option>
				</select>
			</div>
			<button type="submit" class="btn btn-primary">Thêm thể loại</button>
		</form>
		</div>
	</div>
	<!-- </div> -->
</div>

	<div class="col-md-8">
		<!-- <div class="row"> -->
		<div class="panel panel-primary"style="margin: 2px;margin-top: 1px; width: 100%">
			<div class="panel-heading">
	           <h3 class="panel-title"><i class="fa fa-plus" style="padding-right: 10px"></i>Quản lý thể loại</h3>
	         </div>
		<div class="table-responsive panel-body">
			<table class="table table-hover table-striped ">
				<thead>
					<tr>
						<th>STT</th>
						<th>Tên thể loại</th>
						<th>Loại sản phẩm</th>
						<th>Ngày tạo</th>
						<th>Tác vụ</th>
						
						
					</tr>
				</thead>
				<tbody>
					@foreach($category as $cate)
					<tr class="show_1">
						<td>{{$loop->index+1}}</td>
						<td>{{$cate->name}}</td>
						@if(($cate->status)==0)
						<td>SP xe đạp</td>
						@else
						<td>Tin tức</td>
						@endif
						<td>{{$cate->created_at}}</td>
						<td><a href="category/edit/{{$cate->id}}" class="btn btn-default"><i class="fa fa-edit">  Sửa</i></a>
							<a href="category/deletecate/{{$cate->id}}" onclick="return confirm('bạn có chắc chắn muốn xóa?..')" class="btn btn-danger"><i class="fa fa-trash">  Xóa</i></a>
						</td>
						
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<!-- </div> -->
		</div>
	</div>
</div>
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