@extends('backend.master')
     

@section('main')
<div class="col-md-12 tieu-de-ad">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">
          <i class="fa fa-home"></i><a href="{{route('trang-chu-admin')}}">Home</a>
          <i class="fa fa-angle-right"></i><a href="{{route('backend-product')}}">Quản lý Sản phẩm</a>
          <i class="fa fa-angle-right"></i><a><i>Chi tiết sản phẩm</i>:  {{$chiTiet->name}}</a>
          
        </h3>
      </div> 
    </div>
  </div>
</div>

<!-- sản phẩm -->
<div class="row">
<main class="col-md-5">

  <div class="row">
      <div class="col-md-12 thong-tin-sp" >
        
          <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Thông tin về sản phẩm: {{$chiTiet->name}}
               
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <!-- <div id="morris-area-chart"></div> -->
              <ul class="ttsp" style="padding: 0px">
                <li>
                  <span class="label-col-sp">Tên sản phẩm:</span>
                  <span class="content-col-sp">{{$chiTiet->name}}</span>
                </li>
                 <li>
                  <span class="label-col-sp">Slug sản phẩm:</span>
                  <span class="content-col-sp">{{$chiTiet->slug}}</span>
                </li>
                 <li>
                  <span class="label-col-sp">Giá sản phẩm:</span>
                  <span class="content-col-sp">{{number_format($chiTiet->price)}} VNĐ</span>
                </li>
                 <li>
                  <span class="label-col-sp">Giá khuyến mãi:</span>
                  @if(($chiTiet->sale_price)>0)
                  <span class="content-col-sp">{{number_format($chiTiet->sale_price)}} VNĐ</span>
                  @else
                  <span class="content-col-sp">không có </span>
                  @endif
                </li>
                 <li>
                  <span class="label-col-sp">Loại sản phẩm sản phẩm:</span>
                  <span class="content-col-sp">{{$chiTiet->category->name}}</span>
                </li>
                 <li>
                  <span class="label-col-sp">Trạng thái sản phẩm:</span>
                  @if(($chiTiet->status)==0)
                  <span class="content-col-sp">Ẩn</span>
                  @elseif(($chiTiet->status)==1)
                  <span class="content-col-sp">Hiện</span>
                  @endif
                </li>
                 <li>
                  <span class="label-col-sp">Tình trạng sản phẩm:</span>
                  @if(($chiTiet->type)==0)
                    <span class="content-col-sp">Sản phẩm thường</span>
                  @elseif(($chiTiet->type)==1)
                    <span class="content-col-sp">Sản phẩm bán chạy</span>
                  @elseif(($chiTiet->type)==2)
                    <span class="content-col-sp">Sản phẩm mới</span>
                  @endif
                </li>
                <li>
                  <span class="label-col-sp">Ngày tạo:</span>
                  <span class="content-col-sp">{{$chiTiet->created_at}}</span>
                </li>

              </ul>
          <a href="{{asset('admin/product/edit-pd')}}/{{$chiTiet->id}}" class="btn btn-success"><i class="fa fa-edit">  Chỉnh sửa sản phẩm</i></a>
              
            </div>
            <!-- /.panel-body -->
       
