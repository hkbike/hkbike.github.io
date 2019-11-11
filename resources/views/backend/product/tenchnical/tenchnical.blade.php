@extends('backend.master')
@section('main')
<div class="col-md-12 tieu-de-ad" style="">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-home"></i><a href="{{route('trang-chu-admin')}}">Home</a>
					<i class="fa fa-angle-right"></i><a>Chi tiết sản phẩm</a>
					<i class="fa fa-angle-right"></i><a><i>Thông số sản phẩm</i></a>
					
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

<div class="col-md-12 thong-tin-sp" style="margin: 1px;">
	<div class="row">
		<div class="panel panel-primary" style="margin: 2px;">
            <div class="panel-heading">
                <i class="fa fa-table fa-fw"></i> Tất cả thông số kỹ thuật sản phẩm
            </div>
            <div class="panel-body">
			<div class="table-responsive">
				<table class="table table-hover table-striped">
					<thead>
						<tr>
							<th>STT</th>
							<th>Sản phẩm</th>
							<!-- <th>Yên</th>
							<th>Cỡ khung</th> -->
							<th>Khung sườn</th>
							<th>Tay lái</th>
							<th>Phuộc</th>
							<th>Tay phanh/Phanh</th>
							<!-- <th>Phanh</th> -->
							<th>Đĩa xích</th>
							<th>Vành/Lốp</th>
							<!-- <th>Lốp</th> -->
							<th>Sửa</th>
							<!-- <th>Xóa</th> -->
						</tr>
					</thead>
					<tbody>
						@foreach($tenchnical as $ten)
						<tr class="show_1">
							<td>{{$loop->index+1}}</td>
							<td>{{$ten->product->name}}<br>
								Yên:{{$ten->yen}}<br>
								Cỡ khung:{{$ten->co_khung}}
							</td>
							<!-- <td>{{$ten->yen}}</td>
							<td>{{$ten->co_khung}}</td> -->
							<td>{{$ten->khung_suon}}</td>
							<td>{{$ten->tay_lai}}</td>
							<td>{{$ten->phuoc}}</td>
							<td>Tay phanh: {{$ten->tay_phanh}}<br>
								Phanh: {{$ten->phanh}}
							</td>
							<!-- <td>{{$ten->phanh}}</td> -->
							<td>{{$ten->dia_xich}} mắt</td>
							<td>Vành: {{$ten->vanh}}<br>
								Lốp: {{$ten->lop}}		
							</td>
							<!-- <td>{{$ten->lop}}</td> -->
							<td><a href="tenchnical/edit-ten/{{$ten->id}}" class="btn btn-default"><i class="fa fa-edit">  Sửa</i></a></td>
							<!-- <td><a href="tenchnical/delete-ten/{{$ten->id}}" class="btn btn-danger"><i class="fa fa-trash">  Xóa</i></a></td> -->
							
						</tr>
						@endforeach
					</tbody>
				</table>
				{{$tenchnical->links()}}
			</div>
		</div>
	</div>
</div>
@stop