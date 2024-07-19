<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="{{asset('/')}}images/favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="{{asset('/')}}css/bootstrap.min.css" rel="stylesheet">
		<link href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css')}}" rel="stylesheet">
		<link href="{{asset('/')}}css/tiny-slider.css" rel="stylesheet">
		<link href="{{asset('/')}}css/style.css" rel="stylesheet">
		<script src="{{asset('/')}}js/angular.min.js"></script> 
		<title>@yield('title')|Techchain</title>
</head>

	<body ng-app="tcApp" ng-controller="tcCtrl">

		<!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand" href="#">Furni<span>.</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li class="nav-item active">
							<a class="nav-link" href="{{route('home')}}">Home</a>
						</li>
						<li class="nav-item dropdown"  >
							<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Category</a>
							<ul class="dropdown-menu" style="background-color:#198754">
								@foreach ($categories as $item)
								<li><a class="dropdown-item" href="#" >{{$item->name}}</a></li>
								@endforeach
							  
							</ul>

						<li><a class="nav-link" href="{{route('shop')}}">Shop</a></li>
					
						<li><a class="nav-link" href="#">Blog</a></li>

						<li><a class="nav-link" href="#">Contact us</a></li>
						@if (Auth::check())
						<li><a class="nav-link" href="{{route('logout')}}">Logout</a></li>
						@endif
						<li>
							@if (Auth::check())
						<a class="nav-link" href="{{route('admin.dashboard')}}">{{Auth::user()->name}}</a>
							
						@else
						<a class="nav-link" href="{{route('register')}}">Register</a>
						
						@endif
							
						</li>

						
					</ul>

					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						<li><a class="nav-link" href="{{route('login')}}"><img src="{{asset('/')}}images/user.svg"></a></li>
						<li><a class="nav-link" href="{{route('cart')}}"><img src="{{asset('/')}}images/cart.svg"></a></li>
					</ul>
				</div>
			</div>
				
		</nav>
		<!-- End Header/Navigation -->
            



		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Modern Interior <span clsas="d-block">Design Studio</span></h1>
								<p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.</p>
								<p><a href="" class="btn btn-secondary me-2">Shop Now</a><a href="#" class="btn btn-white-outline">Explore</a></p>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="hero-img-wrap">
								<img src="{{asset('/')}}images/couch.png" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		

		
	<div ng-controller="viewCtrl">
		
        @yield('body')
		
	</div>

		

		<!-- Start Footer Section -->
		<footer class="footer-section">
			<div class="container relative">

				<div class="sofa-img">
					<img src="{{asset('/')}}images/sofa.png" alt="Image" class="img-fluid">
				</div>

				<div class="row">
					<div class="col-lg-8">
						<div class="subscription-form">
							<h3 class="d-flex align-items-center"><span class="me-1"><img src="{{asset('/')}}images/envelope-outline.svg" alt="Image" class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>

							<form action="#" class="row g-3">
								<div class="col-auto">
									<input type="text" class="form-control" placeholder="Enter your name">
								</div>
								<div class="col-auto">
									<input type="email" class="form-control" placeholder="Enter your email">
								</div>
								<div class="col-auto">
									<button class="btn btn-primary">
										<span class="fa fa-paper-plane"></span>
									</button>
								</div>
							</form>

						</div>
					</div>
				</div>

				<div class="row g-5 mb-5">
					<div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Furni<span>.</span></a></div>
						<p class="mb-4">Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant</p>

						<ul class="list-unstyled custom-social">
							<li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
						</ul>
					</div>

					<div class="col-lg-8">
						<div class="row links-wrap">
							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">About us</a></li>
									<li><a href="#">Services</a></li>
									<li><a href="#">Blog</a></li>
									<li><a href="#">Contact us</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Support</a></li>
									<li><a href="#">Knowledge base</a></li>
									<li><a href="#">Live chat</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Jobs</a></li>
									<li><a href="#">Our team</a></li>
									<li><a href="#">Leadership</a></li>
									<li><a href="#">Privacy Policy</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								
							</div>
						</div>
					</div>

				</div>

				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> Distributed By <a hreff="https://themewagon.com">ThemeWagon</a>  <!-- License information: https://untree.co/license/ -->
            </p>
						</div>

						<div class="col-lg-6 text-center text-lg-end">
							<ul class="list-unstyled d-inline-flex ms-auto">
								<li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>

					</div>
				</div>

			</div>
		</footer>
		<!-- End Footer Section -->	


		<script src="{{asset('/')}}js/bootstrap.bundle.min.js"></script>
		<script src="{{asset('/')}}js/tiny-slider.js"></script>
		<script src="{{asset('/')}}js/custom.js"></script>
		<script>
			var app = angular.module('tcApp',[]);
				app.controller('tcCtrl',function($scope,$http){
					$scope.cart = {!! json_encode(session('cart')) !!} || [];
					$scope.addToCart = function(product_id,quantity){
					$http.post('/api/cart',{
						product_id: product_id,
						quantity: quantity,

					}).then(function(res){
						$scope.cart = res.data.data;
					});
				}	
				$scope.totalCartMoney = function(){
					var total=0;
					$scope.cart.forEach(sp => {
						total +=sp.quantity *sp.price;
					});
					return total;
				}
				$scope.removeFromCart = function(index){
					$http.delete('/api/cart/'+index).then(function(res){
						$scope.cart= res.data.data;
					})

				}
				});
				var viewFunction = function($scope){ }
		</script>
		@yield('viewFunction')
		<script>
			app.controller('viewCtrl',viewFunction);
		</script>
	</body>

</html>
