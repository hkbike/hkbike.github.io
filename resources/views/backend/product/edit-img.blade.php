@extends('backend.master')
@section('main')
<form action="" method="POST" role="form" enctype="multipart/form-data">
	<legend>Sửa ảnh sản phẩm</legend>
	@csrf
	<div class="form-group">
		<label for="">Sản phẩm</label>
		<select name="product_id" id="input" class="form-control" required="required">
				<option value="">--Chọn sản phẩm--</option>
				@foreach($product as $pd)
					<option value="{{$pd->id}}" {{(($pd->id)==($image_pd->product_id))?'selected':''}} >{{$pd->name}}</option>
				@endforeach
		</select>
		<div class="form-group">
			<label for="">Trạng thái</label>
			<select name="status" id="inputStatus" class="form-control" required="required">
				<option value="0" {{(($image_pd->status)==0)?'checked':''}} >Ẩn</option>
				<option value="1" {{(($image_pd->status)==1)?'checked':''}}>Hiện</option>
				<option value="2" {{(($image_pd->status)==2)?'checked':''}}>Stock</option>
			</select>
		</div>
		<div class="form-group">
			<label for="">Chọn Ảnh</label>
			<input type="file" name="link">
			<img src="{{asset('upload/pd')}}/{{$image_pd->link}}" width="200px" alt="">
		</div>
	</div>
	<button type="submit" class="btn btn-primary">Sửa</button>
</form>
@stop