@extends('backend.master')
@section('main')
<div class="table-responsive">
	@if(session('thong_bao'))
		<div class="alert alert-success">
			{{session('thong_bao')}}
		</div>
	@endif
	<table class="table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<th>STT</th>
				<th>Sản phẩm</th>
				<th>Yên</th>
				<th>Cỡ khung</th>
				<th>Khung sườn</th>
				<th>Tay lái</th>
				<th>Phuộc</th>
				<th>Tay phanh</th>
				<th>Phanh</th>
				<th>Đĩa xích</th>
				<th>Vành</th>
				<th>Lốp</th>
				<th>Chỉnh sửa</th>
				<!-- <th>Xóa</th> -->
			</tr>
		</thead>
		<tbody>
			@foreach($tenchnical2 as $ten)
			<tr class="show_1">
				<td>{{$loop->index+1}}</td>
				<td>{{$ten->product->name}}</td>
				<td>{{$ten->yen}}</td>
				<td>{{$ten->co_khung}}</td>
				<td>{{$ten->khung_suon}}</td>
				<td>{{$ten->tay_lai}}</td>
				<td>{{$ten->phuoc}}</td>
				<td>{{$ten->tay_phanh}}</td>
				<td>{{$ten->phanh}}</td>
				<td>{{$ten->dia_xich}}</td>
				<td>{{$ten->vanh}}</td>
				<td>{{$ten->lop}}</td>
				<td><a href="{{asset('admin/product/tenchnical/edit-ten')}}/{{$ten->id}}" class="btn btn-default"><i class="fa fa-edit">  Sửa</i></a></td>
				<!-- <td><a href="{{asset('admin/product/tenchnical/delete-ten')}}/{{$ten->id}}" onclick="return confirm('bạn có chắc chắn muốn xóa?..')" class="btn btn-danger"><i class="fa fa-trash">  Xóa</i></a></td> -->
				
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@stop