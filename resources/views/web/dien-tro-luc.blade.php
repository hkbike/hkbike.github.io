@extends('web.master') 
@section('main')  

        <!-- MAIN --> 

        <main class="site-main product-list">
            <div class="container">
                <div class="container">
                <ol class="breadcrumb-page">
                    <li><a href="{{route('home')}}">Home </a></li>
                    <li class="active"><a href="#">Sản phẩm</a></li>
                </ol>
                </div>
               <br>
                <div class="row">
                    <div class="col-md-9 col-sm-8 float-none float-right padding-left-5">
                        <div class="main-content">
                            <div class="toolbar-products">
                                    <h4 class="title-product">{{$cate2->name}}</h4>
                                    <div class="toolbar-option  ">
                                        <div class="toolbar-sort ">
                                            <form id="form_order" method="get">
                                                <label>Xắp xếp</label>
                                            <select class="form-control orderby" name="orderby" >
                                                <option selected="selected" value="md">Mặc định</option>
                                                <option value="price_max">Giá tăng dần</option>
                                                <option value="price_min">Giá giảm dần</option>
                                                
                                            </select>
                                            </form> 
                                        </div>
                                    </div> 
                            </div>
                            <div class="products products-list">
                               @foreach($proCat as $tp)
                                <div class="product-items">
                                    <div class="product-image">
                                        <a href="{{route('singler_pro',['slug'=>$tp->slug,'id'=>$tp->id])}}"><img src="{{url('/upload')}}/{{$tp->image}}" alt="p1"></a>
                                        <!-- <span class="onsale">-50%</span> -->
                                        <!-- <a href="#" class="quick-view">Xem lướt qua</a> -->
                                    </div>
                                    <div class="product-info">
                                        <div class="product-name"><a href="#">{{$tp->name}}</a></div>
                                        <span class="star-rating">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <span class="review">5 Review(s)</span>
                                        </span>
                                        <!-- <div class="product-infomation">
                                            chi tiet co ban
                                        </div> -->
                                        <a href="{{route('singler_pro',['slug'=>$tp->slug,'id'=>$tp->id])}}" class="btn-xs btn btn-primary">chi tiet</a>
                                    </div>
                                    <div class="product-info-price">
                                        <div class="product-info-stock-sku">
                                            <div class="stock available">
                                                <span class="label-stock">Avability:</span> Trong kho
                                            </div>
                                        </div>
                                        <span class="price">
                                            @if($tp->sale_price > 0 )
                                            <ins>{{number_format($tp->price)}}.VNĐ</ins>
                                            <del>{{number_format($tp->sale_price)}}.VNĐ</del>
                                            @else
                                            <ins>{{number_format($tp->price)}}.VNĐ</ins>
                                            @endif
                                        </span>
                                        <div class="single-add-to-cart">
                                            <a href="{{route('cart.add',['id'=>$tp->id])}}" class="btn-add-to-cart">Thêm vào giỏ hàng</a>
                                            <!-- <a href="#" class="compare"><i class="flaticon-refresh-square-arrows"></i>So sánh</a>
                                            <a href="#" class="wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i>Yêu thích</a> -->
                                        </div>
                                    </div>
                                     
                                </div>
                               @endforeach
                            </div>
                            <div class="pagination">
                                {!!$proCat->links()!!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <div class="col-sidebar">
                            <div class="filter-options">
                                <div class="block-content">
                                    
                                    <div class="filter-options-item filter-price">
                                        <div class="filter-options-title"><b></b></div>
                                        <div class="filter-options-content">
                                            <div class="price_slider_wrapper">
                                               <h5>Bộ lọc giá</h5>
                                               <div style="border: 0.5px solid ; color: #d9d9d9; text-align: center;">
                                                   <ul>
                                                   <li><a href="? price=1">Dưới 1.000.000 VNĐ</a></li>
                                                   <li><a href="? price=2">1.000.000 - 3.000.000 VNĐ</a></li>
                                                   <li><a href="? price=3">3.000.000 - 5.000.000 VNĐ</a></li>
                                                   <li><a href="? price=4">5.000.000 - 7.000.000 VNĐ</a></li>
                                                   <li><a href="? price=5">7.000.000 - 10.000.000 VNĐ</a></li>
                                                   <li><a href="? price=6">Hơn 10.000.000 VNĐ</a></li>
                                               </ul>
                                               </div>
                                               
                                                
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <!-- <div class="block-banner-sidebar">
                                <a href="#"><img src="{{url('/public/frontend')}}/images/product/banner-sidebar.jpg" alt="banner-sidebar"></a>
                            </div> -->
                            <div class="block-latest-roducts">
                                <div class="block-title">Sản phẩm mới nhất</div>
                                <div class="block-latest-roducts-content">
                                    <div class="owl-carousel nav-style2" data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="0" data-responsive='{"0":{"items":1},"600":{"items":1},"1000":{"items":1}}'>
                                      
                                             @foreach($productss as $tt)
                                            <div class="product-item style1">
                                                <div class="product-inner">
                                                    <div class="product-thumb">
                                                        <div class="thumb-inner">
                                                            <a href="{{route('singler_pro',['slug'=>$tt->slug,'id'=>$tt->id])}}"><img src="{{asset('upload')}}/{{$tt->image}}" alt="p1"></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-innfo">
                                                        <div class="product-name"><a href="{{route('singler_pro',['slug'=>$tt->slug,'id'=>$tt->id])}}">{{$tt->name}}</a></div>
                                                        <span class="price">
                                                            @if($tt->sale_price > 0 )
                                                            <ins>{{number_format($tt->price)}}.VNĐ</ins>
                                                            <del>{{number_format($tt->sale_price)}}.VNĐ</del>
                                                            @else
                                                            <ins>{{number_format($tt->price)}}.VNĐ</ins>
                                                            @endif
                                                        </span>
                                                        <!-- <span class="star-rating">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <span class="review">5 Review(s)</span>
                                                        </span> -->
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
            
           
        </main><!-- end MAIN -->
        <!-- FOOTER -->

@stop()

@section('script')
<script>
    $(function() {
        $('.orderby').change(function(){
            $("#form_order").submit();
        } )
    })
</script>
@stop

    
 