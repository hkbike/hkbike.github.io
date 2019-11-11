@extends('web.master') 
@section('main') 
<!-- end HEADER -->        
        <!-- MAIN -->
        <main class="site-main blog-single">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-8 float-none float-right">
                        <h3>Tin tức</h3>
                        <br>
                        <div class="main-content">
                            @foreach($blog as $bl)
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="{{asset('upload/tin-tuc')}}/{{$bl->image}}" alt="Image" width="200px">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{$bl->name}}</h4>
                                    <p>{{$bl->content}}</p>
                                </div>
                            </div>
                             @endforeach
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </main><!-- end MAIN -->
        <!-- FOOTER -->
        @stop()