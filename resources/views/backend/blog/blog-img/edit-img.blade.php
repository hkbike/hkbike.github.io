@extends('backend.master')
@section('main')
<div class="col-md-6">
	<form action="" method="POST" role="form" enctype="multipart/form-data">
		<legend>Thêm ảnh tin tức cho Website</legend>
		@csrf
		<div class="form-group">
			<label for="">Chọn ảnh</label>
			<input type="file" name="link" class="form-control" id="" placeholder="Input field">
			<img src="{{asset('upload/tin-tuc/img-tin-tuc')}}/{{$blog_img->link}}" width="150px" alt="">
		</div>
		<div class="form-group">
			<label for="">Tin tức</label>
			<select name="blog_id" id="input" class="form-control" required="">
				<option value="">--Chọn tin tức thêm ảnh--</option>
				@foreach($blog as $bl)
					<option value="{{$bl->id}}" {{(($bl->id)==($blog_img->blog_id))?'selected':''}}>{{$bl->name}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="">Trạng thái</label>
			<input type="radio" name="status" value="0" class="form" id="" {{(($blog_img->status)==0)?'checked':''}} placeholder="Input field">Ẩn
			<input type="radio" name="status" value="1" {{(($blog_img->status)==1)?'checked':''}} class="form" id="" placeholder="Input field">Hiển thị
		</div>
		<button type="submit" class="btn btn-primary">Thêm ảnh tin tức</button>
	</form>
</div>
@stop