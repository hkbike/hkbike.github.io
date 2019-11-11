@extends('master') 
@section('main')
<main class="site-main shopping-cart">
            <div class="container">
                <ol class="breadcrumb-page">
                <h2>ĐƠN HÀNG CỦA BẠN</h2>                    
                </ol>
            </div>
            <div class="container">
                <div class="row">
                   
                    <div class="col-md-12">
                        <div class="alert alert-success">                                                   
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>
                            
                        </strong>
                        </div>
                    </div>
                   
                    <div>
                        <div class="col-md-5">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">THÔNG TIN KHÁCH HÀNG</h3>
                            </div>
                            <div class="panel-body">
                                <form action="{{route('dat-hang')}}" method="POST" role="form">
                                    <input type="hidden" name="_token" value="">
                                    <div class="form-group">
                                        <label for="">Họ tên*</label>
                                        <input type="text" class="form-control" id="" placeholder="Nhập họ và tên" name="name">
                                    
                                        <div class="help-block alert-danger">
                                           
                                        </div>
                                   
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="">Email*</label>
                                        <input type="text" class="form-control" id="" placeholder="Nhập email" name="email">
                                        
                                        <div class="help-block alert-danger">
                                            
                                        </div>
                                       
                                    </div>
                                    <div class="form-group">
                                        <label for="">Địa chỉ*</label>
                                        <input type="text" class="form-control" id="" placeholder="Nhập địa chỉ" name="address">
                                       
                                        <div class="help-block alert-danger">
                                           
                                        </div>
                                       
                                    </div>
                                    <div class="form-group">
                                        <label for="">Số điện thoại*</label>
                                        <input type="text" class="form-control" id="" placeholder="Nhập số điện thoại" name="phone_number">
                                        
                                        <div class="help-block alert-danger">
                                           
                                        </div>
                                       
                                    </div>
                                    <div class="form-group">
                                        <label for="">Ghi chú</label>
                                        <textarea name="note"></textarea>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="">Hình thức thành toán</label>
                                        <div class="form-inline">
                                            <input type="radio" class="form-control" id=""  checked="checked" name="payment_method" value="COD"> <span style="margin-right: 50px;">Thanh toán khi giao hàng</span>
                                            <input type="radio" class="form-control" id="" name="payment_method" value="ATM"> <span>Chuyển khoản</span>
                                        </div>
                                    </div> -->
                                    <button type="submit" class="btn btn-primary">ĐẶT HÀNG</button>
                                </form> 
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">THÔNG TIN SẢN PHẨM</h3>
                            </div>
                            <div class="panel-body">
                        
                        <form class="form-cart" style="border: none;">
                            <div class="table-cart ">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="tb-image">Ảnh</th>
                                            <th class="tb-product">Tên sản phẩm</th>
                                            <th class="tb-qty">Số lượng</th>
                                            <th class="tb-total">Tổng tiền</th>
                                     
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        <tr>
                                            <td class="tb-image"><img src="{{url('/upload')}}/{{$item->attributes->image}}" alt=""></td>
                                            <td class="tb-product">
                                                <div class="product-name"><a href="#"></a></div>
                                            </td>                                      
                                            <td class="tb-total">
                                                <div class="price">
                                                    
                                                </div>
                                            </td>
                                            <td class="tb-total">
                                                <span class="price"></span>
                                            </td>
                                        </tr>
                                       
                                        <tr>
                                        <td colspan="4"><h1>Tổng số tiền:</h1></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                       
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Không có mặt hàng nào</strong> <a href="{{route('home')}}">Mua hàng</a>
                   
                    </div>
                            </div>
                        </div>
                    </div>
                    </div>
            
          
                </div>
            </div>
        </main>
@stop()