<!-- end sản phẩm -->
          
      </div>
      </div>
      <!-- avatar sản phẩm -->
      
    <div class="col-md-12 thong-tin-sp" style="padding-top: 15px; padding-bottom: 15px;">
      <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Xuất xứ sản phẩm: {{$chiTiet->name}}
               
            </div>
            <div class="panel-body" >
             <ul class="ttsp" style="padding: 0px">
              @foreach($detail as $dt)
                <li>
                  <span class="label-col-sp">Xuất xứ:</span>
                  <span class="content-col-sp">{{$dt->xuat_xu}}</span>
                </li>
                 <li>
                  <span class="label-col-sp">Hãng sản xuất:</span>
                  <span class="content-col-sp">{{$dt->hang_san_xuat}}</span>
                </li>
                 <li>
                  <span class="label-col-sp">Cỡ bánh:</span>
                  @if(($dt->co_banh)=='')
                  <span class="content-col-sp">Không có</span>
                  @else
                  <span class="content-col-sp">{{$dt->co_banh}} inch</span>
                  @endif
                </li>
                 <li>
                  <span class="label-col-sp">Trọng lượng:</span>
                  @if(($dt->trong_luong)=='')
                    <span class="content-col-sp">không có</span>
                  @else
                    <span class="content-col-sp">{{$dt->trong_luong}} kg</span>
                  @endif
                </li>
                <a href="{{asset('admin/product/detail/edit')}}/{{$dt->id}}" class="btn btn-info"><i class="fa fa-edit">  Chỉnh sửa xuất xứ</i></a>

                @endforeach
              </ul>
           </div>
      </div>
    </div>

    <div class="col-md-12 thong-tin-sp" style="padding-top: 15px; padding-bottom: 15px;">
      <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Thông số kỹ thuật: {{$chiTiet->name}}
               
            </div>
            <div class="panel-body" >
             <ul class="ttsp" style="padding: 0px">
              @foreach($tenchnical as $ten)
                <li>
                  <span class="label-col-sp">Yên xe:</span>
                  @if(($ten->yen)=='')
                  <span class="content-col-sp">Chưa có...</span>
                  @else
                  <span class="content-col-sp">{{$ten->yen}}</span>
                  @endif
                </li>
                 <li>
                  <span class="label-col-sp">Cỡ khung xe:</span>
                  @if(($ten->co_khung)=='')
                  <span class="content-col-sp">Chưa có...</span>
                  @else
                  <span class="content-col-sp">{{$ten->co_khung}}</span>
                  @endif
                </li>
                <li>
                  <span class="label-col-sp">Khung sườn xe:</span>
                  @if(($ten->khung_suon)=='')
                  <span class="content-col-sp">Chưa có...</span>
                  @else
                  <span class="content-col-sp">{{$ten->khung_suon}}</span>
                  @endif
                </li>
                <li>
                  <span class="label-col-sp">Tay lái xe:</span>
                  @if(($ten->tay_lai)=='')
                    <span class="content-col-sp">Chưa có...</span>
                  @else
                    <span class="content-col-sp">{{$ten->tay_lai}}</span>
                  @endif
                </li>
                <li>
                  <span class="label-col-sp">Phuộc xe:</span>
                  @if(($ten->phuoc)=='')
                    <span class="content-col-sp">Chưa có...</span>
                  @else
                    <span class="content-col-sp">{{$ten->phuoc}}</span>
                  @endif
                </li>
                 <li>
                  <span class="label-col-sp">Tay phanh xe:</span>
                  @if(($ten->tay_phanh)=='')
                    <span class="content-col-sp">Chưa có...</span>
                  @else
                    <span class="content-col-sp">{{$ten->tay_phanh}}</span>
                  @endif
                </li>
                  <li>
                  <span class="label-col-sp">Phanh xe:</span>
                  @if(($ten->phanh)=='')
                    <span class="content-col-sp">Chưa có...</span>
                  @else
                    <span class="content-col-sp">{{$ten->phanh}}</span>
                  @endif
                </li>
                 <li>
                  <span class="label-col-sp">Đĩa xích xe:</span>
                  @if(($ten->dia_xich)=='')
                    <span class="content-col-sp">Chưa có...</span>
                  @else
                    <span class="content-col-sp">{{$ten->dia_xich}}</span>
                  @endif
                </li>
                 <li>
                  <span class="label-col-sp">Vành xe:</span>
                  @if(($ten->vanh)=='')
                    <span class="content-col-sp">Chưa có...</span>
                  @else
                    <span class="content-col-sp">{{$ten->vanh}}</span>
                  @endif
                </li>
                 <li>
                  <span class="label-col-sp">Lốp xe:</span>
                  @if(($ten->lop)=='')
                    <span class="content-col-sp">Chưa có...</span>
                  @else
                    <span class="content-col-sp">{{$ten->lop}}</span>
                  @endif
                </li>
                  <a href="{{asset('admin/product/tenchnical/edit-ten')}}/{{$ten->id}}" class="btn btn-warning"><i class="fa fa-edit">  Chỉnh Sửa thông số</i></a>

                @endforeach
              </ul>
           </div>
      </div>
    </div>
</div>




</main>

<!-- anh sp -->
<div class="col-md-7" >
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-image"></i>  Avatar sản phẩm: {{$chiTiet->name}}
               
            </div>
            <div class="panel-body" style="padding: 0px;">
              <a id="anh-sp1" href="{{asset('upload')}}/{{$chiTiet->image}}" rel="motnhom">
             <img  src="{{asset('upload')}}/{{$chiTiet->image}}" width="100%" alt=""></a>
           </div>
        </div>
      </div>
      <div class="col-md-7" >
        <div class="panel panel-default">
            <div class="panel-heading">
                 <i class="fa fa-image"></i>  Ảnh sản phẩm: {{$chiTiet->name}}
            </div>
            <div class="panel-body" style="padding-left: 0px;padding-right: 0px">
              
              @foreach($pdimg as $row)
             <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 ">
               <a id="anh-sp" rel="motnhom" href="{{asset('upload/pd')}}/{{$row->link}}" class="thumbnail">
                 <img src="{{asset('upload/pd')}}/{{$row->link}}" width="100%" style="height: 70px" alt="anh-sp">
               </a>
             </div>
             @endforeach
              <div class="col-md-12">
             <a href="{{asset('admin/product/image-pd')}}/{{$chiTiet->id}}" class="btn btn-default"><i class="fa fa-edit">  Chỉnh Sửa Ảnh sản phẩm</i></a>
           </div>
           </div>
          
           
        </div>
      </div>
</div> 
</div> 

<!-- end anh san pham      -->

@stop
