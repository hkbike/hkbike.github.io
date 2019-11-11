<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from kute-themes.com/html/krystal/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Oct 2019 13:46:27 GMT -->
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>HT BIKE</title>
    <link rel="stylesheet" type="text/css" href="{{url('/public/frontend')}}/css/animate.css">
    <link rel="stylesheet" type="text/css" href="{{url('/public/frontend')}}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('/public/frontend')}}/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="{{url('/public/frontend')}}/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" type="text/css" href="{{url('/public/frontend')}}/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="{{url('/public/frontend')}}/css/chosen.css">
    <link rel="stylesheet" type="text/css" href="{{url('/public/frontend')}}/css/jquery.bxslider.css">
    <link rel="stylesheet" type="text/css" href="{{url('/public/frontend')}}/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

</head>
<body class="index-opt-1">

    <div class="wrapper">
        <form id="block-search-mobile" method="get" class="block-search-mobile">
            <div class="form-content">
                <div class="control">
                    <a href="#" class="close-block-serach"><span class="icon fa fa-times"></span></a>
                    <input type="text" name="search" placeholder="Search" class="input-subscribe">
                    <button type="submit" class="btn search">
                        <span><i class="fa fa-search" aria-hidden="true"></i></span>
                    </button>
                </div>
            </div>
        </form>
       
        <!-- HEADER -->
        <header class="site-header header-opt-1">

            <!-- header-top -->
            <div class="header-top">
                <div class="container">
                     <!-- heder links -->
                    <ul class="nav-top-right krystal-nav">
                        @if(Auth::check())
                        <a class="wishlist-minicart" href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                       
                        <li><i class="fa fa-user" aria-hidden="true"></i></li>
                        
                        <!-- <li><a href=""><i  aria-hidden="true"></i>Đăng xuất</a></li> -->
                        @else
                        <li><a href="{{route('get_dang_ki')}}"><i class="fa fa-user" aria-hidden="true"></i>Đăng kí</a></li>
                        <li><a href="{{route('get_dang_nhap')}}"><i class="fa fa-user" aria-hidden="true"></i>Đăng Nhập</a></li>
                        @endif
                    </ul><!-- heder links -->
                </div>
            </div> <!-- header-top -->

            <!-- header-content -->
            <div class="header-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 nav-left">
                            <!-- logo -->
                            <strong class="logo">
                                <a href="{{route('home')}}"><img src="{{url('/public/frontend')}}/images/home4/logo.png" alt="logo" width="300px"></a>
                            </strong><!-- logo -->
                        </div>
                        <div class="col-md-8 nav-mind">

                            <!-- block search -->
                            <div class="block-search">
                                
                                   
                                    <div class="form-search box-group">
                                        <form action="{{route('search')}}" method="get">
                                           
                                                <input type="text" class="form-control" placeholder="" name="key">
                                                <button class="btn btn-search" type="submit">Tìm Kiếm</button>
                                        
                                        </form>
                                    </div>
                                
                            </div><!-- block search -->
                        </div>
                        <div class="col-md-2 nav-right">

                            <!-- block mini cart -->

                            <span data-action="toggle-nav" class="menu-on-mobile hidden-md style2">
                                <span class="btn-open-mobile home-page">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>
                                <span class="title-menu-mobile">Main menu</span> 
                            </span>

                            <div class="block-minicart dropdown style2">

                                

                                <a class="minicart" href="#">

                                    <span class="counter qty">

                                        <span class="cart-icon"><i class="fa fa-shopping-bag" aria-hidden="true"></i></span>

                                        <span class="counter-number">{{$cart->total_quantity}}</span>

                                    </span>

                                    <span class="counter-your-cart">

                                        <span class="counter-price">{{number_format($cart->total_price)}}.VND</span>

                                    </span>

                                </a>

                                <div class="parent-megamenu">

                                    <form>

                                        <div class="minicart-content-wrapper" >

                                            <div class="subtitle">

                                                Bạn có <span>{{$cart->total_quantity}}</span> mặt hàng trong giỏ

                                            </div>

                                            <div class="minicart-items-wrapper">
                                                 
                                                <ol class="minicart-items">
                                                     @foreach($cart->items as $item)
                                                    <li class="product-inner">
                                                        
                                                        <div class="product-thumb style1">

                                                            <div class="thumb-inner">

                                                                <a href="{{route('cart.view')}}"><img src="{{url('/upload')}}/{{$item['image']}}" alt="c1" style="height: 50px"></a>

                                                            </div>
                                                        
                                                        </div>

                                                        <div class="product-innfo">

                                                            <div class="product-name"><a href="{{route('cart.view')}}">{{$item['name']}}</a></div>

                                                            <a href="{{route('cart.remove',['id'=>$item['id']])}}" class="remove"><i class="fa fa-times" aria-hidden="true"></i></a>

                                                            <span class="price price-dark">

                                                                <ins>{{number_format($item['price'])}}.VND</ins>

                                                            </span>

                                                        </div>

                                                    </li>
                                                    @endforeach
                                                   

                                                </ol>

                                            </div>

                                           <!--  <div class="subtotal">

                                                <span class="label">Tổng :</span>

                                                <span class="price">480.000Đ</span>

                                            </div> -->

                                            <div class="actions">

                                                <a class="btn btn-viewcart" href="{{route('cart.view')}}">giỏ hàng</a>
                                                <a class="btn btn-checkout" href="{{route('get_dang_nhap')}}">Thanh toán</a>

                                            </div>

                                        </div>

                                    </form>

                                </div>

                            </div><!-- block mini cart -->


                            <a href="#" class="hidden-md search-hidden"><span class="pe-7s-search">df</span></a>

                           
                            
                            

                        </div>
                    </div>
                </div>
            </div><!-- header-content -->
            <!-- header-menu-bar -->
            <div class="header-menu-bar header-sticky">
                <div class="header-menu-nav menu-style-1">
                    <div class="container">
                        <div class="header-menu-nav-inner ">
                            <div class="header-menu header-menu-resize">
                                <ul class="header-nav krystal-nav">
                                    <li class="btn-close hidden-md"><i class="fa fa-times" aria-hidden="true"></i></li>
                                    <li>
                                        <a href="{{route('home')}}" class="dropdown-toggle">Trang chủ</a>
                                        <span class="toggle-submenu hidden-md"></span>
                                    </li>
                                    <li>
                                        <a href="{{route('gioi-thieu')}}" class="dropdown-toggle">Giới thiệu</a>
                                        <span class="toggle-submenu hidden-md"></span>
                                    </li>
                                    <li class="menu-item-has-children arrow item-megamenu item-megamenu-sub"> 
                                        <a href="#" class="dropdown-toggle">Sản Phẩm</a>
                                        <span class="toggle-submenu hidden-md"></span>
                                        <div class="submenu parent-megamenu megamenu">
                                            <div class="row">
                                                <div class="submenu-banner submenu-banner-menu-3">
                                                    <div class="col-md-4">
                                                        <div class="dropdown-menu-info">
                                                            <div class="dropdown-menu-content">
                                                                <ul class="menu">
                                                                    @foreach($category as $cat )
                                                                    <li class="menu-item"><a href="{{route('product_category',['slug'=>$cat->slug,'id'=>$cat->id])}}">{{$cat->name}}</a></li>
                                                                    @endforeach
                                                                    <!-- <li class="menu -item"><a href="{{route('dien-tro-luc')}}">Xe Đạp Điện Trợ Lực</a></li>
                                                                    <li class="menu-item"><a href="{{route('dia-hinh')}}">Xe Đạp Địa Hình</a></li>
                                                                    <li class="menu-item"><a href="{{route('pho-thong')}}">Xe Đạp Phổ Thông</a></li>
                                                                    <li class="menu-item"><a href="{{route('tre-em')}}">Xe Đạp Trẻ Em</a></li>
                                                                    <li class="menu-item"><a href="{{route('nhap-khau')}}">Xe Đạp Nhập Khẩu</a></li> -->
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="menu-item-has-children arrow">
                                        <a href="#" class="dropdown-toggle">Đại lý</a>
                                        <span class="toggle-submenu hidden-md"></span>
                                        <ul class="submenu parent-megamenu">
                                            <li class="menu-item">
                                                <a href="{{route('mien-bac')}}">Miền Bắc</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="{{route('mien-trung')}}">Miền Trung</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="{{route('mien-nam')}}">Miền Nam</a>
                                            </li>
                                           <!--  <li class="menu-item">
                                                <a href="contact-us.html">Hệ Thống Siêu Thị</a>
                                            </li> -->
                                            <!-- <li class="menu-item">
                                                <a href="login.html">Login</a>
                                            </li> -->
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{route('blog')}}" class="dropdown-toggle">Tin tức</a>
                                        <span class="toggle-submenu hidden-md"></span>
                                    </li>
                                    <!-- <li class="menu-item-has-children arrow">
                                        <a href="{{route('blog')}}" class="dropdown-toggle">Tin Tức</a> -->
                                        <!-- <span class="toggle-submenu hidden-md"></span>
                                        <ul class="submenu parent-megamenu">
                                            <li class="menu-item">
                                                <a href="blog-grid.html">Tin Tức Xe Đạp</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="blog-list.html">Tin Tức Công Ty</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="blog-single.html">Tuyển Dụng</a>
                                            </li>
                                        </ul> -->
                                   <!--  </li> -->
                                    <li>
                                        <a href="{{route('lien-he')}}" class="dropdown-toggle">Liên Hệ</a>
                                        <span class="toggle-submenu hidden-md"></span>
                                    </li>
                                    
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </header><!-- end HEADER -->        

        <!-- MAIN -->
        @yield('main')
        
        <!-- end MAIN -->
        
        <!-- FOOTER -->
         <footer class="site-footer footer-opt-2">
                <div class="footer-top full-width">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="newsletter-title">
                                    <h3 class="h3-newsletter">Đăng ký nhận bản tin</h3>
                                    <span class="span-newsletter">Nhận phiếu giảm giá 20% ngay hôm nay</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="newsletter-form">
                                    <form id="newsletter-validate-detail" class="form subscribe">
                                        <div class="control">
                                            <input type="email" placeholder="Nhập email" id="newsletter" name="email" class="input-subscribe">
                                            <button type="submit" title="Subscribe" class="btn subscribe">
                                                <span>Đăng Kí</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-column equal-container">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 equal-elem">
                                <h3 class="title-of-section">liên hệ</h3>
                                <div class="contacts">
                                    
                                    <span class="contacts-info info-address ">Số 10B Tràng Thi – Hoàn Kiếm – Hà Nội</span>
                                    <span class="contacts-info info-phone">(+68) 123 456 7890</span>
                                    <span class="contacts-info info-support">Email: htbike@gmail.com.vn</span>
                                    <div class="socials">
                                        <a href="#" class="social"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href="https://www.facebook.com/Xe-%C4%90%E1%BA%A1p-HT-BIKE-105326397588809" class="social"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        <!-- <a href="#" class="social"><i class="fa fa-pinterest" aria-hidden="true"></i></a> -->
                                        <a href="#" class="social"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                        <a href="#" class="social"><i class="fa fa-vimeo" aria-hidden="true"></i></a>
                                        <a href="#" class="social"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-6 equal-elem">
                               <!--  <div class="links">
                                <h3 class="title-of-section">Tin Tức</h3>
                                <ul>
                                    <li><a href="#">Tin tức công ty</a></li>
                                    <li><a href="#">Tin tuyển dụng</a></li>
                                </ul>
                                </div> -->
                            </div>
                            <div class="col-md-2 col-sm-6 equal-elem">
                                <div class="links">
                                <h3 class="title-of-section">THÔNG TIN</h3>
                                <ul>
                                    <li><a href="{{route('gioi-thieu')}}">Giới thiệu</a></li>
                                    <li><a href="{{route('mien-bac')}}">Đại lí miền bắc</a></li>
                                    <li><a href="{{route('mien-trung')}}">Đại lí miền trung</a></li>
                                    <li><a href="{{route('mien-nam')}}">Đại lí miền nam</a></li>
                                    <!-- <li><a href="#">Chính sách bảo hành</a></li>
                                    <li><a href="#">chính sách thanh toán</a></li>
                                    <li><a href="#">chính sách vận chuyển và giao nhận</a></li>
                                    <li><a href="#">chính sách đổi trả và hoàn tiền</a></li>
                                    <li><a href="#">chính sách bảo mật thông tin</a></li> -->
                                </ul>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 equal-elem">
                                <div class="links links-ins">
                                    <h3 class="title-of-section">Tin Tức</h3>
                                    <div class="content-ins">
                                         @foreach($blog as $bl)
                                        <a href="#"><img src="{{asset('upload/tin-tuc')}}/{{$bl->image}}" alt="ins2" width="100px" height="60px"></a>
                                         @endforeach
                                    </div>
                                    <a href="#" class="view-more">Xem thêm<!-- <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> --></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright full-width">
                     <div class="container">
                         <div class="copyright-right">                
                            © Copyright 2017<span>HT bike</span>. All Rights Reserved.
                        </div>
                        <div class="pay-men">
                            <a href="#"><img src="{{url('/public/frontend')}}/images/home1/pay1.jpg" alt="pay1"></a>
                            <a href="#"><img src="{{url('/public/frontend')}}/images/home1/pay2.jpg" alt="pay2"></a>
                            <a href="#"><img src="{{url('/public/frontend')}}/images/home1/pay3.jpg" alt="pay3"></a>
                            <a href="#"><img src="{{url('/public/frontend')}}/images/home1/pay4.jpg" alt="pay4"></a>
                        </div>
                     </div>
                </div>
        </footer><!-- end FOOTER -->    
        
        <!--back-to-top  -->
        <!-- <a href="#" class="back-to-top">
            <i aria-hidden="true" class="fa fa-angle-up"></i>
        </a> -->
        
    </div>
    <a href="#" id="scrollup" title="Scroll to Top">Scroll</a>
    <!-- jQuery -->    
    <script type="text/javascript" src="{{url('/public/frontend')}}/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="{{url('/public/frontend')}}/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{url('/public/frontend')}}/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="{{url('/public/frontend')}}/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="{{url('/public/frontend')}}/js/wow.min.js"></script> 
    <script type="text/javascript" src="{{url('/public/frontend')}}/js/jquery.actual.min.js"></script>
    <script type="text/javascript" src="{{url('/public/frontend')}}/js/chosen.jquery.min.js"></script>
    <script type="text/javascript" src="{{url('/public/frontend')}}/js/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="{{url('/public/frontend')}}/js/jquery.sticky.js"></script>
    <script type="text/javascript" src="{{url('/public/frontend')}}/js/jquery.elevateZoom.min.js"></script>
    
    <script src="{{url('/public/frontend')}}/js/fancybox/source/jquery.fancybox.pack.js"></script>
    <script src="{{url('/public/frontend')}}/js/fancybox/source/helpers/jquery.fancybox-media.js"></script>
    <script src="{{url('/public/frontend')}}/js/fancybox/source/helpers/jquery.fancybox-thumbs.js"></script>
    <script type="text/javascript" src="{{url('/public/frontend')}}/js/function.min.js"></script>
    <script type="text/javascript" src="{{url('/public/frontend')}}/js/Modernizr.js"></script>
    <script type="text/javascript" src="{{url('/public/frontend')}}/js/jquery.plugin.js"></script>
    <script type="text/javascript" src="{{url('/public/frontend')}}/js/jquery.countdown.js"></script>
    

    <script type="text/javascript">
        function Lecturer(id){
        var Lecturer = "";
        url = "{{route('ajax')}}"; 
        $.ajax({
          type: "POST",
          url: url,
          data: {_token: "{{ csrf_token()}}",id:id},
          success: function(msg) {
            console.log(msg);
              $("#context").html(msg);
            }
          }); 
      }


    </script>
    <script>
        

         $(".quick-view").click(function(id){

       

        // e.preventDefault();

   

        // var id = $("#id").val();
        // alert(this.id);
        var id = this.id;
        var url = "{{url('/')}}/upload/";
        var price = this.price;
        alert(url);
        $.ajax({
           type:'GET',
           url:'{{route("ajaxView")}}',
           data:{id:id},
           success:function(data){

           
             
              $('#name').html(data.name);
              $('#img').attr('src',url+data.image);

           }


        });

  

    });
    </script>

    <script type="text/javascript">
        $('#from').change(function(){
            alert('dasdsa');
        });
    </script>
</body>

<!-- Mirrored from kute-themes.com/html/krystal/html/index4.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Oct 2019 13:44:31 GMT -->
</html>