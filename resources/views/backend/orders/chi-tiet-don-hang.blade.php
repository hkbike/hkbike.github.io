@extends('backend.master')
     

@section('main')
<div class="col-md-12 tieu-de-ad">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">
          <i class="fa fa-home"></i><a href="{{route('trang-chu-admin')}}">Home</a>
          <i class="fa fa-angle-right"></i><a href="{{route('don-hang')}}">Quản lý đơn hàng</a>
          <i class="fa fa-angle-right"></i><a><i>Chi tiết đơn hàng</i>: {{$orders->email}} </a>
          
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
                <i class="fa fa-bar-chart-o fa-fw"></i> Thông tin về khách hàng
               
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <!-- <div id="morris-area-chart"></div> -->
              <ul class="ttsp" style="padding: 0px">
                <li>
                  <span class="label-col-sp">ID:</span>
                  <span class="content-col-sp">{{$orders->id}}</span>
                </li>
                <li>
                  <span class="label-col-sp">Tên khách hàng:</span>
                  <span class="content-col-sp">{{$orders->name}}</span>
                </li>
                <li>
                  <span class="label-col-sp">Email khách hàng:</span>
                  <span class="content-col-sp">{{$orders->email}}</span>
                </li>
                 <li>
                  <span class="label-col-sp">Địa chỉ khách hàng:</span>
                  <span class="content-col-sp">{{$orders->address}}</span>
                </li>
                 <li>
                  <span class="label-col-sp">Số điện thoại liên hệ:</span>
                  <span class="content-col-sp">{{$orders->phone}}</span>
                </li>

              </ul>
         
              
            </div>
            <!-- /.panel-body -->
       
<!-- end sản phẩm -->
          
      </div>
      </div>
      <!-- avatar sản phẩm -->
      
    <div class="col-md-12" >
        <div class="panel panel-primary" style="margin: 1px;">
            <div class="panel-heading">
                <i class="fa fa-image"></i> Cập nhật trạng thái đơn hàng
               
            </div>
            <div class="panel-body" style="">
              <div class="col-md-6">
                 <form action="" method="post" role="form">
                @csrf
                <div class="form-group">
                  <label for="">Cập nhật trạng thái</label>
                  @if(($orders->status)==2)
                  <select name="status" id="inputStatus" class="form-control" required="required">
                    <!-- <option value="1" {{(($orders->status)==1)?'selected':''}}>Đang giao hàng</option>
                    <option value="0" {{(($orders->status)==0)?'selected':''}}>Chưa giao hàng</option> -->
                    
                    <option value="2" {{(($orders->status)==2)?'selected':''}}>Đơn hàng hoàn thành</option>
                    <!-- <option value="3" {{(($orders->status)==3)?'selected':''}}>Đơn hàng bị hủy</option> -->
                  </select>
                  @elseif(($orders->status)==3)
                   <select name="status" id="inputStatus" class="form-control" required="required">
                    <!-- <option value="1" {{(($orders->status)==1)?'selected':''}}>Đang giao hàng</option>
                    <option value="0" {{(($orders->status)==0)?'selected':''}}>Chưa giao hàng</option> -->
                    
                    <!-- <option value="2" {{(($orders->status)==2)?'selected':''}}>Đơn hàng hoàn thành</option> -->
                    <option value="3" {{(($orders->status)==3)?'selected':''}}>Đơn hàng bị hủy</option>
                  </select>
                  @else
                  <select name="status" id="inputStatus" class="form-control" required="required">
                    <option value="1" {{(($orders->status)==1)?'selected':''}}>Đang giao hàng</option>
                    <option value="0" {{(($orders->status)==0)?'selected':''}}>Đang Xử Lý</option>
                    
                    <option value="2" {{(($orders->status)==2)?'selected':''}}>Đơn hàng hoàn thành</option>
                    <option value="3" {{(($orders->status)==3)?'selected':''}}>Đơn hàng bị hủy</option>
                  </select>
                  @endif
                 
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật trạng thái</button>
              </form>
              </div>
             
           </div>
        </div>
      </div>

   




</main>

<!-- trạng thái đơn hàng -->
 <div class="col-md-7 thong-tin-sp" >
        <div class="panel panel-default">
            <div class="panel-heading">
                 <i class="fa fa-image"></i>  Thông tin về đơn hàng 
            </div>
            <div class="panel-body" >
              <ul class="ttsp" style="padding: 0px">
                <li>
                  <span class="label-col-sp">Trạng thái hiện tại:</span>
                  @if($orders->status==0)
                  <span class="content-col-sp"><a class="btn btn-danger">Chưa giao hàng</a></span>
                  @elseif($orders->status==1)
                  <span class="content-col-sp"><a class="btn btn-info">Đang giao hàng</a></span>
                  @elseif($orders->status==2)
                  <span class="content-col-sp"><a class="btn btn-success">Đơn hàng hoàn thành</a></span>
                  @else
                  <span class="content-col-sp"><a class="btn btn-danger">Đơn hàng bị hủy</a></span>
                  @endif
                  <!-- <span class="content-col-sp">{{$orders->phone}}</span> -->
                </li>
                <li>
                  <span class="label-col-sp">Ngày tạo đơn hàng:</span>
                  <span class="content-col-sp">{{$orders->created_at}}</span>
                </li>
                <li>
                  <span class="label-col-sp">Tổng tiền:</span>
                  <span class="content-col-sp">{{number_format($orders->total_price)}} VNĐ</span>
                </li>
                @if(($orders->created_at)==($orders->updated_at))
                @else
                <li>
                  <span class="label-col-sp">Cập nhật đơn hàng:</span>
                  <span class="content-col-sp">{{$orders->created_at}}</span>
                </li>
                @endif
             </ul>
           </div>
              </div>
            </div>
    
     
     

<!-- end trang thái đơn hàng     -->

<div class="col-md-7 thong-tin-sp" style="padding-top: 15px; padding-bottom: 15px;">
      <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Xuất xứ sản phẩm
               
            </div>
            <div class="panel-body" >
             <div class="table-responsive " >
        
        <table class="table table-hover table-striped ">
          <thead>
            <tr>
              <th>STT</th>
              <th>Sản phẩm</th>
              <!-- <th>Tên</th> -->
              <th>Ảnh sản phẩm</th>
              <th>Số lượng</th>
              
              <th>Giá bán</th>
              
              
            </tr>
          </thead>
          <tbody>
            @foreach($chitiet as $row)
            <tr class="show_1">
              <td>{{$loop->index+1}}</td>
              <td>{{$row->product->name}}</td>
              <td><img src="{{asset('upload')}}/{{$row->product->image}}" width="100px" alt=""></td>
              <td>{{$row->quantity}} Chiếc</td>
              <td>{{number_format($row->price)}} VNĐ</td>
          
            </tr>
            @endforeach
          </tbody>
        </table>
        
           </div>
      </div>
    </div>

@stop
