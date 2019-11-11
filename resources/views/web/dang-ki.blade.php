@extends('web.master') 
@section('main')
<!-- end HEADER -->        
        <!-- MAIN -->
        <main class="site-main">
            <div class="container">
                <br>
                <form action="" class="checkout" method="post" name="checkout">
                    @csrf
                   <h4 class="title-checkout">ĐĂNG KÍ</h4>
                    <div class="row">
                        <div class="form-group col-md-6">   
                            <label class="title">Tên* </label> 
                            <input type="text" class="form-control" id="forFName" placeholder="Tên của bạn" name="name" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="title">Địa chỉ Email:</label>
                            <input type="email" class="form-control" id="forEmail" placeholder="Nhập email của bạn" name="email" >
                        </div>
                        <div class="form-group col-md-6">
                            <label class="title">Số điện thoại*</label>
                            <input type="text" class="form-control" placeholder="Định dạng 10 chữ số" name="phone">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="title">Mật khẩu*</label>
                            <input type="password" class="form-control" placeholder="Nhập mật khẩu" name="password">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="title">Địa chỉ:</label>
                            <input type="text" class="form-control" placeholder="" name="address">
                        </div>
                    </div>
                    <button type="submit" class="btn-order">Đăng kí</button>
                </form>
            </div>


         
            
        </main><!-- end MAIN -->
        <!-- FOOTER -->
@stop()
