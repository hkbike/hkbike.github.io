@extends('web.master') 
@section('main')    
        <!-- MAIN -->
        <main class="site-main shopping-cart">
            <div class="container">
                <ol class="breadcrumb-page">
                    <li><a href="#">Home </a></li>
                    <li class="active"><a href="#">Shopping Cart</a></li>
                </ol>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                       
                            <div class="table-cart">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="tb-image"></th>
                                            <th class="tb-product">Tên sản phẩm</th>
                                            <th class="tb-price">Đơn giá</th>
                                            <th class="tb-qty">Số lượng</th>
                                            <th class="tb-total">Tổng</th>
                                            <th class="tb-remove"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cart->items as $item)
                                            <form action="{{route('cart.update',['id'=>$item['id']])}}" class=" form.cart" >
                                        <tr>
                                            <td class="tb-image" ><a href="#" class="item-photo"><img src="{{url('/upload')}}/{{$item['image']}}" alt="cart" width="150px"></a></td>
                                            <td class="tb-product">
                                                <div class="product-name"><a href="#">{{$item['name']}}</a></div>
                                            </td>
                                            <td class="tb-price">
                                                <span class="price">{{number_format($item['price'])}}.VND</span>
                                            </td>
                                            <td class="tb-qty">
                                                <div class="quantity">
                                                    <div class="buttons-added">
                                                        <input type="text" value="{{$item['quantity']}}" title="Qty" class="input-text qty text" size="1" name="quantity">
                                                        <a href="#" class="sign plus"><i class="fa fa-plus"></i></a>
                                                        <a href="#" class="sign minus"><i class="fa fa-minus"></i></a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="tb-total">
                                                <span class="price">{{number_format(($item['price'])*($item['quantity']))}}.VND</span>
                                            </td>
                                            <td class="tb-remove">
                                                <button type="submit">
                                                    <span><i class="fa fa-refresh" aria-hidden="true" title="update"></i></span>
                                                </button>
                                                
                                            </td> 
                                            <td class="tb-remove">
                                                <a href="{{route('cart.remove',['id'=>$item['id']])}}" class="action-remove"><span><i class="fa fa-times" aria-hidden="true"></i></span></a>
                                            </td>
                                            
                                        </tr>
                                            </form>  
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="cart-actions">
                               <button class="btn-continue"> 
                                    <a href="{{route('cart.clear')}}" style="color: white">Xóa giỏ hàng</a>
                               </button>
                               <!-- <button class="btn-continue">
                                    <a href="">Cập nhập giỏ hàng</a>
                               </button> -->
                               <button class="btn-continue">
                                    <a href="{{route('home')}}" style="color: white">Tiếp tục mua</a>
                               </button>

                            </div>
                        
                    </div>
                    <div class="col-md-3 padding-left-5">
                        <div class="order-summary">
                            <h4 class="title-shopping-cart">đặt hàng</h4>
                            <div class="checkout-element-content">
                                <!-- <span class="order-left">Số tiền:<span>$458.00</span></span>
                                <span class="order-left">phí chuyển hàng:<span>miễn phí</span></span> -->
                             
                                <span class="order-left">Tổng tiền:<span>{{number_format($cart->total_price)}}.VND</span></span>
                               
                                <ul>
                                    <li><label class="inline" ><input type="checkbox"><span ></span></label></li>
                                </ul>
                                <div class="btn-checkout" >
                                    <a href="{{route('get.form.pay')}}"  style="color: white"><span>Đặt hàng</span></a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="block-recent-view">
                <div class="container">
                    <div class="title-of-section">Sản phẩm tương tự</div>
                    <div class="owl-carousel nav-style2 border-background equal-container" data-nav="true" data-autoplay="false" data-dots="false" data-loop="true" data-margin="0" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":3},"1000":{"items":6}}'>
                        @foreach($productss as $tt)
                        <div class="product-item style1">
                            <div class="product-inner equal-elem">
                                <div class="product-thumb">
                                    <div class="thumb-inner" style="height: 150px">
                                        <a href="{{route('singler_pro',['slug'=>$tt->slug,'id'=>$tt->id])}}"><img src="{{url('upload')}}/{{$tt->image}}" alt="r1"></a>
                                    </div>
                                    <!-- <span class="onsale">-50%</span> -->
                                    <input type="hidden" value="{{$tt->id}}" id="id">
                                    <a href="#" class="quick-view" id="{{$tt->id}}">Xem qua</a>
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
                                    <!-- <span class="star-rating">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <span class="review">5 Review(s)</span>
                                    </span> -->
                                    <div class="group-btn-hover style2">
                                        <a href="{{route('cart.add',['id'=>$tt->id])}}" class="add-to-cart"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                                        <!-- <a href="#" class="compare"><i class="flaticon-refresh-square-arrows"></i></a> -->
                                        <a href="#" class="wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                         @endforeach
                    </div>
                </div>
            </div>
        </main><!-- end MAIN -->
        <!-- FOOTER -->
@stop()
 