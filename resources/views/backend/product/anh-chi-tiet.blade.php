@extends('backend.master')
@section('main')
<div class="col-md-12 tieu-de-ad" style="">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-home"></i><a href="{{route('trang-chu-admin')}}">Home</a>
					<i class="fa fa-angle-right"></i><a href="{{route('backend-product')}}">Quản lý Sản phẩm</a>
         			 <i class="fa fa-angle-right"></i><a><i>Chi tiết sản phẩm</i></a>
					
				</h3>
				
			</div>
			
		</div>
	</div>
</div>
<div class="row">
<div class="col-md-4 thong-tin-sp">
	<div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-image"></i> Thêm ảnh sản phẩm
            </div>
	
	 <div class="panel-body">
	<form action="" method="POST" role="form" enctype="multipart/form-data">
		
		@if(session('xoa_anh'))
				<div class="alert alert-success">
					{{session('xoa_anh')}}
				</div>
		@endif
		@if(session('mes'))
				<div class="alert alert-success">
					{{session('mes')}}
				</div>
		@endif
		<input type="hidden" class="" name="_token" value="{{csrf_token()}}">
		<div class="form-group">
			<label for="">Sản phẩm</label>
			<select name="product_id" id="input"  class="form-control" required="required">
				<option value="{{$namepd->id}}"  selected>{{$namepd->name}}</option>
			</select>
			
		</div>
		<div class="form-group">
			<label for="">Trạng thái</label>
			<select name="status" id="inputStatus" class="form-control" required="required">
				<option value="0" >Ẩn</option>
				<option value="1" >Hiện</option>
				<option value="2" >Stock</option>
			</select>
		</div>
		<div class="form-group">
			<label for="" >Chọn Ảnh</label>
			<input type="file" class="form-control" name="link" >
			@if($errors->has('link'))
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert"  aria-hidden="true">&times;</button>
					<strong>{!!$errors->first('link')!!}</strong>  ...
				</div>
				
			@endif
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
</div>
</div>
<div class="col-md-8 thong-tin-sp">
	@if(session('thong_bao'))
				<div class="alert alert-success">
					{{session('thong_bao')}}
				</div>
		@endif
	<div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-image"></i> Thông tin về sản phẩm: {{$namepd->name}}
            </div>
	
	  <div class="panel-body">
	<div class="table-responsive">
		<table class="table table-hover table-striped ">
			<thead>
				<tr >
					<th>STT</th>
					<th>Ảnh sản phẩm</th>
					<th>Sản phẩm</th>
					<th>Trạng thái</th>
					<th>Tác vụ</th>
					
				</tr>
			</thead>
			<tbody>
				
				@foreach($pdimage as $pdimg)
				<tr class="show_1">
					<td>{{$loop->index+1}}</td>
					<td><img src="{{asset('upload/pd/')}}/{{$pdimg->link}}" width="120px"alt=""></td>
					<td>{{$pdimg->pdimg->name}}<br>
							({{$pdimg->created_at}})
					</td>
					@if($pdimg->status==0)
					<td>Ẩn</td>
					@elseif($pdimg->status==1)
					<td>Hiển thị</td>
					@else
					<td>Stock</td>
					@endif
					<td><a href="{{asset('admin/product/edit-img')}}/{{$pdimg->id}}" class="btn btn-default"><i class="fa fa-edit">  Sửa</i></a>  <a href="{{asset('admin/product/delete-img')}}/{{$pdimg->id}}"  onclick="return confirm('bạn có chắc chắn muốn xóa?..')" class="btn btn-danger"><i class="fa fa-trash">  Xóa</i></a></td>
				
				</tr>
				@endforeach
			</tbody>
		</table>
		</div>
	</div>
	<p>Tổng số: {{count($pdimage)}} ảnh </p>
</div>
</div>
@stop