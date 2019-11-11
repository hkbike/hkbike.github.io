@extends('backend.master')
@section('main')
 


<div class="col-md-12 tieu-de-ad" style="">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-home"></i><a href="{{route('trang-chu-admin')}}">Home</a>
					<i class="fa fa-angle-right"></i><a href="{{route('account')}}">Quản lý tài khoản</a>
					<i class="fa fa-angle-right"></i><a><i>Chỉnh sửa tài khoản: {{$user->email}}</i></a>
				</h3>
				
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

<div class="col-md-12 table-admin" style="padding: 0px; width: 100%">
	<!-- <div class="row"> -->
		<div class="panel panel-primary" style="margin-left: 1px;margin-right: 1px; width: 100%">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-plus" style="padding-right: 10px"></i>Thêm tài khoản </h3>
			</div>
			<div class="panel-body">
			<form action="" method="POST" role="form">
				
				@csrf
				<div class="col-md-12">
					<div class="row">
					<div class="row">
						<div class="form-group col-md-6">
							<label for="">Tên người dùng:</label>
							<input type="text" name="name" class="form-control" id="" value="{{$user->name}}" placeholder="Input field">
							
						</div>
						<div class="form-group col-md-6">
							<label for="">Địa chỉ Email:</label>
							<input type="email" name="email" value="{{$user->email}}" readonly class="form-control" id="" placeholder="Input field">
						</div>
					</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="row">
					<div class="row">
						<div class="form-group col-md-6">
							<input type="checkbox" id="checkpas" name="changePassword">
							<label for="">Đổi mật khẩu:</label>

							<input type="password" name="password"  class="form-control pas" id="" placeholder="Input field" disabled>
							
						</div>
						<div class="form-group col-md-6">
							<label for="">Nhập lại mật khẩu:</label>
							<input type="password" name="passwordVf" class="form-control pas" id="" placeholder="Input field" disabled>
							
						</div>
					</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="row">
					<div class="row">
						<div class="form-group col-md-6">
							<label for="">Số điện thoại:</label>
							<input type="number" name="phone" value="{{$user->phone}}" readonly class="form-control" id="" placeholder="Input field">
							
						</div>
						<div class="form-group col-md-6">
							<label for="">Địa chỉ:</label>
							<input type="text"  name="address" value="{{$user->address}}" class="form-control" id="" placeholder="Input field">
							
						</div>
					</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="row">
					<div class="row">
						<div class="col-md-6" style="margin-top: 20px">
							<button type="submit" class="btn btn-primary">Cập nhật tài khoản</button>
						</div>
						<div class="form-group col-md-6">
							<label for="" >Phân quyền: </label>
								<select name="status" id="input" class="form-control" required="required">
									<option value="0" {{($user->status == 0)?'selected':''}}>Khách hàng</option>
									<option value="1" {{($user->status == 1)?'selected':''}}>Quản trị</option>
									<option value="2" {{($user->status == 2)?'selected':''}}>Bị khóa</option>
								</select>
							</div>
						
					</div>
					</div>
				</div>
			</form>
			</div>
		</div>
	<!-- </div> -->
</div>



@stop