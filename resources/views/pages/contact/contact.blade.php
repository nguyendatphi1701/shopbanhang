<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Liên hệ</title>
    <link href="{{('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{('public/frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{('public/frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{('public/frontend/css/responsive.css')}}" rel="stylesheet">
     <link href="{{('public/frontend/css/sweetalert.css')}}" rel="stylesheet">
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
                                <li><a href="{{URL::to('/gio-hang')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
        <div class="header-bottom fixNav"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-7" style="top: -15px">
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
                    <div class="col-sm-5" style="margin: -24px">
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
	 <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                        @php
                            $i = 0;
                        @endphp
                        @foreach($slider as $key => $slide)
                            @php
                                $i++;
                            @endphp
                            <div class="item {{$i==1 ? 'active' : '' }}">
                                <div class="col-sm-11">
                                    <img alt="{{$slide->slider_desc}}" src="{{asset('public/uploads/slider/'.$slide->slider_image)}}" height="200" width="100%" class="img img-responsive">
                                </div>
                            </div>
                        @endforeach
                        </div>
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/slider-->
	 <div id="contact-page" class="container">
    	<div class="bg">
	    		
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Liên lạc</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
				            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control" required="required" placeholder="Tên">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="subject" class="form-control" required="required" placeholder="Vấn đề...">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Nội dung..."></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Info</h2>
	    				<address>
	    					<p>ĐP-Mobile</p>
							<p>Mobile: +84 705599174</p>
							<p>Fb: Đạt Phii</p>
							<p>Email: nguyendatphi1701@gmail.com</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
	
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
	
   <script src="{{('public/frontend/js/jquery.js')}}"></script>
    <script src="{{('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{('public/frontend/js/price-range.js')}}"></script>
    <script src="{{('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{('public/frontend/js/main.js')}}"></script>
    <script src="{{('public/frontend/js/sweetalert.min.js')}}"></script>

    
</body>
</html>