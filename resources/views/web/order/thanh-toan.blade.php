@extends('web.master') 
@section('main')
<!-- end HEADER -->        
        <!-- MAIN -->
        <main class="site-main">
            <div class="container">
                <ol class="breadcrumb-page">
                    <li><a href="#">Home </a></li>
                    <li class="active"><a href="#">Giõ hàng</a></li>
                    <li class="active"><a href="#">Thanh toán</a></li>
                </ol>
            </div>
            <br>
            <div class="container wrapper">
            <div class="row cart-head">
                <div class="container">
                <div class="row">
                    <p></p>
                </div>
                <div class="row">
                    <div style="display: table; margin: auto;">
                        <!-- <span class="step step_complete"> <a href="#" class="check-bc">Cart</a> <span class="step_line step_complete"> </span> <span class="step_line backline"> </span> </span>
                        <span class="step step_complete"> <a href="#" class="check-bc">Checkout</a> <span class="step_line "> </span> <span class="step_line step_complete"> </span> </span>
                        <span class="step_thankyou check-bc step_complete">Thank you</span> -->
                    </div>
                </div>
                <div class="row">
                    <p></p>
                </div>
                </div>
            </div>    
            <div class="row cart-body">
                <form class="form-horizontal" method="post" action="">
                     @csrf
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Xem lại đơn hàng<div class="pull-right"><small><a class="afix-1" href="{{route('cart.view')}}">Chỉnh sửa giỏ hàng</a></small></div>
                        </div>

                         <div class="panel-body">
                           @foreach($cart->items as $item)
                            <div class="form-group">
                                <div class="col-sm-3 col-xs-3">
                                    <img class="img-responsive" src="{{url('/upload')}}/{{$item['image']}}" />
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12">{{$item['name']}}</div>
                                    <div class="col-xs-12"><small>Số lượng : <span>{{$item['quantity']}}</span></small></div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                    <h6>{{number_format(($item['price'])*($item['quantity']))}}.VND</h6>
                                </div>
                            </div>
                            @endforeach
                            <div class="form-group"><hr /></div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Tổng tiền</strong>
                                    <div class="pull-right"><span></span><span>{{number_format($cart->total_price)}}.VND</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--REVIEW ORDER END-->
                    <button type="submit" class="btn btn-primary btn-submit-fix" style="float: right;">Thanh Toán</button>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Địa chỉ</div>
                        <div class="panel-body">
                            <div class="form-group">
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-xs-12">
                                    <strong>Tên:</strong>
                                    <input type="text" name="name" class="form-control" value="" />
                                </div>
                                <div class="span1"></div>
                                <div class="col-md-6 col-xs-12">
                                    <strong>Số điện thoai:</strong>
                                    <input type="text" name="phone" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Email:</strong></div>
                                <div class="col-md-12"><input type="email" name="email" class="form-control" value="" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Địa chỉ nhận hàng:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control" value="" />
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                </form>
            </div>
            <div class="row cart-footer">
        
            </div>
    </div>  
        </main><!-- end MAIN -->
        <!-- FOOTER -->
@stop()
