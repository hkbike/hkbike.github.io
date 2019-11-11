@extends('backend.master')
@section('main')
 


<div class="col-md-12 tieu-de-ad" style="">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-home"></i><a href="{{route('trang-chu-admin')}}">Home</a>
					<i class="fa fa-angle-right"></i><a href="{{route('account')}}">Quản lý tài khoản</a>
					<i class="fa fa-angle-right"></i><a >Thêm tài khoản</a>
					
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
							<input type="text" name="name" class="form-control" id="" placeholder="Input field">
							
						</div>
						<div class="form-group col-md-6">
							<label for="">Địa chỉ Email:</label>
							<input type="email" name="email" class="form-control" id="" placeholder="Input field">
						</div>
					</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="row">
					<div class="row">
						<div class="form-group col-md-6">
							<label for="">Mật khẩu:</label>
							<input type="password" name="password" class="form-control" id="" placeholder="Input field">
							
						</div>
						<div class="form-group col-md-6">
							<label for="">Nhập lại mật khẩu:</label>
							<input type="password" name="passwordVf" class="form-control" id="" placeholder="Input field">
							
						</div>
					</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="row">
					<div class="row">
						<div class="form-group col-md-6">
							<label for="">Số điện thoại:</label>
							<input type="number" name="phone" class="form-control" id="" placeholder="Input field">
							
						</div>
						<div class="form-group col-md-6">
							<label for="">Địa chỉ:</label>
							<input type="text"  name="address" class="form-control" id="" placeholder="Input field">
							
						</div>
					</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="row">
					<div class="row">
						<div class="col-md-6" style="margin-top: 20px">
							<button type="submit" class="btn btn-primary">Đăng ký tài khoản</button>
						</div>
						<div class="form-group col-md-6">
							<label for="" >Phân quyền: </label>
								<select name="status" id="input" class="form-control" required="required">
									<option value="0">Khách hàng</option>
									<option value="1">Quản trị</option>
									<option value="2">Bị khóa</option>
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