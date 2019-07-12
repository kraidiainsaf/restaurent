@extends('layouts.app')
@section('sidebar')
    @parent
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url('/assets/images/img_bg_1.jpg');">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<div class="desc">
				   						<span class="icon"><i class="flaticon-cutlery"></i></span>
					   					<h1>Suchi ..spécial et frais</h1>
					   					<p>Le Supercentre Sushi....</p>
					   					<div class="desc2"></div>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(/assets/images/img_bg_2.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<div class="desc">
				   						<span class="icon"><i class="flaticon-cutlery"></i></span>
					   					<h1>Qu'est ce que le Sushi?</h1>
					   					<p>Le sushi est la préparation et la portion japonaise de riz vinaigré spécialement préparé, associé à des ingrédients variés tels que principalement des fruits de mer (souvent non cuits), des légumes et parfois des fruits tropicaux. Les styles de sushi et leur présentation varient grandement, mais l'ingrédient principal est le riz à sushi, également appelé shari ou sumeshi.</p>
					   					<div class="desc2"></div>
					   				</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(/assets/images/img_bg_3.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<div class="desc">
				   						<span class="icon"><i class="flaticon-cutlery"></i></span>
					   					<h1>SUR PLACE, A EMPORTER, EN LIVRAISON</h1>
					   					<p>Riche et extrêmement nourrissante, la cuisine japonaise est avant tout reconnue pour ses vertus et ses bienfaits sur la santé. Constituée principalement de riz, de poissons frais, de soja et d’algues, elle est peu calorique et riche en oméga 3, grâce aux poissons qui la compose. La cuisine japonaise est également mondialement connue pour ses soupes et ses innombrables recettes à base de viandes, de légumes, de riz, de poissons et de nouilles.</p>
					   					<div class="desc2"></div>
					   				</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(/assets/images/img_bg_4.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<div class="desc">
				   						<span class="icon"><i class="flaticon-cutlery"></i></span>
					   					<h1>Une variété de desserts</h1>
					   					<p>Faites votre choix parmi une vaste sélection de combinaison de menus et de makis, pouvant aussi bien satisfaire les végétariens que les non-végétariens. Pour parfaire votre repas, nous vous proposons également une variété de desserts s’alliant parfaitement à nos spécialités.</p>
					   					<div class="desc2"></div>
					   				</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>	
			  	</ul>
			  	
		  	</div>
		</aside>

		<div class="colorlib-intro">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-6 text-center">
						<div class="intro animate-box">
							<span class="icon">
								<i class="icon-map4"></i>
							</span>
							<h2>Address</h2>
							<p>198 West 21th Street, Suite 721 New York NY 10016</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 text-center">
						<div class="intro animate-box">
							<span class="icon">
								<i class="icon-clock4"></i>
							</span>
							<h2>Opening Time</h2>
							<p>Monday - Sunday</p>
							<span>8am - 9pm</span>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 text-center">
						<div class="intro animate-box">
							<span class="icon">
								<i class="icon-mobile2"></i>
							</span>
							<h2>Phone</h2>
							<p>+ 001 234 567</p>
							<p>+ 001 234 567</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 text-center">
						<div class="intro animate-box">
							<span class="icon">
								<i class="icon-envelope"></i>
							</span>
							<h2>Email</h2>
							<p><a href="#">info@domain.com</a><br><a href="#">luto@email.com</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="goto-here"></div>

		
	
	</div>

	<!-- jQuery -->
	<script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
	<!-- jQuery Easing -->
	<script src="{{ asset('/assets/js/jquery.easing.1.3.js') }}"></script>
	<!-- Bootstrap -->
	<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
	<!-- Waypoints -->
	<script src="{{ asset('/assets/js/jquery.waypoints.min.js') }}"></script>
	<!-- Parallax -->
	<script src="{{ asset('/assets/js/jquery.stellar.min.js') }}"></script>
	<!-- Owl Carousel -->
	<script src="{{ asset('/assets/js/owl.carousel.min.js') }}"></script>
	<!-- Magnific Popup -->
	<script src="{{ asset('/assets/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('/assets/js/magnific-popup-options.js') }}"></script>
	<!-- Flexslider -->
	<script src="{{ asset('/assets/js/jquery.flexslider-min.js') }}"></script>
	<!-- Date Picker -->
	<script src="{{ asset('/assets/js/bootstrap-datepicker.js') }}"></script>

	<!-- Main JS (Do not remove) -->
	<script src="{{ asset('/assets/js/main.js') }}"></script>

	</body>
</html>

@endsection