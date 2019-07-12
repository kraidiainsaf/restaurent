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
					   					<h3 style="color: #d8cfcf;">Merci pour votre collaboration</h3>
                                           
                                        <?php
                                            $client_id=Illuminate\Support\Facades\Auth::user()->id;
											$com=App\Commande::where('client_id','=',$client_id)->orderBy('created_at', 'desc')->first();
											$ticket=App\Ticket::findOrFail($com->ticket_id);


										?>
                                        
                                           <div class="card-body">
										   <h6 style="color: #d8cfcf;"> votre commande est bien transmettre au restaurant attendez-nous  reponse avec une notification</h6>
                                          <h2 style="color: #f3662f;">Code Commande : {{$com->id}} </h2>
                                           <p style="color: #f6f6f6;">
                                           
										    Etat du Commande :  {{$com->etat}} ,
											specification  :  {{$com->specification}} ,
										   @if($type_commande=='locale')
										  ordre de servie  : {{$com->locale_commande->order_servie}} ,
										   @else
										   L'addresse de livraison  :  {{$com->web_commande->address}} ,
										   @endif
										   Les produits Commander : </p>
										   @foreach($com->produits as $produit)
										   <p style="color: #f6f6f6;">
										   Nom : {{$produit->nom}} ,
										   Sous Nom : {{$produit->sous_nom}} ,
										   Ingrédients : {{$produit->ingrédients}} ,
										   Prix  : {{$produit->prix}} ,
										   Quantité  : {{$produit->pivot->quantité}}</p>

                                         @endforeach
										
 
										 @if($type_commande=='web')
										   <h6 style="color: #f3662f;">Prix de Livraison: <p style="color: #d8cfcf;">25.00 da</p></h6>
										@endif
										<h6 style="color: #f3662f;"><B>Prix Totale : </B><p style="color: #d8cfcf;">{{$ticket->prix_totale}} DA</p></h66>

									
										  @if($com->etat=='non_valider')
										  <form  class="spinner-border spinner-border-sm " style="text-align: left;"  method='POST' action="{{ route('ModifierCommande',['id' => "$com->id"]) }}">
										   {{ csrf_field() }}

										  <input type='submit' name='submit'  class="btn btn-primary " id='submit' value='Modifier' class='btn btn-primary btn-block'>
										  </form>
										  <form  class="spinner-border spinner-border-sm"  style="text-align: right;"  method='POST' action="{{ route('AnnulerCommande',['id' => "$com->id"]) }}">
										   {{ csrf_field() }}
										  <input type='submit' name='submit'  class="btn btn-primary" id='submit' value='Annuler ' class='btn btn-primary btn-block'>
										  </form>
										  @else
										  
										  @if($com->etat=='en_attente')
										  <form  class="spinner-border spinner-border-sm" style="text-align: right;"  method='POST' action="{{ route('AnnulerCommande',['id' => "$com->id"]) }}">
										   {{ csrf_field() }}
										  <input type='submit' name='submit'  class="btn btn-primary" id='submit' value='Annuler ' class='btn btn-primary btn-block'>
										  </form>
										  @else
										  vos ne peut pas effectuee des autre operation
										  @endif

										  @endif
										
										 
										 
										   </div>

                                         
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

