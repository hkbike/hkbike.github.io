<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Startmin - Bootstrap Admin Theme</title>
        
         <link href="{{asset('public/resource/css/1.css')}}" type="text/css" rel="stylesheet">
        <!-- Bootstrap Core CSS -->
        <link href="{{asset('public/resource/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{asset('public/resource/css/metisMenu.min.css')}}" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="{{asset('public/resource/css/timeline.css')}}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{asset('public/resource/css/startmin.css')}}" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="{{asset('public/resource/css/morris.css')}}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{asset('public/resource/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
       

        
         <!-- <link rel="stylesheet" type="text/css" href="{{url('public/resource/css/style-2.css')}}"> -->
         <!-- <link rel="stylesheet" type="text/css" href="{{url('public/html/css/bootstrap-2.min.css')}}"> -->
         
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="{{asset('public/resource/fancybox/jquery.fancybox-1.3.4.css')}}" media="screen" />
        <!-- <link rel="stylesheet" href="{{asset('public/resource/css/style.css')}}" /> -->
    </head>
    <body>

        <div id="wrapper">
    <!-- menu -->
            <!-- Navigation -->
    
            <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #093b56;" role="navigation">
                <div class="navbar-header mauchu">
                    <a class="navbar-brand" href="{{route('trang-chu-admin')}}">XE DAP Admin</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links mauchu">
                    <li><a href="{{asset('')}}"><i class="fa fa-home fa-fw"></i> Website</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">

                    
                    <li class="dropdown mauchu">
                         @if(Auth::check())
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i><?php echo Auth::user()->name ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user mauchu1">
                            <li><a ><i class="fa fa-user fa-fw"></i>{{Auth::user()->name}}</a>
                            </li>
                            <li><a href="account/edit-ac/{{Auth::user()->id}}"><i class="fa fa-gear fa-fw"></i> Cài đặt</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="{{route('logout')}}"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                            </li>
                           
                        </ul>

                          @endif
                    </li>
                </ul>
                <!-- /.navbar-top-links -->
     <!-- hết menu -->
  </nav>
    <!-- menu trái -->
                <div class="navbar-default sidebar" style="margin-top: 60px;" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav"  id="side-menu">
                            <li class="menu-title" >
                                <h5>Bảng Điều Khiển</h5>
                            </li>
                            
                             <li class="motkhoi ">
                                <h5 href="#" class="click"><i class="fa fa-dashboard fa-fw"></i>  Danh mục thể loại</h5>
                                <ul class="ndmotkhoi nav nav-second-level">
                                    <li>
                                        <a href="{{asset('admin/category')}}">Thêm thể loại</a>
                                    </li>
                                    
                                    
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                             <li class="motkhoi">
                                <h5 href="#" class="click"><i class="fa fa-user-circle"></i> Quản lý tài khoản</h5>
                                 <ul class="ndmotkhoi nav nav-second-level">
                                    <li>
                                        <a href="{{route('account')}}">Tất cả tài khoản</a>
                                    </li>
                                    
                                </ul>
                            </li>
                             <li class="menu-title">
                                <h5>Sản phẩm</h5>
                            </li>
                            <li class="motkhoi">
                                <h5 href="#" class="click"><i class="fa fa-th-list"></i>  Sản phẩm</h5>
                                <ul class="ndmotkhoi nav nav-second-level">
                                     <li>
                                        <a href="{{asset('admin/product')}}">Tất cả sản phẩm</a>
                                    </li>
                                    <li>
                                        <a href="{{asset('admin/product/add-product')}}">Thêm sản phẩm</a>
                                    </li>
                                   
                                    <li>
                                        <a href="{{asset('admin/product/image-pd')}}">Thêm Ảnh sản phẩm</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                             <li class="motkhoi">
                                <h5 href="#" class="click"><i class="fa fa-table fa-fw"></i>  Chi tiết của sản phẩm</h5>
                                <ul class="ndmotkhoi nav nav-second-level">
                                    <li>
                                        <a href="{{asset('admin/product/detail')}}">Xuất xứ của sản phẩm </a>
                                    </li>
                                    <li>
                                        <a href="{{asset('admin/product/tenchnical')}}">Tất cả thông số kỹ thuật</a>
                                    </li>
                                    <!-- <li>
                                        <a href="{{asset('admin/product/tenchnical/add-ten')}}">Thêm thông số kỹ thuật</a>
                                    </li> -->
                                   
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                           
                            <li class="motkhoi">
                                <h5 href="" class="click"><i class="fa fa-image"></i> Banner Website</h5>
                                 <ul class="ndmotkhoi nav nav-second-level">
                                    <li>
                                        <a href="{{asset('admin/banner')}}">Tất cả banner</a>
                                    </li>
                                </ul>
                            </li>
                           
                            <li class="menu-title">
                                <h5>Bài viết</h5>
                            </li>
                            <li class="motkhoi">
                                <h5 href="#" class="click"><i class="fa fa-edit fa-fw"></i> Quản lý tin tức</h5>
                                <ul class="ndmotkhoi nav nav-second-level">
                                    <li>
                                        <a href="{{asset('admin/blog/add-blog')}}">Thêm tin tức</a>
                                    </li>
                                    <li>
                                        <a href="{{asset('admin/blog')}}">Tất cả tin tức</a>
                                    </li>
                                    <li>
                                        <a href="{{asset('admin/blog/blog-img')}}">Thêm ảnh cho tin tức</a>
                                        <!-- /.nav-third-level -->
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li class="menu-title">
                                <h5>Đơn hàng</h5>
                            </li>
                            <li class="motkhoi">
                                <h5 href="#" class="click"><i class="fa fa-edit fa-fw"></i> Quản lý đơn hàng</h5>
                                <ul class="ndmotkhoi nav nav-second-level">
                                    <li>
                                        <a href="{{route('don-hang')}}">Tất cả đơn hàng</a>
                                    </li>
                                    
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            
                        </ul>
                    </div>
                </div>
    <!-- hết menu trái -->
          

    <!-- main -->
            <div id="page-wrapper" >
                <div class="container-fluid">
                    @yield('main')
                    
     <!-- end main -->
 
                    <!-- /.row -->
                    
                    <!-- /.row -->

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
            <!-- @include('backend.footer') -->
            
        </div>
        <!-- /#wrapper -->
        
        <!-- jQuery -->
        <script src="{{asset('public/resource/js/jquery.min.js')}}"></script>
        <!-- <script src="{{asset('public/resource/js/jquery-1.min.js')}}"></script> -->

        <!-- Bootstrap Core JavaScript -->
        <script src="{{asset('public/resource/js/bootstrap.min.js')}}"></script>


        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
        <script type="text/javascript" src="{{asset('public/resource/fancybox/jquery.mousewheel-3.0.4.pack.js')}}"></script>
        <script type="text/javascript" src="{{asset('public/resource/fancybox/jquery.fancybox-1.3.4.pack.js')}}"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <!-- <script src="{{asset('public/resource/js/metisMenu.min.js')}}"></script> -->

        <!-- Morris Charts JavaScript -->
        <!-- <script src="{{asset('public/resource/js/raphael.min.js')}}"></script>
        <script src="{{asset('public/resource/js/morris.min.js')}}"></script> -->
       <!--  <script src="{{asset('public/resource/js/morris-data.js')}}"></script> -->

        <!-- Custom Theme JavaScript -->
     <!--    <script src="{{asset('public/resource/js/startmin.js')}}"></script> -->
        <script>
            $(function(){
                $('.ndmotkhoi').slideUp();
               $('.motkhoi h5').click(function(event){
                    $(this).next().slideToggle();
                    $(this).toggleClass('up');
                    
               });
             
            });
        </script>
         <script >
          $(function(){
           
           $("a#anh-sp ").fancybox({
                'overlayShow'   : false,
                'transitionIn'  : 'elastic',
                'transitionOut' : 'elastic'
            });
           $("a#anh-sp1 ").fancybox({
                'overlayShow'   : false,
                'transitionIn'  : 'elastic',
                'transitionOut' : 'elastic'
            });

          });

        </script>
                <script>
            $(document).ready(function(){
                $("#checkpas").change(function(){
                    if($(this).is(":checked"))
                    {
                          $(".pas").removeAttr('disabled');
                    }
                    else
                    {
                           $(".pas").attr('disabled','true');
                    }
                    
                });
            });
        </script>
        <script  src="{{asset('public/resource/ckeditor/ckeditor/ckeditor.js')}}" type="text/javascript" ></script>

    </body>
</html>
