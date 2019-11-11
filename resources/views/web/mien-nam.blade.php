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
                                        <h2 class="post-name"><a href="#">Đại Lý Miền Nam</a></h2>
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
                                                        <td><a href=""><h5>Cửa hàng Xe đạp Thành Lợi</h5> </a></td>
                                                        <td>36 Hoàng Diệu, Khóm 3, phường 2,TP Cà Mau, Cà Mau</td>
                                                        <td>-02903833934 <br> -0844119929</td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href=""><h5>AEON Hoa Lâm – Bình Tân</h5></a></td>
                                                        <td>Số 1 Đường 17 A, Khu phố 11, Phường Bình Trị Đông B, Quận Bình Tân</td>
                                                        <td>-0964307303</td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href=""><h5>AEON Mall Bình Dương</h5></a></td>
                                                        <td>Số 1 Đại lộ Bình Dương, Khu phố Bình Giao, Thị xã Thuận An, Bình Dương</td>
                                                        <td>-0964307303</td>
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