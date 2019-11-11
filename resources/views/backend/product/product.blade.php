@extends('backend.master')
@section('main')

<div class="col-md-12 tieu-de-ad" style="">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-home"></i><a href="{{route('trang-chu-admin')}}">Home</a>
					<i class="fa fa-angle-right"></i><a><i>Quản lý Sản phẩm</i></a>
					<a href="{{route('backend-add-product')}}" class="pull-right"><i class="fa fa-plus" style="padding-right: 10px"></i>thêm sản phẩm</a>
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
<div class="col-md-12 panel">
	<div class="row">
		<div class="col-md-12 tieu-de">
			<h5>Tìm kiếm theo tên sản phẩm:</h5>
		</div>
		<div class="col-md-12 tim-kiem">
			<div class="row">
				<form action="{{route('search-pd')}}" method="get" class="form-inline" role="form">
					<div class="form-group">
						<label class="sr-only" for="">label</label>
						<input type="text" name="keyword" class="form-control" id="" placeholder="Nhập tên sản phẩm">
					</div>
					<button type="submit" class="btn btn-primary">Tìm kiếm</button>
				</form>
    		</div>
		</div>
		<div class="col-md-12 tieu-de2">
			<div class="row">
				<h5>Tìm kiếm nhanh:</h5>
				<ul class="sp-tk">
					<li class="">
						<!-- <div class="row"> -->

						<form action="{{route('search-hien')}}" class="navbar-form" method="get" >
						        <input type="hidden" class="form-control" value="1" name="hien" placeholder="Nhập sản phẩm">
						        <button type="submit" class="btn btn-primary">Sản phẩm Hiện </button>
						</form>
						
					</li>
					<li class="">
						<!-- <div class="row"> -->
						<form action="{{route('search-an')}}" class="navbar-form" method="get" >
						        <input type="hidden" class="form-control" value="1" name="an" placeholder="Nhập sản phẩm">
						        <button type="submit" class="btn btn-success">Sản phẩm Ẩn</button>
						</form>
						<!-- </div> -->
					</li>
					<li class="">
						<!-- <div class="row"> -->
						<form action="{{route('search-new')}}" class="navbar-form" method="get" >
						        <input type="hidden" class="form-control" value="2" name="new" placeholder="Nhập sản phẩm">
						        <button type="submit" class="btn btn-warning">Sản phẩm mới</button>
						</form>
						<!-- </div> -->
					</li>
					<li class="">
						<!-- <div class="row"> -->
						<form action="{{route('search-hot')}}" class="navbar-form" method="get" >
						        <input type="hidden" class="form-control" value="1" name="hot" placeholder="Nhập sản phẩm">
						        <button type="submit" class="btn btn-dark">Sản phẩm bán chạy</button>
						</form>
						<!-- </div> -->
					</li>
				</ul>
			
			</div>
		</div>
	</div>
</div>
	

<div class="col-md-12">
	<div class="row">
	<div class="row">
		@foreach($products as $product)
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<div class="thumbnail product-item" >
				<div class="anh">
					<img src="{{asset('upload/')}}/{{$product->image}}" class="img-sp"  alt="">
				</div>
				<div class="caption" style="height: 180px">
					<h4>{{$product->name}}</h4>
					@if(($product->type)==0)
						<p style="height: 30px">TL:{{$product->category->name}} (SP thường)</p>
					@elseif(($product->type)==1)
						<p style="height: 30px">TL:{{$product->category->name}} (SP bán chạy)</p>
						
					@elseif(($product->type)==2)
						<p style="height: 30px">TL:{{$product->category->name}} (SP mới)</p>
					@endif
					
					@if(($product->sale_price)<100)
						<p class="">Giá bán:{{number_format($product->price)}} VNĐ </p>
					@else
					<p class="">Giá KM:{{number_format($product->sale_price)}} VNĐ </p>
					@endif
					<p>
						<a href="{{asset('admin/product/chi-tiet-san-pham/')}}/{{$product->id}}" class="btn btn-default"><i class="fa fa-edit">  Chi tiết</i></a>
						<a href="{{asset('admin/product/delete-pd')}}/{{$product->id}}" onclick="return confirm('bạn có chắc chắn muốn xóa?..')" class="btn btn-danger"><i class="fa fa-trash">  Xóa</i></a>
					</p>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	</div>
	{{$products->links()}}
</div>

@stop