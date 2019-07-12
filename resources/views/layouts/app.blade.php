@section('sidebar')
     
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sushi Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{ asset('/assets/css/animate.css') }}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{ asset('/assets/css/icomoon.css') }}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.css') }}">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="{{ asset('/assets/css/vendor/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/assets/css/owl.theme.default.min.css') }}">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{ asset('/assets/css/magnific-popup.css') }}">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="{{ asset('/assets/css/flexslider.css') }}">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="{{ asset('/assets/fonts/flaticon/font/flaticon.css') }}">
	<!-- Date Picker -->
	<link rel="stylesheet" href="{{ asset('/assets/css/bootstrap-datepicker.css') }}">

	<link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">

	<!-- Modernizr JS -->
	<script src="{{ asset('/assets/js/modernizr-2.6.2.min.js') }}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>

	
				
	
	<div id="colorlib-page">
		<header>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="colorlib-navbar-brand">
							<a class="colorlib-logo" href="index.html"><i class="flaticon-cutlery"></i><span>Lu</span><span>to</span></a>
						</div>
						
						<div class=" colorlib-nav-toggle ">

						@if (Route::has('login'))
                <div >
					@auth
					

				
							
							<form   method='POST' action="{{ route('DetailCommande') }}">
										   {{ csrf_field() }}
										   <?php
                                            $client_id=Illuminate\Support\Facades\Auth::user()->id;
											$com=App\Commande::where('client_id','=',$client_id)->orderBy('created_at', 'desc')->first();
											if($com!=null){

										?>
									
										  <input style=" background-color: Transparent;background-repeat:no-repeat;border: none;cursor:pointer;overflow: hidden;outline:none;color:red;" type='submit' name='submit'  id='submit' value='commande '>
										  <?php
											}
										  ?>
							
							<a href="{{ route('Menu') }}">Menu</a>&nbsp;&nbsp;
							<a href="{{ route('Reservation') }}">Reservation</a>&nbsp;&nbsp;
							<a href="#">Informations</a>&nbsp;&nbsp;
							<a href="#">Contact</a>&nbsp;&nbsp;		  
                            <a href="{{ route('Compte') }}">Compte</a>&nbsp;&nbsp;
							
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Déconnexion') }}
                                    </a>

                                  
						
						&nbsp;&nbsp;
						</form>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                    @else
                        <a href="{{ route('login') }}">Connexion</a>
						&nbsp;&nbsp;
                        @if (Route::has('register'))
							<a href="{{ route('register') }}">Registration</a>
							&nbsp;&nbsp;
                        @endif
                    @endauth
                </div>
            @endif
                         </div >

						
					
					</div>
				</div>
			</div>
		</header>
        @show

