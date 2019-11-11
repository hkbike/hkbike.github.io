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
<div class="row">
	<div class="col-md-4 thong-tin-sp">
		 <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-table fa-fw"></i> Thêm xuất xứ cho sản phẩm
               
            </div>
            <div class="panel-body">
				<form action="" method="POST" role="form" enctype="multipart/form-data">
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
					@csrf
					<div class="form-group">
						<label for="">Sản phẩm</label>
						<select name="product_id" id="input" class="form-control" required="required">
							<option value="">--chọn sản phẩm--</option>
							@foreach($product as $pd)
								<option value="{{$pd->id}}" >{{$pd->name}}</option>
							@endforeach
						</select>
						
					</div>
					<div class="form-group">
						<label for="">Xuất xứ sản phẩm</label>
						<input type="text" name="xuat_xu" class="form-control" id="" placeholder="Input field">
					</div>
					<div class="form-group">
						<label for="">Hãng sản xuất</label>
						<input type="text" name="hang_san_xuat" class="form-control" placeholder="Input field">
					</div>
					<div class="form-group">
						<label for="">Cỡ bánh</label>
						<input type="number" name="co_banh" class="form-control" placeholder="co bánh theo ich">
					</div>
					<div class="form-group">
						<label for="">Trọng lượng</label>
						<input type="text" name="trong_luong" class="form-control" placeholder="theo kilogram">
					</div>
					
					<button type="submit" class="btn btn-primary">Thêm xuất xứ sản phẩm</button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-8 thong-tin-sp">
		<div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-table fa-fw"></i> Xuất xứ tất cả sản phẩm
               
            </div>
            <div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover table-striped ">
						<thead>
							<tr>
								<th>STT</th>
								<th>Sản phẩm</th>
								<th>Thông tin</th>
								<th>Hãng sản xuất</th>
								<th>Tác vụ</th>
								
							</tr>
						</thead>
						<tbody>
							@foreach($detail as $pd)
							<tr class="show_1">
								<td>{{$loop->index+1}}

								</td>
								<td>{{$pd->product->name}}<br>
									
								</td>
								<td>
									Cỡ bánh:{{$pd->co_banh}} inch<br>
									Trọng lượng:{{$pd->trong_luong}} Kg</td>
								<td>{{$pd->hang_san_xuat}}<br>
									({{$pd->xuat_xu}})
								</td>
								<!-- <td>{{$pd->co_banh}} - ich</td> -->
								<!-- <td>{{$pd->trong_luong}} - kg</td> -->
								<td><a href="detail/edit/{{$pd->id}}" class="btn btn-default"><i class="fa fa-edit">  Sửa</i></a></td>
								  <!-- <a href="detail/delete/{{$pd->id}}" onclick="return confirm('bạn có chắc chắn muốn xóa?..')" class="btn btn-danger"><i class="fa fa-trash">  Xóa</i></a> -->
							</tr>
							@endforeach
						</tbody>
					</table>
					{{$detail->links()}}
				</div>
			</div>
		</div>
	</div>
</div>
@stop