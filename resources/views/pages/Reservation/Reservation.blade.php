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
					   					<h1 style="color: #f3662f;">La reservation D'une Table </h1>
                                           
                                        
                                           <div class="card-body">
                                           <div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="row">
							<div class="col-md-12">
							@if($errors->get('error'))
							 @foreach($errors->get('error') as $message)
							 <span class="invalid-feedback" role="alert">
                                        <strong style="color: #f3662f;">{{ $message }}</strong>
                              </span>
								
						     @endforeach 
						     @endif
							
								<form  class="colorlib-form"  method="POST" action="{{ route('Reserver') }}">
                                @csrf
				              	<div class="row">
										
								 
										<div class="col-md-6 animate-box">
											<div class="form-group">
												<label for="date">Date</label>
												<div class="form-field">
													@if ($errors->has('date'))
													<span class="invalid-feedback" role="alert">
                                        <strong style="color: #f3662f;">{{ $errors->first('date') }}</strong>
                                                   </span>
                                                    
                                                      @endif
													<input type="datetime" name="date" style="border: 1px solid #f38921;padding: 10px;background-color: #c9c9c9;" id="date" class="form-control date" placeholder="Date">
												</div>
											</div>
										</div>
										<div class="col-md-6 animate-box">
											<div class="form-group">
												<label for="person">Places</label>
												<div class="form-field">
													@if ($errors->has('nbr_place'))
													<span class="invalid-feedback" role="alert">
                                        <strong style="color: #f3662f;">{{ $errors->first('nbr_place') }}</strong>
                              </span>
                                                     
                                                  @endif
													<select name="nbr_place" style="border: 1px solid #f38921;padding: 10px;background-color: #c9c9c9;" id="people" class="form-control">
														<option value="2">2</option>
														<option value="4">4</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-md-6 animate-box">
											<div class="form-group">
												<label for="time">De</label>
												<div class="form-field">
													@if ($errors->has('de'))
													<span class="invalid-feedback" role="alert">
                                        <strong style="color: #f3662f;"> {{ $errors->first('de') }}</strong>
                                                    </span>
                                                   
                                                    @endif
													<select  type="text" name="de" style="border: 1px solid #f38921;padding: 10px;background-color: #c9c9c9;" id="people" class="form-control">
													<option value="10:00:00">10:00</option>
														<option value="11:00:00">11:00</option>
														<option value="12:00:00">12:00</option>
														<option value="13:00:00">13:00</option>
														<option value="14:00:00">14:00</option>
														<option value="15:00:00">15:00</option>
														<option value="16:00:00">16:00</option>
														<option value="17:00:00">17:00</option>
														<option value="18:00:00">18:00</option>
														<option value="19:00:00">19:00</option>
														<option value="20:00:00">20:00</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-md-6 animate-box">
											<div class="form-group">
												<label for="time">A</label>
												<div class="form-field">
													@if ($errors->has('a'))
													<span class="invalid-feedback" role="alert">
                                        <strong style="color: #f3662f;">{{ $errors->first('a') }}</strong>
                                                    </span>
                                                    
                                                    @endif
													<select  type="text" name="a" style="border: 1px solid #f38921;padding: 10px;background-color: #c9c9c9;" id="people" class="form-control">
														<option value="10:00:00">10:00</option>
														<option value="11:00:00">11:00</option>
														<option value="12:00:00">12:00</option>
														<option value="13:00:00">13:00</option>
														<option value="14:00:00">14:00</option>
														<option value="15:00:00">15:00</option>
														<option value="16:00:00">16:00</option>
														<option value="17:00:00">17:00</option>
														<option value="18:00:00">18:00</option>
														<option value="19:00:00">19:00</option>
														<option value="20:00:00">20:00</option>
													</select>
												</div>
											</div>
										</div>
									
										<div class="col-md-12 animate-box">
											<div class="row">
												<div class="col-md-6 col-md-offset-4">
													<input type="submit" name="submit" id="submit" value="Reserver" class="btn btn-primary btn-block">
												</div>
											</div>
										</div>
									</div>
				            </form>
			           	</div>
						</div>
					</div>
				</div>					
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
