@extends('backend.master')
@section('main')
<div class="col-md-12 tieu-de-ad" style="">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-home"></i><a href="{{route('trang-chu-admin')}}">Home</a>
					<i class="fa fa-angle-right"></i><a href="{{route('backend-product')}}">Chi tiết sản phẩm</a>
					<i class="fa fa-angle-right"></i><a><i>Xuất xứ sản phẩm: {{$detail->product->name}}</i></a>
					
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
	</div>
</div>
<div class="row">
<div class="col-md-7 thong-tin-sp ">
	<div class="panel panel-primary" style="margin-left: 1px">
	<div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Cập nhật xuất xứ cho sản phẩm 
               
            </div>
    <div class="panel-body">
	<form action="" method="POST" role="form" enctype="multipart/form-data">
		
		@csrf
		<div class="form-group">
			<label for="">Sản phẩm</label>
			<select name="product_id" id="input" readonly class="form-control" required="required">
				<option value="">--chọn sản phẩm--</option>
				@foreach($product as $pd)
					<option value="{{$pd->id}}"{{(($pd->id)==($detail->product_id))?'selected':''}} >{{$pd->name}}</option>
				@endforeach
			</select>
			
		</div>
		<div class="form-group">
			<label for="">Xuất xứ sản phẩm</label>
			<input type="text" name="xuat_xu" value="{{$detail->xuat_xu}}" class="form-control" id="" placeholder="Input field">
		</div>
		<div class="form-group">
			<label for="">Hãng sản xuất</label>
			<input type="text" name="hang_san_xuat" value="{{$detail->hang_san_xuat}}" class="form-control" placeholder="Input field">
		</div>
		<div class="form-group">
			<label for="">Cỡ bánh</label>
			<input type="number" name="co_banh" value="{{$detail->co_banh}}" class="form-control" placeholder="co bánh theo ich">
		</div>
		<div class="form-group">
			<label for="">Trọng lượng</label>
			<input type="text" name="trong_luong" value="{{$detail->trong_luong}}" class="form-control" placeholder="theo kilogram">
		</div>
		
		<button type="submit" class="btn btn-primary">Cập nhật xuất xứ sản phẩm</button>
	</form>
</div>
</div>
</div>
</div>
@stop