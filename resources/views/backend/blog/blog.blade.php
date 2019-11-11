@extends('backend.master')
@section('main')

<div class="col-md-12">
	<div class="row">
	<div class="row">
		@foreach($blog as $bl)
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<div class="thumbnail" >
					<img src="{{asset('upload/tin-tuc/')}}/{{$bl->image}}" width="100%" style="height: 150px"   alt="">
				<div class="caption">
					<h4>{{$bl->name}}</h4>
					<p>{{$bl->category->name}}</p>
						<a href="{{asset('admin/blog/chi-tiet-blog/')}}/{{$bl->id}}" class="btn btn-default"><i class="fa fa-edit">  Chi tiết</i></a>
						<a href="{{asset('admin/blog/delete-blog')}}/{{$bl->id}}" onclick="return confirm('bạn có chắc chắn muốn xóa?..')" class="btn btn-danger"><i class="fa fa-trash">  Xóa</i></a>
					</p>
				</div>
			</div>
		</div>
		@endforeach
		
	</div>
	
	</div>
</div>
</div>


@stop