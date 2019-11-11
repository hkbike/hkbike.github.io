@extends('backend.master')
@section('main')
<div class="col-md-4">
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
				<legend>Thêm cửa hàng</legend>
				@csrf
				
				<div class="form-group">
					<label for="">Tên của hàng</label>
					<input type="text" name="name" class="form-control"  placeholder="Nhập tên cửa hàng">
				</div>
				<div class="form-group">
					<label for="">Địa chỉ</label>
					<input type="text" name="address" class="form-control"  placeholder="Nhập tên cửa hàng">
				</div>
				<div class="form-group">
					<label for="">Số điện thoại</label>
					<input type="number" name="phone" class="form-control" placeholder="Nhập số điện thoại">
				</div>
				<div class="form-group">
					<label for="">Email</label>
					<input type="email" name="email" class="form-control" placeholder="Nhập email">
				</div>
				<div class="form-group">
					<label for="">Thứ tự cửa hàng</label>
					<input type="number" name="ordering" class="form-control" placeholder="1 là chính 2 là phụ">
				</div>
				<div class="form-group">
					<label for="">trạng thái</label>
					<select name="status" id="input" class="form-control" required="required">
						<option value="">--chọn--</option>
						<option value="0" checked>Ẩn</option>
						<option value="1">hiện</option>
					</select>
				</div>
				<button type="submit" class="btn btn-primary">Thêm thể loại</button>
			</form>
		</div>
		<div class="col-md-8">
			<div class="table-responsive">
				<table class="table table-hover table-striped table-bordered">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên cửa hàng</th>
							<th>Địa chỉ</th>
							<th>Số điện thoại</th>
							<th>Email</th>
							<th>Thứ tự</th>
							<th>Trạng thái</th>
							<th>Chỉnh sửa</th>
							<th>Xóa</th>
							
						</tr>
					</thead>
					<tbody>
						@foreach($store as $st)
						<tr class="show_1">
							<td>{{$loop->index+1}}</td>
							<td>{{$st->name}}</td>
							<td>{{$st->address}}</td>
							<td>{{$st->phone}}</td>
							<td>{{$st->email}}</td>
							<td>{{$st->ordering}}</td>
							@if(($st->status)==0)
							<td>Ẩn</td>
							@else
							<td>Hiện</td>
							@endif
							<td><a href="{{asset('admin/store/sua')}}/{{$st->id}}" class="btn btn-default"><i class="fa fa-edit">  Sửa</i></a></td>
							<td><a href="{{asset('admin/store/xoa')}}/{{$st->id}}" onclick="return confirm('bạn có chắc chắn muốn xóa?..')" class="btn btn-danger"><i class="fa fa-trash">  Xóa</i></a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>



@stop