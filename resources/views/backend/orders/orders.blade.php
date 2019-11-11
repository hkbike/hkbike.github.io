@extends('backend.master')
@section('main')
 

<div class="col-md-12 tieu-de-ad" style="">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-home"></i><a href="{{route('trang-chu-admin')}}">Home</a>
					<i class="fa fa-angle-right"></i><a>Quản lý đơn hàng</a>
					
				</h3>
				
			</div>
			
		</div>
	</div>
</div>
<div class="col-md-12 panel">
	<div class="row">
		<div class="col-md-12 tieu-de">
			<h5>Tìm kiếm đơn hàng:</h5>
		</div>
		<div class="col-md-12 tim-kiem">
			<div class="row">
				<form action="{{route('search-OD')}}" method="get" class="form-inline" role="form">
					<div class="form-group">
						<label class="sr-only" for="">label</label>
						<input type="email" name="email" class="form-control" id="" placeholder="Nhập email đơn hàng">
					</div>
					<div class="form-group">
						<label class="sr-only" for="">label</label>
						<select name="status" id="inputStatus" class="form-control" required="required">
							<option value=" ">--Chọn trạng thái đơn hàng--</option>
							<option value="0">Đang Xử Lý</option>
							<option value="1">Đang Giao Hàng</option>
							<option value="2">Hoàn Thành</option>
							<option value="3">Hủy</option>
						</select>
					</div>
					<button type="submit" class="btn btn-primary">Tìm kiếm</button>
				</form>
    		</div>
		</div>
		
		
	</div>
</div>
<div class="col-md-12">
	<div class="row">
		@if(count($errors)>0)
		<div class="alert alert-danger">
			@foreach($errors->all() as $err)
				{{$err}}<br>
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

<div class="col-md-12" >
	<div class="row">
	<div class="panel panel-primary"style="margin: 2px; width: 100%">
		<div class="panel-heading">
	           <h3 class="panel-title"><i class="fa fa-plus" style="padding-right: 10px"></i>Quản lý Đơn hàng</h3>
	         </div>
	   <div class="panel-body">
			<div class="table-responsive " >
				
				<table class="table table-hover table-striped ">
					<thead>
						<tr>
							<th>STT</th>
							<th>Email</th>
							<!-- <th>Tên</th> -->
							
							<th>Tổng tiền</th>
							<th>Trạng thái</th>
							<th>Ngày tạo</th>
							<th>Thao tác</th>
							
						</tr>
					</thead>
					<tbody>
						@foreach($orders as $row)
						<tr class="show_1">
							<td>{{$loop->index+1}}</td>
							<td>{{$row->email}}<br>
								(KH: {{$row->name}} ).<br>
								(DC:{{$row->address}})
							</td>
							<td>{{number_format($row->total_price)}} Đ</td>
							@if($row->status==0)
							<td><a class="btn btn-danger">Đang Xử Lý</a></td>
							@elseif($row->status==1)
							<td><a class="btn btn-info">Đang giao hàng</a></td>
							@else
							<td><a class="btn btn-success">Đơn hàng hoàn thành</a></td>
							@endif
							<td>{{$row->created_at}}</td>
							<td><a href="{{asset('admin/orders/chi-tiet-dh')}}/{{$row->id}}" class="btn btn-default"><i class="fa fa-plus-circle">  Chi tiết</i></a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
				
			</div>
			{{$orders->links()}}
		</div>
	</div>
</div>
</div>




@stop