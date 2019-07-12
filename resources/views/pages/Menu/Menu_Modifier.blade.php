@extends('layouts.app')
@section('sidebar')
    @parent


        <div class="colorlib-menu">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center animate-box intro-heading">
						<span class="icon"><i class="flaticon-cutlery"></i></span>
						<h2>Menu</h2>
						<p>Choisir .... Analyser votre commande ... commander ...</p>
						</div>
				</div>
				<div class="row">
					<div class="col-md-12 animate-box">
						<div class="row">
							<div class="col-md-12 text-center">
						
							<h3>les produits  selectionnés </h3>
							   	<br>
								@if($errors->get('error'))
							 @foreach($errors->get('error') as $message)
							 <span class="invalid-feedback" role="alert">
                                        <strong style="color: #f3662f;">{{ $message }}</strong>
                              </span>
                           
						     @endforeach 
						     @endif
							<p id="sudo" ></p> 
						
							<script> 
							
            function myGeeks() { 
				document.getElementById("sudo").innerHTML ="";

               
				var text="<form  class='colorlib-form'  method='POST' action='{{ route('Modifier',['id' =>"$commande->id"]) }}'>"+'@csrf <br>'+
				"@if($type_commande=='locale')"+
				"<p style='color: black;font-size: small;'> l'ordre de servie :"+
				"<select id='pet-select' style='background-color: white;border: 1px solid #f38921;padding: 10px;border-radius: 50px 20px;' name='order_servie'>"+
				" <option value='totalité' >en totalité</option> "+
				" <option value='ordre'>avec un ordre </option>"+
				" </select></p>"+
				"@else"+
				"<p style='color: black;font-size: small;'>Addresse de livraison  : "+
				"<input type='text' id='address'  style='background-color: white;border: 1px solid #f38921;padding: 10px;border-radius: 50px 20px;' name='address' ></p>"+
				"@endif";
                                
				var nbr_plat = document.getElementById("nbr_plat").value ;
				var number = 1;
                while (number <= nbr_plat) {
					var plat = document.getElementById("plat-"+number).value ;
					if ($('#plat-'+number).is(":checked"))
                    {
						var plat_nom = document.getElementById("plat-nom-"+number).value ;
						
						text=text+
						"<input type='hidden' id='plat-"+number+"' name='plat-"+number+"' value="+plat+">"+
						"<p style='color: black;font-size: small;'>("+plat_nom+") Quantité : <input  style='background-color: white;border: 1px solid #f38921;padding: 10px;border-radius: 50px 20px;' type='number' id='plat-q-"+number+"' name='plat-q-"+number+"' value='1'></p>";
  
                    }

               number++;
                   }
				   var nbr_boisson = document.getElementById("nbr_boisson").value ;
				var number2 = 1;
                while (number2 <= nbr_boisson) {
					var boisson = document.getElementById("boisson-"+number2).value ;
					if ($('#boisson-'+number2).is(":checked"))
                    {
						var boisson_nom = document.getElementById("boisson-nom-"+number2).value ;
						
						text=text+
						"<input type='hidden' id='boisson-"+number2+"' name='boisson-"+number2+"' value="+boisson+">"+
						"<p style='color: black;font-size: small;'>("+boisson_nom+") Quantité : <input  style='background-color: white;border: 1px solid #f38921;padding: 10px;border-radius: 50px 20px;' type='number' id='boisson-q-"+number2+"' name='boisson-q-"+number2+"' value='1'></p>";
  
                    }

               number2++;
                   }


				   var nbr_supplémentaire = document.getElementById("nbr_supplémentaire").value ;
				var number3 = 1;
                while (number3 <= nbr_supplémentaire) {
					var supplémentaire = document.getElementById("supplémentaire-"+number3).value ;
					if ($('#supplémentaire-'+number3).is(":checked"))
                    {
						var supplémentaire_nom = document.getElementById("supplémentaire-nom-"+number3).value ;
						
						text=text+
						"<input type='hidden' id='supplémentaire-"+number3+"' name='supplémentaire-"+number3+"' value="+supplémentaire+">"+
						"<p style='color: black;font-size: small;'>("+supplémentaire_nom+")Quantité : <input  style='background-color: white;border: 1px solid #f38921;padding: 10px;border-radius: 50px 20px;' type='number' id='supplémentaire-q-"+number3+"' name='supplémentaire-q-"+number3+"' value='1'></p>";
  
                    }

               number3++;
                   }
                        
                          
                document.getElementById("sudo").innerHTML =text+"<p style='color: black;font-size: small;'>Specification <input type='text'  style='background-color: white;border: 1px solid #f38921;padding: 10px;border-radius: 50px 20px;' id='specification' name='specification' ></p>"+"<input type='submit' name='submit' id='submit' class='btn btn-primary' value='Modifier' class='btn btn-primary btn-block'></form>";
                        
            } 
        </script> 
								<ul class="nav nav-tabs text-center" role="tablist">
									<li role="presentation" class="active"><a href="#main" aria-controls="mains" role="tab" data-toggle="tab">Plats</a></li>
									<li role="presentation"><a href="#desserts" aria-controls="desserts" role="tab" data-toggle="tab">Boissons</a></li>
									<li role="presentation"><a href="#drinks" aria-controls="drinks" role="tab" data-toggle="tab">supplémentaire</a></li>
								</ul>
							</div>
						</div>
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="main">
								<div class="row">
									<div class="col-md-12">
									<?php $i=0; ?>
                                     @foreach($plats as $plat)
									 <?php $i++; ?>
                                     <ul class="menu-dish">

						              <li>
						                <figure class="dish-entry">
						                	<div class="dish-img" style="background-image: url(/assets/images/dish-3.jpg);"></div>
						                </figure>
						                <div class="text">
										
									
					                   
						                  <span class="price">{{ $plat->prix }} DA <br>
										  @if($commande->produits()->where('produits.id','=',$plat->id)->first()!=null)
										  <input type="checkbox" checked onclick="myGeeks()" id="plat-{{$i}}" name="plat-{{$i}}" value="{{ $plat->id }}"> Get <br>  

										  @else
										  <input type="checkbox" onclick="myGeeks()" id="plat-{{$i}}" name="plat-{{$i}}" value="{{ $plat->id }}"> Get <br>  

										  @endif
										  <input type="hidden" id="plat-nom-{{$i}}" name="plat-{{$i}}" value="{{ $plat->nom }}">  <br>  

										  </span>
                                          <h2>{{ $plat->nom }}</h2>
                                        
                                          <h3 >{{ $plat->sous_nom }}</h3>
						                  <p class="cat">{{ $plat->ingrédients }}</p>
						                </div>
                                      </li>
                                      </ul>

						             @endforeach
									 <input type="hidden" id="nbr_plat" name="nbr_plat" value="{{ $i }}"> 
									</div>
									
								</div>
							</div>

							<div role="tabpanel" class="tab-pane" id="desserts">
								<div class="row">
								<div class="col-md-12">
									<?php $i=0; ?>
                                     @foreach($boissons as $boisson)
									 <?php $i++; ?>
                                     <ul class="menu-dish">

						              <li>
						                <figure class="dish-entry">
						                	<div class="dish-img" style="background-image: url(/assets/images/dish-3.jpg);"></div>
						                </figure>
						                <div class="text">
										
									
					                   
						                  <span class="price">{{ $boisson->prix }} DA <br>
                                          @if($commande->produits()->where('produits.id','=',$boisson->id)->first()!=null)
                                          <input type="checkbox" checked onclick="myGeeks()" id="boisson-{{$i}}" name="boisson-{{$i}}" value="{{ $boisson->id }}"> Get <br>  
                                          @else
                                          <input type="checkbox" onclick="myGeeks()" id="boisson-{{$i}}" name="boisson-{{$i}}" value="{{ $boisson->id }}"> Get <br>  
                                          @endif

										  <input type="hidden" id="boisson-nom-{{$i}}" name="boisson-{{$i}}" value="{{ $boisson->nom }}">  <br>  

										  </span>
                                          <h2>{{ $boisson->nom }}</h2>
                                        
                                          <h3 >{{ $boisson->sous_nom }}</h3>
						                  <p class="cat">{{ $boisson->ingrédients }}</p>
						                </div>
                                      </li>
                                      </ul>

						             @endforeach
									 <input type="hidden" id="nbr_boisson" name="nbr_boisson" value="{{ $i }}"> 
									</div>
									
								</div>
							</div>

							<div role="tabpanel" class="tab-pane" id="drinks">
								<div class="row">
								<div class="col-md-12">
									<?php $i=0; ?>
                                     @foreach($supplémentaires as $supplémentaire)
									 <?php $i++; ?>
                                     <ul class="menu-dish">

						              <li>
						                <figure class="dish-entry">
						                	<div class="dish-img" style="background-image: url(/assets/images/dish-3.jpg);"></div>
						                </figure>
						                <div class="text">
										
									
					                   
						                  <span class="price">{{ $supplémentaire->prix }} DA <br>
                                          @if($commande->produits()->where('produits.id','=',$supplémentaire->id)->first()!=null)
                                          <input type="checkbox" checked onclick="myGeeks()" id="supplémentaire-{{$i}}" name="supplémentaire-{{$i}}" value="{{ $supplémentaire->id }}"> Get <br>  
                                          @else
                                          <input type="checkbox" onclick="myGeeks()" id="supplémentaire-{{$i}}" name="supplémentaire-{{$i}}" value="{{ $supplémentaire->id }}"> Get <br>  
                                          @endif

										  <input type="hidden" id="supplémentaire-nom-{{$i}}" name="supplémentaire-{{$i}}" value="{{ $supplémentaire->nom }}">  <br>  

										  </span>
                                          <h2>{{ $supplémentaire->nom }}</h2>
                                        
                                          <h3 >{{ $supplémentaire->sous_nom }}</h3>
						                  <p class="cat">{{ $supplémentaire->ingrédients }}</p>
						                </div>
                                      </li>
                                      </ul>

						             @endforeach
									 <input type="hidden" id="nbr_supplémentaire" name="nbr_supplémentaire" value="{{ $i }}"> 
									</div>
								
								</div>
							</div>
						</div>
					</div>
				
				</div>
			</div>
		</div>

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