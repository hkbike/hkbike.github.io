@extends('backend.master')
@section('main')
<div class="col-md-12 tieu-de-ad" style="">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-home"></i><a href="{{route('trang-chu-admin')}}">Home</a>
					<i class="fa fa-angle-right"></i><a><i>Banner website</i></a>

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
		@if(session('thong_bao'))
			<div class="alert alert-success">
				{{session('thong_bao')}}
			</div>
		@endif
	@if(session('mes'))
		<div class="alert alert-success">
			{{session('mes')}}
		</div>
	@endif
	</div>
</div>

<div class="col-md-12 thong-tin-sp" style="margin-bottom: 25px;">
	<div class="row">
		<div class="panel panel-primary" style="margin: 2px;">
            <div class="panel-heading">
                <i class="fa fa-image"></i> Thêm banner cho Website
            </div>
            <div class="panel-body">
			<form action="" method="POST" role="form" enctype="multipart/form-data">
				
				
				@csrf
				<div class="col-md-12">
					<div class="row">
					<div class="row">
						<div class="form-group col-md-6">
							<label for="">Tên banner</label>
							<input type="text" name="name" class="form-control" id="" placeholder="Input field">
						</div>
						<div class="form-group col-md-6">
							<label for="">Nội dung của banner</label>
							<input type="text" name="content" class="form-control" id="" placeholder="Input field">
						</div>
					</div>
					</div>
				</div>
				
				<div class="col-md-12">
					<div class="row">
					<div class="row">
						<div class="form-group col-md-6">
							<label for="">Thứ tự</label>
							<!-- <input type="number" name="" class="form-control" id="" placeholder="Input field"> -->
							<select name="ordering" id="input" class="form-control" required="required">
								<option value="1">banner chính trang chủ</option>
								<option value="3">banner nhỏ trang chủ</option>
								<option value="2" selected>banner  trang phụ</option>
								<option value="4">banner nhỏ trang phụ</option>
							</select>
						</div>
						<div class="form-group col-md-6">
							<label for="">Trạng thái</label><br>
							<input type="radio" name="status" value="0" class="form" id="" checked placeholder="Input field">Ẩn
							<input type="radio" name="status" value="1" class="form" id="" placeholder="Input field">Hiển thị
						</div>
					</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="row">
					<div class="row">
						<div class="form-group col-md-6">
							<label for="">Chọn ảnh</label>
							<input type="file" class="form-control" name="image">
						</div>
						<div class="form-group col-md-6">
							<button type="submit" class="btn btn-primary" style="margin-top: 25px">Thêm banner</button>
						</div>
					</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	</div>
</div>
<div class="col-md-12 thong-tin-sp">
	<div class="row">
	
	<!-- <div class="table-responsive">
		<table class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên banner</th>
					<th>Thứ tự</th>
					<th>Trạng thái</th>
					<th>Ảnh</th>
					<th>Chỉnh sửa</th>
					<th>Xóa</th>
				</tr>
			</thead>
			<tbody>
				@foreach($banner as $value)
				<tr class="show_1">
					<td>{{$loop->index+1}}</td>
					<td>{{$value->name}}</td>
					@if(($value->ordering)==1)
						<td>Banner chính trang chủ</td>
					@elseif(($value->ordering)==3)
						<td>Banner nhỏ trang chủ</td>
					@elseif(($value->ordering)==2)
						<td>Banner trang phụ</td>
					@elseif(($value->ordering)==4)
						<td>Banner nhỏ trang phụ</td>
					@else
						<td>Banner phụ khác</td>
					@endif
					@if($value->status==0)
					<td>Ẩn</td>
					@else
					<td>Hiển thị</td>
					@endif
					<td><img src="{{asset('upload/banner')}}/{{$value->image}}" width="50px" alt=""></td>
					<td><a href="banner/edit-banner/{{$value->id}}" class="btn btn-default"><i class="fa fa-edit">  Sửa</i></a></td>
					<td><a href="banner/delete-banner/{{$value->id}}" onclick="return confirm('bạn có chắc chắn muốn xóa?..')" class="btn btn-danger"><i class="fa fa-trash">  Xóa</i></a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div> -->

	<!-- <div class="row"> -->
		<div class="panel panel-primary" style="margin: 2px;">
            <div class="panel-heading">
                <i class="fa fa-image"></i> Tất cả banner
            </div>
            <div class="panel-body">
				@foreach($banner as $value)
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<div class="thumbnail" >
							<img src="{{asset('upload/banner')}}/{{$value->image}}" style="height: 150px"   alt="">
						<div class="caption">
							<h4>{{$value->name}}</h4>
							@if(($value->ordering)==1)
								<p>Vị trí : Banner chính trang chủ</p>
							@elseif(($value->ordering)==3)
								<p>Vị trí : Banner nhỏ trang chủ</p>
							@elseif(($value->ordering)==2)
								<p>Vị trí : Banner trang phụ</p>
							@elseif(($value->ordering)==4)
								<p>Vị trí : Banner nhỏ trang phụ</p>
							@else
								<p>Vị trí : Banner phụ khác</p>
							@endif
							@if($value->status==0)
								<p>Trạng thái : Ẩn</p>
							@else
								<p>Trạng thái : Hiển thị</p>
							@endif
							
							<p>
								<a href="banner/edit-banner/{{$value->id}}" class="btn btn-default"><i class="fa fa-edit">  Chi tiết</i></a>
								<a href="banner/delete-banner/{{$value->id}}" onclick="return confirm('bạn có chắc chắn muốn xóa?..')" class="btn btn-danger"><i class="fa fa-trash">  Xóa</i></a>
							</p>
						</div>
					</div>
				</div>
				@endforeach
			</div>
				{{$banner->links()}}
			</div>
		<!-- </div> -->

	</div>
</div>
@stop