@extends('backend.master')
@section('main')
<div class="col-md-12 tieu-de-ad" style="">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-home"></i><a href="{{route('trang-chu-admin')}}">Home</a>
					<i class="fa fa-angle-right"></i><a>Chi tiết sản phẩm</a>
					<i class="fa fa-angle-right"></i><a><i>Xuất xứ sản phẩm</i></a>
					
				</h3>
				
			</div>
			
		</div>
	</div>
</div>
<div class="col-md-8">
	<div class="table-responsive">
		<table class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th>STT</th>
					<th>Sản phẩm</th>
					<th>Xuất xứ</th>
					<th>Hãng sản xuất</th>
					<th>Cỡ bánh</th>
					<th>Trọng lượng</th>
					<th>Chỉnh sửa</th>
					<th>Xóa</th>
				</tr>
			</thead>
			<tbody>
				@foreach($detail as $pd)
				<tr class="show_1">
					<td>{{$loop->index+1}}</td>
					<td>{{$pd->product->name}}</td>
					<td>{{$pd->xuat_xu}}</td>
					<td>{{$pd->hang_san_xuat}}</td>
					<td>{{$pd->co_banh}} - ich</td>
					<td>{{$pd->trong_luong}} - kg</td>
					<td><a href="{{asset('admin/product/detail/edit')}}/{{$pd->id}}" class="btn btn-default"><i class="fa fa-edit">  Sửa</i></a></td>
					<td><a href="{{asset('admin/product/detail/delete')}}/{{$pd->id}}" onclick="return confirm('bạn có chắc chắn muốn xóa?..')" class="btn btn-danger"><i class="fa fa-trash">  Xóa</i></a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop