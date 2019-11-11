@extends('backend.master')
       

@section('main')
<div class="col-md-12">
  <div class="row">
    <div class="col-md-4">
      <h4>Sản phẩm: {{$blog1->name}}</h4>
    </div>
    
  </div>
</div>
<div class="row">
<main class="col-md-5">
	<div class="row">
	 <div class="col-md-12 thong-tin-sp" >
        
          <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Thông tin bài viết
               
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <!-- <div id="morris-area-chart"></div> -->
              <ul class="ttsp" style="padding: 0px">
                <li>
                  <span class="label-col-sp">Tên bài viết:</span>
                  <span class="content-col-sp">{{$blog1->name}}</span>
                </li>
                 <li>
                  <span class="label-col-sp">Slug bài viết:</span>
                  <span class="content-col-sp">{{$blog1->slug}}</span>
                </li>
                <li>
                  <span class="label-col-sp">Trạng thái bài viết:</span>
                  @if(($blog1->status)==0)
                  <span class="content-col-sp">Ẩn</span>
                  @elseif(($blog1->status)==1)
                  <span class="content-col-sp">Hiện</span>
                  @endif
                </li>
                <li>
                  <span class="label-col-sp">Loại tin tức:</span>
                  <span class="content-col-sp">{{$blog1->category->name}}</span>
                </li>
                 

              </ul>
          <a href="{{asset('admin/blog/edit-blog')}}/{{$blog1->id}}" class="btn btn-success"><i class="fa fa-edit">Chỉnh sửa Tin tức</i></a>
              
            </div>
            <!-- /.panel-body -->
          
      </div>
      </div>

	</div>
</main>
</div>

@stop