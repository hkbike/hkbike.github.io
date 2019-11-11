@extends('backend.master')
@section('main')
<div class="col-md-12">
	<div class="row">
	<form action="{{route('add-ten')}}" method="POST" role="form">
		<legend>Thêm thông số kỹ thuật cho sản phẩm</legend>
		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif

		@csrf
		<div class="col-md-12">
			<div class="row">
				<div class="form-group col-md-6">
					<label for="">Chọn sản phẩm</label>
					<select name="id_product" id="inputId_product" class="form-control" required="required">
						<option value="">--chọn sản phẩm--</option>
						@foreach($product as $pd)
							<option value="{{$pd->id}}">{{$pd->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group col-md-6">
					<label for="">yên xe</label>
					<input type="text" name="yen" id="" class="form-control" placeholder="Chất liệu gì " >
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="row">
				<div class="form-group col-md-6">
					<label for="">Cỡ khung xe</label>
					<input type="text" name="co_khung" id="" placeholder="bao nhiêu inches" class="form-control" >
				</div>
				<div class="form-group col-md-6">
					<label for="">Khung sườn</label>
					<input type="text" name="khung_suon" id="" placeholder="chất liệu: inox,sắt chịu lực,cao cấp thấp cấp" class="form-control" >
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="row">
				<div class="form-group col-md-6">
					<label for="">Tay lái</label>
					<input type="text" name="tay_lai" placeholder="chất liệu: inox,sắt chịu lực,cao cấp thấp cấp" id="" class="form-control" >
				</div>
				<div class="form-group col-md-6">
					<label for="">Phuộc</label>
					<input type="text" name="phuoc" placeholder="chất liệu:inox,sắt chịu lực,cao cấp thấp cấp" id="" class="form-control" >
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="row">
				<div class="form-group col-md-6">
					<label for="">Tay phanh</label>
					<input type="text" name="tay_phanh" placeholder="chất liệu:nhôm,.." id="" class="form-control" >
				</div>
				<div class="form-group col-md-6">
					<label for="">Phanh</label>
					<input type="text" name="phanh" placeholder="chất liệu:nhôm,.." id="" class="form-control" >
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="row">
				<div class="form-group col-md-6">
					<label for="">Đĩa xích</label>
					<input type="text" name="dia_xich" placeholder="bao nhiêu mắt" id="" class="form-control" >
				</div>
				<div class="form-group col-md-6">
					<label for="">Vành</label>
					<input type="text" name="vanh" placeholder="kích thước 24''x1.75" id="" class="form-control" >
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="row">
				
				<div class="form-group col-md-6">
					<label for="">Lốp</label>
					<input type="text" name="lop" placeholder="chất liệu cao su..." id="" class="form-control" >
				</div>
			</div>
		</div>
		<div class="col-md-12">
				<button type="submit" class="btn btn-primary">Hoàn thành</button>
		</div>
				
				
	</form>
	</div>
</div>
@stop