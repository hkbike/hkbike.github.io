@extends('web.master') 
@section('main')    

        <!-- MAIN -->
        <main class="site-main">
           <!--  <div class="modal fade" id="popup-newsletter" tabindex="-1" role="dialog" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span></button>
                        <div class="block-newletter-popup">
                            <div class="block-content">
                                <p class="text-popup-primary">25% <br>Giảm giá</p>
                                <p class="text-des">trong lần mua hàng tiếp theo của bạn</p>
                                <p class="text-italic"> mua tối thiểu 1.000.000Đ</p>
                                <p class="text-your-email">Nhập email của bạn</p>
                                <div class="newsletter-form">
                                    <form id="newsletter-validate-detail" class="form subscribe">
                                        <div class="control">
                                            <input type="email" id="newsletter" placeholder="Nhập địa chỉ email của bạn..." name="email" class="input-subscribe">
                                            <button type="submit" title="Subscribe" class="btn subscribe">
                                                <span>Nhập</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <ul class="checkbox-popup">
                            <li><label class="inline" ><input type="checkbox"><span class="input"></span>Đừng hiển thị cửa sổ bật lên này một lần nữa</label></li>
                        </ul>                   
                    </div>
                </div>
            </div> -->
            
            <!-- ----------------------------------------------------------- -->
            <div class="block-section-1">
                <div class="main-slide slide-opt-1 full-width">
                    <div class="owl-carousel nav-style1" data-nav="true" data-autoplay="false" data-dots="true" data-loop="true" data-margin="0" data-responsive='{"0":{"items":1},"600":{"items":1},"1000":{"items":1}}'>
                        @foreach($banner_slide as $sl)
                        <div class="item-slide item-slide-3" >
                            <img src="{{asset('upload/banner')}}/{{$sl->image}}">
                            <div class="slide-desc slide-desc-3">
                                <div class="p-primary">{{$sl->name}}</div>
                                <p>{{$sl->content}}</p>
                                <a href="#" class="btn-shop-now">Mua ngay</a>                            
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div >
                <div class="container">
                    <div class="row">
                        @foreach($banner as $bn)
                        <div class="col-sm-6 col-xs-6">
                            <div class="promotion-banner style-6" enctype="multipart/form-data" >
                               <img src="{{asset('upload/banner')}}/{{$bn->image}}" alt="banner1">
                            </div>
                        </div>
                         @endforeach
                    </div>
                </div>
            </div>
            <br>

           <!-- product -->
            <div class="block-bestseller-product">
                <div class="container">
                    <div class="title-of-section style2">Sản phẩm bán chạy</div>
                    <div class="tab-product tab-product-fade-effect">
                        <ul class="box-tabs nav-tab style2">
                            <li class="active"><a data-animated="" data-toggle="tab" href="#tab-3">Tất cả sản phẩm</a></li>
                            @foreach($category as $cate)
                                <li><a data-animated="zoomInUp" data-toggle="tab" href="#{{$cate->id}}">{{$cate->name}}</a></li>
                            @endforeach
                           
                        </ul>
                        <div class="tab-content">
                            <div class="tab-container">
            <!-- tất cả sản phẩm -->
                                <div id="tab-3" class="tab-panel active">
                                    <div class="row">
                                        @foreach($product as $pro)
                                            <div class="col-md-4">
                                            
                                                <div class="product-item style2">
                                                    <div class="product-inner equal-elem">
                                                        <div class="product-thumb style1 col-md-12">
                                                            <div class="thumb-inner" style="height: 200px">
                                                                <a href="{{route('singler_pro',['slug'=>$pro->slug,'id'=>$pro->id])}}"><img src="{{url('upload')}}/{{$pro->image}}" width="100%" alt="b1"></a>
                                                            </div>
                                                        </div>
                                                        <div class="product-innfo">
                                                            <div class="product-name"><a href="{{route('singler_pro',['slug'=>$pro->slug,'id'=>$pro->id])}}">{{$pro->name}}</a></div>
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
                                                            <!-- <a href="#" class="wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        @endforeach
                                         <!-- <div class="pagination">
                                        {!!$product->links()!!}
                                        </div> -->
                                    </div>
                                    </div>

                               
                                
            <!-- end tất cả sản phẩm -->

            <!-- tab-4 -->
                               
                                @foreach($category as $cate1)
                                <div id="{{$cate1->id}}" class="tab-panel">
                                <div class="row">
                                    @foreach($cate1->product as $pro1)
                                        <div class="col-md-4">
                                            <div class="product-item style2" >
                                                <div class="product-inner equal-elem">
                                                    <div class="product-thumb style1">
                                                        <div class="thumb-inner">
                                                            <a href="{{route('singler_pro',['slug'=>$pro1->slug,'id'=>$pro1->id])}}"><img src="{{url('upload')}}/{{$pro1->image}}" width="150px" alt="b1"></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-innfo" style="height: 200px">
                                                        <div class="product-name" ><a href="{{route('singler_pro',['slug'=>$pro1->slug,'id'=>$pro1->id])}}">{{$pro1->name}}</a></div>
                                                        <span class="price">
                                                            @if(($pro1->sale_price)>100)
                                                                <ins>{{number_format($pro1->sale_price) }}</ins>
                                                                <del>{{number_format($pro1->price) }}</del>
                                                                @else
                                                                <ins>{{number_format($pro1->price) }}</ins>
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
                                                        <a href="{{route('cart.add',['id'=>$pro1->id])}}" class="btn-add-to-cart">thêm vào giỏ hàng</a>
                                                        <!-- <a href="#" class="wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach 
                                </div>
                                </div>
                                @endforeach
                            </div>
            <!-- end tab-4 -->
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
                             @foreach($blog as $bl)
                            <a href="{{route('blog')}}" class="item-brand" style="height:100px"><img src="{{asset('upload/tin-tuc')}}/{{$bl->image}}" alt="brand1"></a>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </main><!-- end MAIN -->
@stop()
        <!-- FOOTER -->
