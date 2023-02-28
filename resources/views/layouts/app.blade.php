<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="description" content="" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<title>@yield('title')</title>
        <link rel="shortcut icon" href="{{asset('image/icon.png')}}" type="image/x-icon" />
		<link rel="stylesheet" href="{{asset('css/main/style.css')}}" />		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js" crossorigin="anonymous"></script>
		<script src="{{ asset('js/common/errors.js') }}"></script>
	</head>
	<body>
		<div id="preloader">
			<i class="circle-preloader"></i>
		</div>
		<header class="header-area">
			<div class="top-header">
				<div class="container h-100">
					<div class="row h-100">
						<div class="col-12 h-100">
							<div class="top-header-content h-100 d-flex align-items-center justify-content-between">
								<div class="top-headline">
									<p>Welcome to <span>EWallet</span></p>
								</div>
								<div class="login-faq-earn-money">
                                    <a href="{{route('user.profile.get')}}" class="active">{{Auth::user()->username}}</a>
									<a href="{{route('logout')}}">Logout</a>
									<a href="#">FAQ</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="cryptos-main-menu">
				<div class="classy-nav-container breakpoint-off">
					<div class="container">
						<nav class="classy-navbar justify-content-between" id="cryptosNav">
							<a class="nav-brand" href="{{route('user.index')}}"><img src="{{asset('image/icon.png')}}" width="100" height="100" alt="" /></a>
							<div class="classy-navbar-toggler">
								<span class="navbarToggler"><span></span><span></span><span></span></span>
							</div>
							<div class="classy-menu">
								<div class="classycloseIcon">
									<div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
								</div>
								<div class="classynav">
									<ul>
										<li><a href="{{route('user.index')}}">Home</a></li>
										<li><a href="#">Deposit money</a></li>
										<li>
											<a href="#">Pages</a>
											<ul class="dropdown">
												<li><a href="index.html">Home</a></li>
												<li><a href="about-us.html">About Us</a></li>
												<li><a href="blog.html">Articles</a></li>
												<li><a href="contact.html">Contact</a></li>
												<li><a href="elements.html">Elements</a></li>
												<li>
													<a href="#">Dropdown</a>
													<ul class="dropdown">
														<li><a href="index.html">Home</a></li>
														<li><a href="about-us.html">About Us</a></li>
														<li><a href="blog.html">Articles</a></li>
														<li><a href="contact.html">Contact</a></li>
														<li><a href="elements.html">Elements</a></li>
														<li>
															<a href="#">Dropdown</a>
															<ul class="dropdown">
																<li><a href="index.html">Home</a></li>
																<li><a href="about-us.html">About Us</a></li>
																<li><a href="blog.html">Articles</a></li>
																<li><a href="contact.html">Contact</a></li>
																<li><a href="elements.html">Elements</a></li>
															</ul>
														</li>
													</ul>
												</li>
											</ul>
										</li>
										<li>
											<a href="#">Mega Menu</a>
											<div class="megamenu">
												<ul class="single-mega cn-col-4">
													<li><a href="#">- Home</a></li>
													<li><a href="#">- About us</a></li>
													<li><a href="#">- Services</a></li>
													<li><a href="#">- Testimonials</a></li>
													<li><a href="#">- News</a></li>
													<li><a href="#">- About us</a></li>
												</ul>
												<ul class="single-mega cn-col-4">
													<li><a href="#">- Contact</a></li>
													<li><a href="#">- Faq</a></li>
													<li><a href="#">- Terms &amp; Conditions</a></li>
													<li><a href="#">- Careers</a></li>
													<li><a href="#">- Newsletter &amp; Exchange</a></li>
													<li><a href="#">- Terms &amp; Conditions</a></li>
												</ul>
												<ul class="single-mega cn-col-4">
													<li><a href="#">- About us</a></li>
													<li><a href="#">- Testimonials</a></li>
													<li><a href="#">- Contact</a></li>
													<li><a href="#">- Terms &amp; Conditions</a></li>
													<li><a href="#">- Newsletter &amp; Exchange</a></li>
													<li><a href="#">- Contact</a></li>
												</ul>
												<div class="single-mega cn-col-4">
													<div class="megamenu-slides owl-carousel">
														<img src="{{asset('image/bg-img/bg-1.jpg')}}" alt="" />
														<img src="{{asset('image/bg-img/bg-1.jpg')}}" alt="" />
													</div>
												</div>
											</div>
										</li>
										<li><a href="contact.html">Contact</a></li>
									</ul>
									<div class="header-newsletter-form">
										<form action="#" method="post">
											<input type="email" name="email" id="email" placeholder="Newsletter" />
											<button type="submit">Subscribe</button>
										</form>
									</div>
								</div>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</header>
		@yield('content')
		<footer class="footer-area">
			<div class="main-footer-area section-padding-100-0 bg-img bg-overlay" style="background-image: url({{asset('image/bg-img/bg-1.jpg')}});">
				<div class="container">
					<div class="row">
						<div class="col-12 col-sm-6 col-lg-4">
							<div class="footer-widget mb-100">
								<div class="widget-title">
									<a href="#"><img src="{{asset('image/icon.png')}}" alt="" width="200" height="200" /></a>
								</div>
								<p>
									Morbi vel arcu gravida, iaculis lacus vel, posuere ipsum. Sed faucibus mauris vitae urna consectetur, sit amet maximus nisl sagittis. Ut in iaculis enim, et pulvinar mauris. Etiam tristique magna eget
									velit consectetur, a tincidunt velit dictum.
								</p>
								{{-- <div class="footer-social-info">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-dribbble"></i></a>
									<a href="#"><i class="fa fa-behance"></i></a>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</div> --}}
							</div>
						</div>
						<div class="col-12 col-sm-6 col-lg-4">
							<div class="footer-widget mb-100">
								<div class="widget-title">
									<h6>Recent Posts</h6>
								</div>
								<div class="single--blog-post">
									<a href="#">
										<p>Aliquam ac eleifend metus</p>
									</a>
									<span>March 10, 2018</span>
								</div>
								<div class="single--blog-post">
									<a href="#">
										<p>Donec in libero sit amet mi vulputate</p>
									</a>
									<span>March 10, 2018</span>
								</div>
								<div class="single--blog-post">
									<a href="#">
										<p>Aliquam ac eleifend metus</p>
									</a>
									<span>March 10, 2018</span>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6 col-lg-4">
							<div class="footer-widget mb-100">
								<div class="widget-title">
									<h6>Quick Links</h6>
								</div>
								<nav>
									<ul class="useful-links d-flex justify-content-between flex-wrap">
										<li><a href="#">Home</a></li>
										<li><a href="#">Faq</a></li>
										<li><a href="#">About us</a></li>
										<li><a href="#">Terms &amp; Conditions</a></li>
										<li><a href="#">Services</a></li>
										<li><a href="#">Careers</a></li>
										<li><a href="#">Testimonials</a></li>
										<li><a href="#">Newsletter &amp; Exchange</a></li>
										<li><a href="#">News</a></li>
										<li><a href="#">Exchange</a></li>
										<li><a href="#">Contact</a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="bottom-footer-area">
				<div class="container h-100">
					<div class="row h-100 align-items-center justify-content-center">
						<div class="col-12">
							<p>
								Copyright &copy;
								<script>
									document.write(new Date().getFullYear());
								</script>
								All rights reserved <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank"> Huy.DP</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<script src="{{asset('js/main/jquery/jquery-2.2.4.min.js')}}"></script>
		<script src="{{asset('js/main/bootstrap/popper.min.js')}}"></script>
		<script src="{{asset('js/main/bootstrap/bootstrap.min.js')}}"></script>
		<script src="{{asset('js/main/plugins/plugins.js')}}"></script>
		<script src="{{asset('js/main/active.js')}}"></script>
		{{-- <script src="{{ asset('js/common/errors.js') }}"></script> --}}
	</body>
</html>
