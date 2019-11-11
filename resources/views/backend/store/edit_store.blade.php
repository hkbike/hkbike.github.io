@extends('backend.master')
@section('main')
<div class="col-md-8">
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
	
	<form action="" method="POST" role="form">
		<legend>Sửa cửa hàng: {{$store->name}}</legend>
		@csrf
		
		<div class="form-group">
			<label for="">Tên của hàng</label>
			<input type="text" name="name" value="{{$store->name}}" class="form-control"  placeholder="Nhập tên cửa hàng">
		</div>
		<div class="form-group">
			<label for="">Số điện thoại</label>
			<input type="number" name="phone" value="{{$store->phone}}" class="form-control" placeholder="Nhập số điện thoại">
		</div>
		<div class="form-group">
			<label for="">Email</label> 
			<input type="email" name="email" value="{{$store->email}}" class="form-control" placeholder="Nhập email">
		</div>
		<div class="form-group">
			<label for="">Thứ tự cửa hàng</label>
			<input type="number" name="ordering" value="{{$store->ordering}}" class="form-control" placeholder="1 là chính 2 là phụ">
		</div>
		<div class="form-group">
			<label for="">trạng thái</label>
			<select name="status" id="input" class="form-control" required="required">
				<!-- <option value="">--chọn--</option> -->
				<option value="0" {{(($store->status)==0)?' selected ':''}}>Ẩn</option>
				<option value="1" {{(($store->status)==1)?' selected ':''}}>hiện</option>
			</select>
		</div>
		<button type="submit" class="btn btn-primary">Cập nhật</button>
	</form>
</div>
		



@stop