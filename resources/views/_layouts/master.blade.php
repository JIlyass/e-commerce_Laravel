<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- title -->
	<title>E-commerce</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="/assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="/assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="/assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="/assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="/assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="/assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="/assets/css/responsive.css">

</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	<!-- header -->
	<div class="top-header-area" id="sticker" style="background-color: rgb(5,25,34)">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.html">
								<img src="/assets/img/logo.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="{{url('/')}}">Home</a>
								<li><a href="{{url('/produits')}}">Shop</a></li>
								</li>
								<li><a href="{{url('/about')}}">About</a></li>
								<li><a href="{{url('/contact')}}">Contact</a></li>
								@auth
								
								<li><a href="{{url('cart')}}">cart</a></li>
							@endauth
								
								
									
								
								@auth
								<li>
									<a href="#"><img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle"></a>
									<ul class="sub-menu">
										<li><a >Welcome {{Auth::user()->name}}</a></li>
										{{-- <li><a class="dropdown-item" href="{{route('profile')}}">Profile</a></li> --}}
										<li><a href="{{route('dashboard.index')}}">{{auth::user()->role=="admin"?"Dashboard":"Profile"}}</a></li>
										<li><hr class="dropdown-divider"></li>
										
										<li>
											<form class="dropdown-item" action="{{route('auth.logout')}}" method="POST">
											@csrf
											@method('delete')
											<input type="submit" value="Sign out">
											</form>
										</li>
										
									</ul>
								</li>
									@else
									<li><a href="{{route('auth.login')}}" type="button" class="btn btn-outline-secondary ">Login</a></li>
									<li><a href="{{route('auth.register')}}" type="button" class="btn btn-warning">Sign-up</a></li>
							
								@endauth
							
						
								<li>
									
										<a class="shopping-cart" href="cart.html"><i class="fas fa-shopping-cart"></i></a>
										<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
									
								</li>
								
							</ul>
							
						</div>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->
	
	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> <br> <br>
	<!-- end search area -->






<div>
@yield('content')
</div>












    <!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">About us</h2>
						<p>Ut enim ad minim veniam perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Get in Touch</h2>
						<ul>
							<li>34/8, East Hukupara, Gifirtok, Sadan.</li>
							<li>support@fruitkha.com</li>
							<li>+00 111 222 3333</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">Pages</h2>
						<ul>
							<li><a href="{{url('/')}}">Home</a></li>
							<li><a href="{{url('about')}}">About</a></li>
							<li><a href="{{url('produits')}}">produits</a></li>
							<li><a href="{{url('contact')}}">contact</a></li>
							@auth
								
								<li><a href="{{url('cart')}}">cart</a></li>
							@endauth

								
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box subscribe">
						<h2 class="widget-title">Subscribe</h2>
						<p>Subscribe to our mailing list to get the latest updates.</p>
						<form action="index.html">
							<input type="email" placeholder="Email">
							<button type="submit"><i class="fas fa-paper-plane"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end footer -->
	
	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2024 - <a href="https://www.linkedin.com/in/ilyass-jaghdor/">ILYASS JAGHDOR </a> & <a href="https://www.linkedin.com/in/abdelmoula-serghini/">  ABDELMOULA SERGHINI</a>,  All Rights Reserved.<br>
						 By  <a href="#">OFPPT</a>
					</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->
	
	<!-- jquery -->
	<script src="/assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="/assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="/assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="/assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="/assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="/assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="/assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="/assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="/assets/js/main.js"></script>