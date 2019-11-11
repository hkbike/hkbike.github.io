@extends('web.master') 
@section('main') 
<!-- end HEADER -->        
        <!-- MAIN -->
        <main class="site-main blog-single">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-8 float-none float-right">
                        <div class="main-content">
                            <div class="post-detail">
                                <div class="post-item">
                                    <div class="post-item-info">
                                        <h2 class="post-name"><a href="#"><b>Liên hệ</b> </a></h2>
                                        <br>
                                        <h5><b>Trụ sở chính:</b></h5>
                                        <h6><b>Địa chỉ:</b> Số 10B Tràng Thi – Hoàn Kiếm – Hà Nội – Việt Nam</h6>
                                        <h6><b>Email:</b> htbike@gmail.com.vn</h6>
                                        <br>
                                        <h5><b>Nhà máy sản xuất:</b></h5>
                                        <h6><b>Địa chỉ:</b> Lô A2CN3, Cụm công nghiệp vừa và nhỏ Từ Liêm, Bắc Từ Liêm, Hà Nội</h6>  
                                    </div>
                                </div>
                                
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <div class="sidebar-left">
                            <!-- --------\searh----- -->
                            <!-- <div class="block-search-blog">
                                <form class="searchform">
                                    <div class="control">
                                        <input type="text" placeholder="Enter Keywords..." name="text" class="input-subscribe">
                                        <button type="submit" class="btn-searchform"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </div>
                                </form>
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
                                                            <a href="#"><img src="{{('upload')}}/{{$tt->image}}" alt="p1"></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-innfo">
                                                        <div class="product-name"><a href="#">{{$tt->name}}</a></div>
                                                        <span class="price">
                                                            @if($tt->sale_price > 0 )
                                                            <ins>{{number_format($tt->price)}}.VNĐ</ins>
                                                            <del>{{number_format($tt->sale_price)}}.VNĐ</del>
                                                            @else
                                                            <ins>{{number_format($tt->price)}}.VNĐ</ins>
                                                            @endif
                                                        </span>
                                                        <span class="star-rating">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <span class="review">5 Review(s)</span>
                                                        </span>
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