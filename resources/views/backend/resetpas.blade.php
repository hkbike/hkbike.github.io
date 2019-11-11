<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Startmin - Bootstrap Admin Theme</title>

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
        <link href="{{asset('public/resource/css/1.css')}}" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Lấy lại mật khẩu</h3>
                        </div>
                        <div class="panel-body">
                            @if(count($errors)>0)
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                        {{$err}}<br>
                                    @endforeach
                                </div>
                                @endif
                            @if(session('thong_bao'))
                                <div class="alert alert-success">
                                    {{session('thong_bao')}}
                                </div>
                            @endif
                            <form role="form" action="" method="POST">
                                <fieldset>
                                    @csrf
                                    <!-- <div class="form-group">
                                        <label for="">Email :</label>
                                      
                                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                    </div> -->
                                    <div class="form-group">
                                        <label for="">Mật khẩu :</label>
                                        <input class="form-control" placeholder="Mật khẩu" name="password" type="password" value="">
                                       
                                    </div>
                                     <div class="form-group">
                                        <label for="">Nhập lại mật khẩu :</label>
                                        <input class="form-control" placeholder="Nhập lại mật khẩu" name="passwordVf" type="password" value="">
                                         
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit"  class="btn btn-lg btn-success btn-block">Đăng nhập</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="{{asset('public/resource/js/jquery.min.js')}}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{asset('public/resource/js/bootstrap.min.js')}}"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{asset('public/resource/js/metisMenu.min.js')}}"></script>

        <!-- Custom Theme JavaScript -->
        <script src="{{asset('public/resource/js/startmin.js')}}"></script>

    </body>
</html>
