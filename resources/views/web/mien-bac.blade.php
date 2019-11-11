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
                                        <h2 class="post-name"><a href="#">Đại Lý Miền Bắc</a></h2>
                                        <br>

                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ĐẠI LÝ</th>
                                                        <th>ĐỊA CHỈ</th>
                                                        <th>SỐ ĐIỆN THOẠI</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><a href=""><h5>Trung tâm bán và giới thiệu sản phẩm xe đạp HT BIKE</h5> </a></td>
                                                        <td>Số 198 Tây Sơn, Đống Đa, Hà Nội</td>
                                                        <td>-024362591166 <br> -0915334335</td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href=""><h5>Cửa hàng Xe đạp Song Mã</h5></a></td>
                                                        <td>42 Sài Đồng, Long Biên, Hà Nội</td>
                                                        <td>-0975 790 523</td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href=""><h5>Cửa hàng Xe đạp Đức Hòa</h5></a></td>
                                                        <td>9 Hoàng Văn Thụ, Tp Thái Nguyên, Thái Nguyên</td>
                                                        <td>-0912454504</td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href=""><h5>Cửa hàng Xe đạp Anh Đức</h5></a></td>
                                                        <td>Số 9 Đường 10,TT Gôi,Vụ Bản, Nam Định</td>
                                                        <td>-0945836239</td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href=""><h5>Cửa hàng Xe đạp Quyết Hà</h5></a></td>
                                                        <td>Số nhà 144 - 158 - 164, tổ 4, khu 3B, phường Giếng Đáy, TP Hạ Long, Tỉnh Quảng Ninh</td>
                                                        <td>-0916 855 189</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                                
                            </div>
                           <!--  <div class="post-comments">
                                <div class="block-title">Bình luận</div>
                                <p>Địa chỉ email của bạn sẽ không được công bố. Các trường bắt buộc được đánh dấu *</p>
                                <div class="block-content">
                                    <form>
                                        <div class="form-group col-md-6 padding-left">   
                                            <label class="title">Tên*</label> 
                                            <input type="text" class="form-control" id="forName" >
                                        </div>
                                        <div class="form-group col-md-6 padding-right">
                                            <label class="title">Email*</label>
                                            <input type="email" class="form-control" id="forEmail" >
                                        </div>
                                        <div class="form-group">
                                            <label class="title">Website</label>
                                            <input type="text" class="form-control" id="forWebsite">
                                        </div>
                                        <div class="form-group">
                                            <label class="title">Bình luận</label>
                                            <textarea class="form-control" id="forContent" rows="9" ></textarea>
                                        </div>
                                        <button type="submit" class="btn-comment">Đăng bình luận</button>
                                    </form>
                                </div>
                            </div> -->
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
                                        <div class="owl-ones-row">
                                            
                                            <div class="product-item style1">
                                                <div class="product-inner">
                                                    <div class="product-thumb">
                                                        <div class="thumb-inner">
                                                            <a href="{{route('singler_pro',['slug'=>$tt->slug,'id'=>$tt->id])}}"><img src="{{url('upload')}}/{{$tt->image}}" alt="p1"></a>
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
                                           
                                            
                                        </div>
                                         @endforeach
                                        <!-- <div class="owl-ones-row">
                                            <div class="product-item style1">
                                                <div class="product-inner">
                                                    <div class="product-thumb">
                                                        <div class="thumb-inner">
                                                            <a href="#"><img src="images/blog/p1.jpg" alt="p1"></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-innfo">
                                                        <div class="product-name"><a href="#">Leather Chelsea Boots</a></div>
                                                        <span class="price">
                                                            <ins>$229.00</ins>
                                                            <del>$259.00</del>
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
                                            <div class="product-item style1">
                                                <div class="product-inner">
                                                    <div class="product-thumb">
                                                        <div class="thumb-inner">
                                                            <a href="#"><img src="images/blog/p2.jpg" alt="p2"></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-innfo">
                                                        <div class="product-name"><a href="#">2750 Cotu Classic Sneakers</a></div>
                                                        <span class="price">
                                                            <ins>$229.00</ins>
                                                            <del>$259.00</del>
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
                                            <div class="product-item style1">
                                                <div class="product-inner">
                                                    <div class="product-thumb">
                                                        <div class="thumb-inner">
                                                            <a href="#"><img src="images/blog/p3.jpg" alt="p3"></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-innfo">
                                                        <div class="product-name"><a href="#">Thule Chasm Sport Duffel Bag</a></div>
                                                        <span class="price price-dark">
                                                                <ins>$229.00</ins>
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
                                            <div class="product-item style1">
                                                <div class="product-inner">
                                                    <div class="product-thumb">
                                                        <div class="thumb-inner">
                                                            <a href="#"><img src="images/blog/p4.jpg" alt="p4"></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-innfo">
                                                        <div class="product-name"><a href="#">Pullover Hoodie - Mens</a></div>
                                                        <span class="price">
                                                            <ins>$229.00</ins>
                                                            <del>$259.00</del>
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
                                        </div> -->
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