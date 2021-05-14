<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---------Seo--------->
    <meta name="description" content="{{$meta_desc}}">
    <meta name="keywords" content="{{$meta_keywords}}"/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <link  rel="canonical" href="{{$url_canonical}}" />
    <meta name="author" content="">
    <link  rel="icon" type="image/x-icon" href="" />
    {{--   <meta property="og:image" content="{{$image_og}}" />
      <meta property="og:site_name" content="http://localhost/shopbanhang/" />
      <meta property="og:description" content="{{$meta_desc}}" />
      <meta property="og:title" content="{{$meta_title}}" />
      <meta property="og:url" content="{{$url_canonical}}" />
      <meta property="og:type" content="website" /> --}}
    <!--//-------Seo--------->
    <title>{{$meta_title}}</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
     <link href="{{asset('public/frontend/css/sweetalert.css')}}" rel="stylesheet">
    
</head><!--/head-->
<body>
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href=""><i class="fa fa-home"></i>5/6, Hà Huy Giáp, Thạnh Lộc, TP HCM</a></li>
                        <li><a href=""><i class="fa fa-phone"></i>0705599174</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{URL::to('/trang-chu')}}"><img src="{{asset('public/frontend/images/logo4.png')}}" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <?php
                                $customer_id = Session::get('customer_id');
                                if ($customer_id != null) {
                                ?>
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <img width="15%" src="{{Session::get('customer_picture')}}"> 
                                    <span>{{Session::get('customer_name')}}</span>
                                    <ul class="dropdown-menu extended logout">
                                        <li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock"></i>Đăng xuất</a></li>
                                    </ul>
                                </li>
                                <?php
                                } else {
                                ?>
                                 <li><a href="{{URL::to('/dang-nhap')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                                <?php
                                }
                                ?>
                                <?php
                                    $customer_id = Session::get('customer_id');
                                    $shipping_id = Session::get('shipping_id');
                                    if ($customer_id != null && $shipping_id == null) {
                                ?>
                                  <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>

                                <?php
                                } elseif ($customer_id != null && $shipping_id != null) {
                                ?>
                                 <li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                 <?php
                                } else {
                                ?>
                                 <li><a href="{{URL::to('/dang-nhap')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                <?php
                                }
                                ?>
                                <li><a href="{{URL::to('/gio-hang')}}"><i class="fa fa-shopping-cart"></i>
                                   Giỏ hàng
                                      <span class="badges">
                                         <span id="show-cart"></span>
                                      </span>
                                </a></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
        <div class="header-bottom fixNav"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-7" style="top: -10px">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{URL::to('/trang-chu')}}" class="active">Trang chủ</a></li>
                                <li class="dropdown"><a href="#">Sản phẩm<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        @foreach($category as $key => $danhmuc)
                                        <li><a href="{{URL::to('/danh-muc/'.$danhmuc->slug_category_product)}}">{{$danhmuc->category_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                </li>
                                <li><a href="{{URL::to('/gio-hang')}}">Giỏ hàng<span class="badges">
                                        <span class="show-cart"></span>
                                    </span></a>
                                    
                                </li>

                                <li><a href="{{URL::to('/lien-he')}}">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-5" style="margin: -20px">
                        <form action="{{URL::to('/tim-kiem')}}" method="POST">
                            {{csrf_field()}}
                        <div class="search_box pull-right">
                            <input type="text" name="keywords_submit" placeholder="Tìm kiếm sản phẩm"/>
                            <input type="submit" style="margin-top:0;color:#666" name="search_items" class="btn btn-primary btn-sm" value="Tìm kiếm">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->
    <section id="cart_items">
		<div class="container">
			<div class="shopper-informations">
				<div class="row">
                    <div class="breadcrumbs">
                        <ol class="breadcrumb">
                          <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                          <li class="active">Thanh toán</li>
                        </ol>
                    </div>
                    <div class="col-sm-12 clearfix">
                          @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @elseif(session()->has('error'))
                                 <div class="alert alert-danger">
                                    {{ session()->get('error') }}
                                </div>
                            @endif
                        <div class="table-responsive cart_info">
                            <form action="{{url('/update-cart')}}" method="POST">
                                @csrf
                            <table class="table table-condensed">
                                <thead>
                                    <tr class="cart_menu">
                                        <td class="image">Hình ảnh</td>
                                        <td class="description">Tên sản phẩm</td>
                                        <td class="price">Giá sản phẩm</td>
                                        <td class="quantity">Số lượng</td>
                                        <td class="total">Thành tiền</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(Session::get('cart')==true)
                                    @php
                                            $total = 0;
                                    @endphp
                                    @foreach(Session::get('cart') as $key => $cart)
                                        @php
                                            $subtotal = $cart['product_price']*$cart['product_qty'];
                                            $total+=$subtotal;
                                        @endphp
                                    <tr>
                                        <td class="cart_product">
                                            <img src="{{asset('public/uploads/product/'.$cart['product_image'])}}" width="90" alt="{{$cart['product_name']}}" />
                                        </td>
                                        <td class="cart_description">
                                            <h4><a href=""></a></h4>
                                            <p>{{$cart['product_name']}}</p>
                                        </td>
                                        <td class="cart_price">
                                            <p>{{number_format($cart['product_price'],0,',','.')}}đ</p>
                                        </td>
                                        <td class="cart_quantity">
                                            <div class="cart_quantity_button">
                                                <input class="cart_quantity" type="number" min="1" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}"  >
                                            </div>
                                        </td>
                                        <td class="cart_total">
                                            <p class="cart_total_price">
                                                {{number_format($subtotal,0,',','.')}}đ
                                            </p>
                                        </td>
                                        <td class="cart_delete">
                                            <a class="cart_quantity_delete" href="{{url('/del-product/'.$cart['session_id'])}}"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td><input type="submit" value="Cập nhật giỏ hàng" name="update_qty" class="check_out btn btn-default btn-sm"></td>
                                        <td><a class="btn btn-default check_out" href="{{url('/del-all-product')}}">Xóa tất cả</a></td>
                                        <td>
                                            @if(Session::get('coupon'))
                                            <a class="btn btn-default check_out" href="{{url('/unset-coupon')}}">Xóa mã khuyến mãi</a>
                                            @endif
                                        </td>
                                        <td colspan="2">
                                        <li>Tổng tiền :<span>{{number_format($total,0,',','.')}}đ</span></li>
                                        @if(Session::get('coupon'))
                                        <li>
                                                @foreach(Session::get('coupon') as $key => $cou)
                                                    @if($cou['coupon_condition']==1)
                                                        Mã giảm : {{$cou['coupon_number']}} %
                                                        <p>
                                                            @php
                                                            $total_coupon = ($total*$cou['coupon_number'])/100;
                                                            @endphp
                                                        </p>
                                                        <p>
                                                        @php
                                                            $total_after_coupon = $total-$total_coupon;
                                                        @endphp
                                                        </p>
                                                    @elseif($cou['coupon_condition']==2)
                                                        Mã giảm : {{number_format($cou['coupon_number'],0,',','.')}} k
                                                        <p>
                                                            @php
                                                            $total_coupon = $total - $cou['coupon_number'];
                                                            @endphp
                                                        </p>
                                                        @php
                                                            $total_after_coupon = $total_coupon;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                        </li>
                                        @endif
                                        @if(Session::get('fee'))
                                        <li>
                                            <a class="cart_quantity_delete" href="{{url('/del-fee')}}"><i class="fa fa-times"></i></a>
                                            Phí vận chuyển <span>{{number_format(Session::get('fee'),0,',','.')}}đ</span></li>
                                            <?php $total_after_fee = $total + Session::get('fee');?>
                                        @endif
                                        <li>Tổng còn:
                                        @php
                                            if(Session::get('fee') && !Session::get('coupon')){
                                                $total_after = $total_after_fee;
                                                echo number_format($total_after,0,',','.').'đ';
                                            }elseif(!Session::get('fee') && Session::get('coupon')){
                                                $total_after = $total_after_coupon;
                                                echo number_format($total_after,0,',','.').'đ';
                                            }elseif(Session::get('fee') && Session::get('coupon')){
                                                $total_after = $total_after_coupon;
                                                $total_after = $total_after + Session::get('fee');
                                                echo number_format($total_after,0,',','.').'đ';
                                            }elseif(!Session::get('fee') && !Session::get('coupon')){
                                                $total_after = $total;
                                                echo number_format($total_after,0,',','.').'đ';
                                            }
                                        @endphp
                                        </li>
                                    </td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td colspan="5"><center>
                                        @php
                                        echo 'Chưa có sản phẩm trong giỏ hàng';
                                        @endphp
                                        </center></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </form>
                                @if(Session::get('cart'))
                                <tr><td>
                                        <form method="POST" action="{{url('/check-coupon')}}">
                                            @csrf
                                                <input type="text" class="form-control" name="coupon" placeholder="Nhập mã giảm giá"><br>
                                                <input type="submit" class="btn btn-default check_coupon" name="check_coupon" value="Tính mã giảm giá">

                                            </form>
                                        </td>
                                </tr>
                                @endif
                            </table>
                        </div>
                    </div>

					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Điền thông tin gửi hàng</p>
							<div class="form-one">
                                <form>
                                    @csrf
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn thành phố</label>
                                      <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
                                            <option value="">--Chọn tỉnh thành phố--</option>
                                        @foreach($city as $key => $ci)
                                            <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn quận huyện</label>
                                      <select name="province" id="province" class="form-control input-sm m-bot15 province choose">
                                            <option value="">--Chọn quận huyện--</option>
                                    </select>
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn xã phường</label>
                                      <select name="wards" id="wards" class="form-control input-sm m-bot15 wards">
                                            <option value="">--Chọn xã phường--</option>
                                    </select>
                                </div>
                                <input type="button" value="Tính phí vận chuyển" name="calculate_order" class="btn btn-primary btn-sm calculate_delivery">
                                </form> 
                               
								<form method="POST">
									@csrf
									<input type="text" name="shipping_email" class="shipping_email" placeholder="Điền email">
									<input type="text" name="shipping_name" class="shipping_name" placeholder="Họ và tên người gửi">
									<input type="text" name="shipping_address" class="shipping_address" placeholder="Địa chỉ gửi hàng">
									<input type="text" name="shipping_phone" class="shipping_phone" placeholder="Số điện thoại">
									<textarea name="shipping_notes" class="shipping_notes" placeholder="Ghi chú đơn hàng của bạn" rows="5"></textarea>
									@if(Session::get('fee'))
										<input type="hidden" name="order_fee" class="order_fee" value="{{Session::get('fee')}}">
									@else
										<input type="hidden" name="order_fee" class="order_fee" value="10000">
									@endif
									@if(Session::get('coupon'))
										@foreach(Session::get('coupon') as $key => $cou)
											<input type="hidden" name="order_coupon" class="order_coupon" value="{{$cou['coupon_code']}}">
										@endforeach
									@else
										<input type="hidden" name="order_coupon" class="order_coupon" value="no">
									@endif
									<div class="">
										 <div class="form-group">
		                                    <label for="exampleInputPassword1">Chọn hình thức thanh toán</label>
		                                      <select name="payment_select"  class="form-control input-sm m-bot15 payment_select">
		                                            <option value="0">Qua chuyển khoản</option>
		                                            <option value="1">Tiền mặt</option>
		                                    </select>
		                                </div>
									</div>
									<input type="button" value="Xác nhận đơn hàng" name="send_order" class="btn btn-primary btn-sm send_order">
								</form>
								
							</div>
						</div>
					</div>
									</div>
			</div>
		</div>
</section> <!--/#cart_items-->
    <footer id="footer"><!--Footer-->
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Hỗ trợ khách hàng</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Thẻ ưu đãi</a></li>
                                <li><a href="#">Trung tâm bảo hành</a></li>
                                <li><a href="#">Thanh toán và giao hàng</a></li>
                                <li><a href="#">Dịch vụ sửa chữa và bảo trì</a></li>
                                <li><a href="#">Doanh nghiệp thân thiết</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="single-widget">
                            <h2>Chính sách mua và bảo hành</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Quy định chung</a></li>
                                <li><a href="#">Chính sách bảo mật thông tin</a></li>
                                <li><a href="#">Chính sách vẩn chuyển và lắp đặt</a></li>
                                <li><a href="#">Chính sách bảo hành</a></li>
                                <li><a href="#">Chính sách đổi trả và hoàn tiền</a></li>
                                <li><a href="#">Chính sách trả góp</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Thông tin</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Giới thiệu PN-Shop</a></li>
                                <li><a href="#">Thông tin liên hệ</a></li>
                                <li><a href="#">Hệ thống Showroom</a></li>
                                <li><a href="#">Hỏi đáp</a></li>
                                <li><a href="#">Tin công nghệ</a></li>
                            </ul>
                        </div>
                    </div>
                     <div class="col-sm-4">
                        <div class="single-widget">
                            <h2>Liên hệ</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#"><i class="fa fa-facebook"></i>PN-Shop</a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i>nguyendatphi1701@gmail.com </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="single-widget">
                            <img src="{{asset('public/frontend/images/da-dang-ky.png')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
                </div>
            </div>
        </div>
    </footer><!--/Footer-->
    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
    <script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <div id="fb-root"></div>
    <script type="text/javascript">
          $(document).ready(function(){
            $('.send_order').click(function(){
                swal({
                  title: "Xác nhận đơn hàng",
                  text: "Đơn hàng sẽ không được hoàn trả khi đặt,bạn có muốn đặt không?",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "Cảm ơn, Mua hàng",
                    cancelButtonText: "Đóng,chưa mua",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm){
                     if (isConfirm) {
                        var shipping_email = $('.shipping_email').val();
                        var shipping_name = $('.shipping_name').val();
                        var shipping_address = $('.shipping_address').val();
                        var shipping_phone = $('.shipping_phone').val();
                        var shipping_notes = $('.shipping_notes').val();
                        var shipping_method = $('.payment_select').val();
                        var order_fee = $('.order_fee').val();
                        var order_coupon = $('.order_coupon').val();
                        var _token = $('input[name="_token"]').val();
                        $.ajax({
                            url: '{{url('/confirm-order')}}',
                            method: 'POST',
                            data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,shipping_phone:shipping_phone,shipping_notes:shipping_notes,_token:_token,order_fee:order_fee,order_coupon:order_coupon,shipping_method:shipping_method},
                            success:function(){
                               swal("Đơn hàng", "Đơn hàng của bạn đã được gửi thành công", "success");
                            }
                        });
                        window.setTimeout(function(){
                            location.reload();
                        } ,3000);
                      } else {
                        swal("Đóng", "Đơn hàng chưa được gửi, làm ơn hoàn tất đơn hàng", "error");
                      }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            //show cart quantity
            show_cart();
            function show_cart(){
               $.ajax({
                 url : '{{url('/show-cart')}}',
                 method: 'GET',
                 success:function(data){
                    $('.show-cart').html(data);
                 }
             });
           }
            $('.add-to-cart').click(function(){
                var id = $(this).data('id_product');
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{url('/add-cart-ajax')}}',
                    method: 'POST',
                    data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},
                    success:function(){
                        swal({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{url('/gio-hang')}}";
                            });
                        show_cart();
                    }

                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            if(action=='city'){
                result = 'province';
            }else{
                result = 'wards';
            }
            $.ajax({
                url : '{{url('/select-delivery-home')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                   $('#'+result).html(data);
                }
            });
        });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.calculate_delivery').click(function(){
                var matp = $('.city').val();
                var maqh = $('.province').val();
                var xaid = $('.wards').val();
                var _token = $('input[name="_token"]').val();
                if(matp == '' && maqh =='' && xaid ==''){
                    alert('Làm ơn chọn để tính phí vận chuyển');
                }else{
                    $.ajax({
                    url : '{{url('/calculate-fee')}}',
                    method: 'POST',
                    data:{matp:matp,maqh:maqh,xaid:xaid,_token:_token},
                    success:function(){
                       location.reload();
                    }
                    });
                }
        });
    });
    </script>
</body>
</html>



