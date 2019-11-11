@extends('backend.master')
@section('main')

<div class="col-md-12 tieu-de-ad" style="">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-home"></i><a href="{{route('trang-chu-admin')}}">Home</a>
					<i class="fa fa-angle-right"></i><a>Chi tiết sản phẩm</a>
					<i class="fa fa-angle-right"></i><a href="{{route('tenchnical')}}">Thông số sản phẩm</a>
					<i class="fa fa-angle-right"></i><a ><i>Chỉnh sửa thông số sản phẩm</i></a>
					
				</h3>
				
			</div>
			
		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="row">
		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
	</div>
</div>
<div class="col-md-12 thong-tin-sp">
	<div class="row">
	<!-- <div class="row"> -->
	<div class="panel panel-primary" style="margin: 2px;">
            <div class="panel-heading">
                <i class="fa fa-table fa-fw"></i> Chỉnh sửa thông số kỹ thuật cho sản phẩm: {{$ten->product->name}}
            </div>
            <div class="panel-body">

				<form action="" method="POST" role="form">
					<!-- <legend>Thêm thông số kỹ thuật cho sản phẩm</legend> -->
					

					@csrf
					<div class="col-md-12">
						<div class="row">
							<div class="form-group col-md-6">
								<label for="">Chọn sản phẩm</label>
								<select name="id_product" id="inputId_product" class="form-control" required="required">
									<option value="">--chọn sản phẩm--</option>
									@foreach($product as $pd)
										<option value="{{$pd->id}}" {{(($ten->id_product)==($pd->id))?'selected':''}}>{{$pd->name}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-md-6">
								<label for="">yên xe</label>
								<input type="text" name="yen" value="{{($ten->yen)}}" id="" class="form-control" placeholder="Chất liệu gì " >
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="form-group col-md-6">
								<label for="">Cỡ khung xe</label>
								<input type="text" name="co_khung" value="{{($ten->co_khung)}}" id="" placeholder="bao nhiêu inches" class="form-control" >
							</div>
							<div class="form-group col-md-6">
								<label for="">Khung sườn</label>
								<input type="text" name="khung_suon" value="{{($ten->khung_suon)}}" id="" placeholder="chất liệu: inox,sắt chịu lực,cao cấp thấp cấp" class="form-control" >
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="form-group col-md-6">
								<label for="">Tay lái</label>
								<input type="text" name="tay_lai" value="{{($ten->tay_lai)}}" placeholder="chất liệu: inox,sắt chịu lực,cao cấp thấp cấp" id="" class="form-control" >
							</div>
							<div class="form-group col-md-6">
								<label for="">Phuộc</label>
								<input type="text" name="phuoc" value="{{($ten->phuoc)}}" placeholder="chất liệu:inox,sắt chịu lực,cao cấp thấp cấp" id="" class="form-control" >
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="form-group col-md-6">
								<label for="">Tay phanh</label>
								<input type="text" name="tay_phanh" value="{{($ten->tay_phanh)}}" placeholder="chất liệu:nhôm,.." id="" class="form-control" >
							</div>
							<div class="form-group col-md-6">
								<label for="">Phanh</label>
								<input type="text" name="phanh" value="{{($ten->phanh)}}" placeholder="chất liệu:nhôm,.." id="" class="form-control" >
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="form-group col-md-6">
								<label for="">Đĩa xích</label>
								<input type="text" name="dia_xich" value="{{($ten->dia_xich)}}" placeholder="bao nhiêu mắt" id="" class="form-control" >
							</div>
							<div class="form-group col-md-6">
								<label for="">Vành</label>
								<input type="text" name="vanh" value="{{($ten->vanh)}}" placeholder="kích thước 24''x1.75" id="" class="form-control" >
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							
							<div class="form-group col-md-6">
								<label for="">Lốp</label>
								<input type="text" name="lop" value="{{($ten->lop)}}" placeholder="chất liệu cao su..." id="" class="form-control" >
							</div>
						</div>
					</div>
					<div class="col-md-12">
							<button type="submit" class="btn btn-primary">Sửa</button>
					</div>
							
							
				</form>
				</div>
			</div>
	</div>
	<!-- </div> -->
</div>
@stop