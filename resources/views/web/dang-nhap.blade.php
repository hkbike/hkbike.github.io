@extends('web.master') 
@section('main')
<!-- end HEADER -->        
        <!-- MAIN -->
        <main class="site-main">
            <!-- <div class="container">
                <ol class="breadcrumb-page">
                    <li><a href="#">Home </a></li>
                    <li class="active"><a href="#">checkout</a></li>
                </ol>
            </div> -->
            <div class="container">
                <div class=" col-md-6"><h4 class="title-checkout" >Bạn Cần Đăng nhập</h4></div>
                  <br>
                <div class=" col-md-6"><a href="{{route('get_dang_ki')}}" style="float:right;color:#f7452e">Đăng kí</a></div>
             
                <form action="#" class="checkout" method="post" name="checkout">
                    @csrf
                        <div class="form-group col-md-6 ">
                            <label class="title">Tên Email:</label>
                            <input type="email" class="form-control" id="" placeholder="Nhập email của bạn" name="email">
                        </div>
                       
                        <div class="form-group col-md-6">
                            <label class="title">Password:</label>
                            <input type="password" class="form-control" placeholder="" name="password">
                        </div>
                   
                     <button type="submit" class="btn btn-primary">Đăng nhập</button>
                </form>
            </div>

            
            
        </main><!-- end MAIN -->
        <!-- FOOTER -->
@stop()
