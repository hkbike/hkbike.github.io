@extends('backend.master')
@section('main')
<div class="col-md-4">
	<form action="" method="POST" role="form" enctype="multipart/form-data">
		<legend>Thêm ảnh tin tức cho Website</legend>
		@if(session('thong_bao'))
				<div class="alert alert-success">
					{{session('thong_bao')}}
				</div>
			@endif
		@csrf
		<div class="form-group">
			<label for="">Chọn ảnh</label>
			<input type="file" name="link" class="form-control" id="" placeholder="Input field">
		</div>
		<div class="form-group">
			<label for="">Tin tức</label>
			<select name="blog_id" id="input" class="form-control" required="">
				<option value="">--Chọn tin tức thêm ảnh--</option>
				@foreach($blog as $bl)
					<option value="{{$bl->id}}">{{$bl->name}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label for="">Trạng thái</label>
			<input type="radio" name="status" value="0" class="form" id="" checked placeholder="Input field">Ẩn
			<input type="radio" name="status" value="1" class="form" id="" placeholder="Input field">Hiển thị
		</div>
		<button type="submit" class="btn btn-primary">Thêm ảnh tin tức</button>
	</form>
</div>
<div class="col-md-8">
	<div class="table-responsive">
		<table class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th>STT</th>
					<th>Ảnh tin tức</th>
					<th>Tin tức</th>
					<th>Trạng thái</th>
					<th>Thay đổi</th>
					<th>Xóa</th>
				</tr>
			</thead>
			<tbody>
				@foreach($blog_img as $bimg)
				<tr class="show_1">
					<td>{{$loop->index+1}}</td>
					<td><img src="{{asset('upload/tin-tuc/img-tin-tuc')}}/{{$bimg->link}}" width="100px" alt=""></td>
					<td>{{$bimg->blog->name}}</td>
					@if(($bimg->status)==0)
					<td>Ẩn</td>
					@else
					<td>Hiện</td>
					@endif
					<td><a href="blog-img/edit-img/{{$bimg->id}}" class="btn btn-default"><i class="fa fa-edit">  Thay Đổi</i></a></td>
					<td><a href="blog-img/delete-img/{{$bimg->id}}"  onclick="return confirm('bạn có chắc chắn muốn xóa?..')" class="btn btn-danger"><i class="fa fa-trash">  Xóa</i></a></a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop