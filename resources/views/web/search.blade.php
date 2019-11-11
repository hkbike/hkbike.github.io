@extends('master') 
@section('main')    

        <!-- MAIN -->
        <main class="site-main">
           
            
           
            <div class="block-bestseller-product">
                <div class="container">
                    <div class="title-of-section style2">Tìm kiếm</div>
                    <p>{{count($pro_timkiem)}} sản phẩm được tìm thấy</p>
                    <div class="tab-product tab-product-fade-effect">
                        
                        <div class="tab-content">
                            <div class="tab-container">
            
                                <div id="tab-3" class="tab-panel active">
                                    <div class="row">
                                        @foreach($pro_timkiem as $pro)
                                            <div class="col-md-4">
                                            
                                                <div class="product-item style2">
                                                    <div class="product-inner equal-elem">
                                                        <div class="product-thumb style1 col-md-12">
                                                            <div class="thumb-inner" style="height: 200px">
                                                                <a href=""><img src="{{url('upload')}}/{{$pro->image}}" width="100%" alt="b1"></a>
                                                            </div>
                                                        </div>
                                                        <div class="product-innfo">
                                                            <div class="product-name"><a href="">{{$pro->name}}</a></div>
                                                            <span class="price">
                                                                @if(($pro->sale_price)>100)
                                                                <ins>{{number_format($pro->sale_price) }}</ins>
                                                                <del>{{number_format($pro->price) }}</del>
                                                                @else
                                                                <ins>{{number_format($pro->price) }}</ins>
                                                                @endif

                                                                <!-- <span class="onsale">-50%</span> -->
                                                            </span>
                                                            <span class="star-rating">
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <span class="review">5 Review(s)</span>
                                                            </span>
                                                            <a href="{{route('cart.add',['id'=>$pro->id])}}" class="btn-add-to-cart">thêm vào giỏ hàng</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                            </div>
                                        @endforeach
                                    </div>
                                    </div>
                                
           
                               
                            </div>
            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <!-- end product -->

            <div class="block-section-brand">
                <div class="container">
                    <div class="title-of-section style2">tin tức</div>
                    <div class="section-brand style1">
                        <div class="owl-carousel nav-style3" data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="2" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":4},"1000":{"items":6}}'>
                            <a href="#" class="item-brand"><img src="{{url('/public/frontend')}}/images/home4/tin tuc 01.JPG" alt="brand1"></a>
                            <a href="#" class="item-brand"><img src="{{url('/public/frontend')}}/images/home4/tin tuc 2.jpg" alt="brand1"></a>
                            <a href="#" class="item-brand"><img src="{{url('/public/frontend')}}/images/home4/tin tuc 3.jpg" alt="brand1"></a>
                            <a href="#" class="item-brand"><img src="{{url('/public/frontend')}}/images/home4/tin tuc.jpg" alt="brand1"></a>
                            <a href="#" class="item-brand"><img src="{{url('/public/frontend')}}/images/home4/tin tuc 6.jpg" alt="brand1"></a>
                            <a href="#" class="item-brand"><img src="{{url('/public/frontend')}}/images/home4/tin tuc 7.jpg" alt="brand1"></a>
                            <a href="#" class="item-brand"><img src="{{url('/public/frontend')}}/images/home4/tin tuc 8.jpg" alt="brand1"></a>
                        </div>
                    </div>
                </div>
            </div>
        </main><!-- end MAIN -->
@stop()
        <!-- FOOTER -->
