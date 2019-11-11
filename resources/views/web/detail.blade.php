@extends('web.master') 
@section('main')
<!-- end HEADER -->        
        <!-- MAIN -->
        <main class="site-main">
            <br>
            <div class="container">
                <ol class="breadcrumb-page">
                    <li><a href="{{route('home')}}">Home </a></li>
                    <li class="active"><a href="#">Sản phẩm</a></li>
                    <li class="active"><a href="#">Chi tiết sản phẩm</a></li>
                </ol>
                </div>
            <div class="container">
                <div class="product-content-single">
                    <div class="row">
                        <div class="col-md-7 col-sm-12 padding-right">
                            <div class="product-media">
                                <div class="image-preview-container image-thick-box image_preview_container">
                                    <img id="img_zoom" data-zoom-image="" src="{{url('upload')}}/{{$proItem->image}}" alt="">
                                    <a href="#" class="btn-zoom open_qv"><i class="fa fa-search" aria-hidden="true"></i></a>
                                </div>
                                <div class="product-preview image-small product_preview">
                                    <div id="thumbnails" class="thumbnails_carousel owl-carousel nav-style4" data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="10" data-responsive='{"0":{"items":3},"480":{"items":5},"600":{"items":5},"1000":{"items":5}}'>
                                        @foreach($imgPro as $val)
                                        
                                        <a href="#" data-image="{{url('upload/pd')}}/{{$val->link}}" data-zoom-image="{{url('upload/pd')}}/{{$val->link}}">
                                            <img src="{{url('upload/pd')}}/{{$val->link}}" data-large-image="{{url('upload/pd')}}/{{$val->link}}" alt="i1">
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-3">
                            
                            
                            
                        </div>
                        <div class="col-md-3 col-sm-6">
                            
                            <div class="product-info-price">
                                <div class="product-name"><a href="#"><b>{{$proItem->name}}</b></a></div>
                                <div class="product-info-stock-sku">
                                </div>
                                <span class="price">
                                     @if($proItem->sale_price > 0 )
                                    <ins>{{number_format($proItem->price)}}.VNĐ</ins>
                                    <del>{{number_format($proItem->sale_price)}}.VNĐ</del>
                                    @else
                                    <ins>{{number_format($proItem->price)}}.VNĐ</ins>
                                    @endif
                                </span>
                                <!-- <div class="quantity">
                                    <h6 class="quantity-title">Số lượng:</h6>
                                    <div class="buttons-added">
                                        <input type="text" value="1" title="Qty" class="input-text qty text" size="1">
                                        <a href="#" class="sign plus"><i class="fa fa-plus"></i></a>
                                        <a href="#" class="sign minus"><i class="fa fa-minus"></i></a>
                                    </div>
                                </div> -->
                                <div class="single-add-to-cart">
                                    <a href="{{route('cart.add',['id'=>$proItem->id])}}" class="btn-add-to-cart">Thêm vào giõ hàng</a>
                                    <!-- <a href="#" class="compare"><i class="flaticon-refresh-square-arrows"></i>So sánh</a>
                                    <a href="#" class="wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i>Yêu thính</a> -->
                                </div>
                            </div>
                            <div class="transportation">
                                    <span>Giao hàng miễn phí </span> 
                            </div>
                             <div class="group-btn-share">
                                    <a href="https://www.facebook.com/Xe-%C4%90%E1%BA%A1p-HT-BIKE-105326397588809"><img src="{{url('/public/frontend')}}/images/detail/btn1.png" alt="btn1"></a>
                                    <a href="#"><img src="{{url('/public/frontend')}}/images/detail/btn2.png" alt="btn1"></a>
                                    <!-- <a href="#"><img src="{{url('/public/frontend')}}/images/detail/btn3.png" alt="btn1"></a>
                                    <a href="#"><img src="{{url('/public/frontend')}}/images/detail/btn4.png" alt="btn1"></a> -->
                                </div>
                                <!-- <div class="product-description">
                                    {{$proItem->description}}
                                </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="tab-details-product">
                    <ul class="box-tab nav-tab">
                        <li class="active"><a data-toggle="tab" href="#tab-1">Thông số kĩ thuật</a></li>
                        <li><a data-toggle="tab" href="#tab-2">Mô tả</a></li>
                        
                    </ul>
                    <div class="tab-container">
                        <div id="tab-1" class="tab-panel active">
                            <div class="box-content">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Yên</th>
                                                <th>Cỡ khung</th>
                                                <th>Khung sườn</th>
                                                <th>Tay lái</th>
                                                <th>Phuộc</th>
                                                <th>Tay phanh</th>
                                                <th>Phanh</th>
                                                <th>Đĩa xích</th>
                                                <th>Vành</th>
                                                <th>Lốp</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($kiThuat as $kt)
                                            <tr>
                                                <td>{{$kt->yen}}</td>
                                                <td>{{$kt->co_khung}}</td>
                                                <td>{{$kt->khung_suon}}</td> 
                                                <td>{{$kt->tay_lai}}</td>
                                                <td>{{$kt->phuoc}}</td>
                                                <td>{{$kt->tay_phanh}}</td>
                                                <td>{{$kt->phanh}}</td>
                                                <td>{{$kt->dia_xich}}</td>
                                                <td>{{$kt->vanh}}</td>
                                                <td>{{$kt->lop}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        
                        <div id="tab-2" class="tab-panel">
                            <div class="box-content">
                                <div id="tab-1" class="tab-panel active">
                            <div class="box-content">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Xuất xứ</th>
                                                <th>Hãng sản xuất</th>
                                                <th>Cỡ bánh</th>
                                                <th>Trọng lượng</th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($kiThuat as $kt)
                                            <tr>
                                                <td>{{$kt->xuat_xu}}</td>
                                                <td>{{$kt->hang_san_xuat}}</td>
                                                <td>{{$kt->co_banh}}</td>
                                                <td>{{$kt->trong_luong}}</td> 
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                            </div>
                        </div>
                            
                    </div>  
                </div> 
            </div>





            <div class="block-recent-view">
                <div class="container">
                    <div class="title-of-section">Sản phẩm tương tự</div>
                    <div class="owl-carousel nav-style2 border-background equal-container" data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="0" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":3},"1000":{"items":6}}'>
                         @foreach($productss as $tt)
                        <div class="product-item style1">
                           
                            <div class="product-inner equal-elem">
                                <div class="product-thumb">
                                    <div class="thumb-inner" style="height: 150px">
                                        <a href="#"><img src="{{url('upload')}}/{{$tt->image}}" alt="r1"></a>
                                    </div>
                                    <!-- <span class="onsale">-50%</span> -->
                                    <a href="#" class="quick-view">Xem qua</a>
                                </div>
                                <div class="product-innfo">
                                    <div class="product-name"><a href="#">{{$tt->name}}</a></div>
                                    <!-- <span class="price">
                                        <ins>${{$proItem->price}}</ins>
                                        <del>$259.00</del>
                                    </span> -->
                                     <span class="price">
                                            @if($tt->sale_price > 0 )
                                            <ins>{{number_format($tt->price)}}.VNĐ</ins>
                                            <del>{{number_format($tt->sale_price)}}.VNĐ</del>
                                            @else
                                            <ins>{{number_format($tt->price)}}.VNĐ</ins>
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
                                    <div class="group-btn-hover style2">
                                        <a href="{{route('cart.add',['id'=>$proItem->id])}}" class="add-to-cart"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                                        <!-- <a href="#" class="compare"><i class="flaticon-refresh-square-arrows"></i></a> -->
                                        <a href="#" class="wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div> 
                        </div>
                         @endforeach
                    </div>
                </div>
            </div>
            
        </main><!-- end MAIN -->
        <!-- FOOTER -->
@stop()
