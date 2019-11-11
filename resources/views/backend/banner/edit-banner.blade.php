@extends('backend.master')
@section('main')
<div class="col-md-6">
	<form action="" method="POST" role="form" enctype="multipart/form-data">
		<legend>Tên banner: {{$banner->name}} !!</legend>
		@if(count($errors)>0)
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				@foreach($errors->all() as $err)
				<strong>{{$err}}</strong> ...
				@endforeach

			</div>
		@endif
		@csrf
		<div class="form-group">
			<label for="">Tên banner</label>
			<input type="text" name="name" value="{{$banner->name}}" class="form-control" id="" placeholder="Input field">
		</div>
		<div class="form-group">
			<label for="">Nội dung</label>
			<input type="text" name="content" value="{{$banner->content}}" class="form-control" id="" placeholder="Input field">
		</div>
		<div class="form-group">
			<label for="">Thứ tự</label>
			<!-- <input type="number" name="ordering" value="{{$banner->ordering}}" class="form-control" id="" placeholder="Input field"> -->
			<select name="ordering" id="input" class="form-control" required="required">
				<option value="1" {{(($banner->ordering)==1)?'selected':''}}>banner chính trang chủ</option>
				<option value="3" {{(($banner->ordering)==3)?'selected':''}}>banner nhỏ trang chủ</option>
				<option value="2" {{(($banner->ordering)==2)?'selected':''}}>banner  trang phụ</option>
				<option value="4" {{(($banner->ordering)==4)?'selected':''}}>banner nhỏ trang phụ</option>
			</select>
		</div>
		<div class="form-group">
			<label for="">Trạng thái</label>
			<input type="radio" name="status" value="0" {{(($banner->status)==0)?'checked':''}} class="form" id="" checked placeholder="Input field">Ẩn
			<input type="radio" name="status" value="1" {{(($banner->status)==1)?'checked':''}} class="form" id="" placeholder="Input field">Hiển thị
		</div>
		<div class="form-group">
			<label for="">Chọn ảnh</label>
			<input type="file" class="form-control" name="image">
			<!-- <img src="{{asset('upload/banner')}}/{{$banner->image}}" width="150px" alt=""> -->

		</div>
		<div class="col-md-12">
			<div class="row">
				<img src="{{asset('upload/banner')}}/{{$banner->image}}" width="250px" alt="">
			</div>
		</div>
		<button type="submit" class="btn btn-primary">Sửa banner</button>
	</form>
</div>
@stop