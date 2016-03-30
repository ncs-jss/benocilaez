<html>

<head>
	<title>
		Zealicon
	</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="zeal/css/font-awesome.css">
	<link rel="stylesheet" href="zeal/css/main.css">
</head>

<body>


	<!-- About Page ================================================ -->
	<div class="about">
		<div class="about-bg"></div>
		<h2 class="about-header">ABOUT ZEALICON '16</h2>
		<p>Zealicon is the annual techno-cultural festival of JSS ATE, Noida . Dedicated to the celebration of creativity and science , it is a stimulating event brimming with youthful dynamism.It transforms the campus into a veritable kaleidoscope of people. Involving multifarious exciting events from technical scratch to cultural zeal.  A platform for all the creative minds to express their ideas in the form of events including  band performances, discussions, film screenings that are spread over three days. Apart from the exuberant cultural events, Zealicon is also known for its mind boggling  technical events that creates an ambience for the technocrats.<br><br>
			Zealicon 2016 is based upon the theme  “COMIC-CON” , covering the aspects of hysterical face of literature along with popular arts , science and technology . This edition of Zealicon promises all the trademarks of the earlier versions. A plethora of events where academicians will vouch out their intellect and artists will showcase the best of art .  Projecting the fictitious gesture onto the real world, COMIC CON  will act as a connecting link between the fantasy and reality.<br><br>
			Creating an aura of avidity and togetherness , We hope that Zealicon 2016 will turn out to  be a memorable experience for you !

		</div>

		<!-- events-details pages================================= -->

		<div class="detail coderz-details">
			<div class="cross-icon-3">
				<i class="fa fa-chevron-left"></i>
			</div>
			<div class=" cross-3">

			</div>

			<div class="head-detail">CODERZ</div>

			<div class="left-nav">

				<ul>
					@foreach($eventdetails as $details)
					@if($details->grp == 0) 
					<li>{{strtoupper($details->event_name)}}
					</li>
					@endif
					@endforeach
				</div>

				<div class="right-detail ">
					@foreach($eventdetails as $details)
					@if($details->grp == 0) 
				<div class ="{{$details->event_id}}" style="display: none;">
					<h4>{{strtoupper($details->event_name)}}</h4>
					{{strtoupper($details->event_description)}}
					<h4>DESCRIPTION</h4>
					fddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj 
					<h4>RULES</h4>
					1. ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndf
					2. ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndf
					</div>
					@endif
					@endforeach
				</div>
				<div class="right-detail result-div">
					@foreach($eventdetails as $details)
					@if($details->grp == 0) 
				<div class ="{{$details->event_id}}" style="display: none;">
				
					<h4>RESULT</h4>
					<ul>
						<li>
							Coming soon
						</li>
						<!-- <br> -->
						<li>
							Coming soon
						</li>

					</ul>
					<h4>PRIZES</h4>
					<ul>
						<li>
							Rs. 1200
						</li>
						<!-- <br> -->
						<li>
							Rs. 1000
						</li>

					</ul>
					<h4>CONTACT</h4>
					<ul>
						<li>
							Akash Jain
						</li>
						<!-- <br> -->
						<li>
							Siddharth jain
						</li>

					</ul>
				</div>
					@endif
					@endforeach
		
				</div>

			</div>

			<div class="detail pio-details">
				<div class="cross-icon-3">
					<i class="fa fa-chevron-left"></i>
				</div>
				<div class=" cross-3">

				</div>

				<div class="head-detail">CODERZ</div>

				<div class="left-nav">

					<ul>
						
						@foreach($eventdetails as $details)
						@if($details->grp == 1) 
						<li>{{strtoupper($details->event_name)}}
						</li>
						@endif
						@endforeach
					</div>

					<div class="right-detail ">
							@foreach($eventdetails as $details)
					@if($details->grp == 1) 
				<div class ="{{$details->event_id}}" style="display: none;">
					<h4>{{strtoupper($details->event_name)}}</h4>
					{{strtoupper($details->event_description)}}
					<h4>DESCRIPTION</h4>
					fddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj 
					<h4>RULES</h4>
					1. ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndf
					2. ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndf
					</div>
					@endif
					@endforeach
				</div>
				<div class="right-detail result-div">
					@foreach($eventdetails as $details)
					@if($details->grp == 1) 
				<div class ="{{$details->event_id}}" style="display: none;">
				
					<h4>RESULT</h4>
					<ul>
						<li>
							Coming soon
						</li>
						<!-- <br> -->
						<li>
							Coming soon
						</li>

					</ul>
					<h4>PRIZES</h4>
					<ul>
						<li>
							Rs. 1200
						</li>
						<!-- <br> -->
						<li>
							Rs. 1000
						</li>

					</ul>
					<h4>CONTACT</h4>
					<ul>
						<li>
							Akash Jain
						</li>
						<!-- <br> -->
						<li>
							Siddharth jain
						</li>

					</ul>
				</div>
					@endif
					@endforeach
		
					</div>
				</div>

				<div class="detail mech-details">
					<div class="cross-icon-3">
						<i class="fa fa-chevron-left"></i>
					</div>
					<div class=" cross-3">

					</div>

					<div class="head-detail">MECHAVOLTZ</div>

					<div class="left-nav">

						<ul>
							@foreach($eventdetails as $details)
							@if($details->grp == 2) 
							<li>{{strtoupper($details->event_name)}}
							</li>
							@endif
							@endforeach

						</div>
						<div class="right-detail ">
						@foreach($eventdetails as $details)
					@if($details->grp == 2) 
				<div class ="{{$details->event_id}}" style="display: none;">
					<h4>{{strtoupper($details->event_name)}}</h4>
					{{strtoupper($details->event_description)}}
					<h4>DESCRIPTION</h4>
					fddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj 
					<h4>RULES</h4>
					1. ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndf
					2. ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndf
					</div>
					@endif
					@endforeach
				</div>
				<div class="right-detail result-div">
					@foreach($eventdetails as $details)
					@if($details->grp == 2) 
				<div class ="{{$details->event_id}}" style="display: none;">
				
					<h4>RESULT</h4>
					<ul>
						<li>
							Coming soon
						</li>
						<!-- <br> -->
						<li>
							Coming soon
						</li>

					</ul>
					<h4>PRIZES</h4>
					<ul>
						<li>
							Rs. 1200
						</li>
						<!-- <br> -->
						<li>
							Rs. 1000
						</li>

					</ul>
					<h4>CONTACT</h4>
					<ul>
						<li>
							Akash Jain
						</li>
						<!-- <br> -->
						<li>
							Siddharth jain
						</li>

					</ul>
				</div>
					@endif
					@endforeach
		
						</div>
					</div>

					<div class="detail robo-details">
						<div class="cross-icon-3">
							<i class="fa fa-chevron-left"></i>
						</div>
						<div class=" cross-3">

						</div>

						<div class="head-detail">ROBOTILES</div>

						<div class="left-nav">

							<ul>

								@foreach($eventdetails as $details)
								@if($details->grp == 3) 
								<li>{{strtoupper($details->event_name)}}
								</li>
								@endif
								@endforeach

							</div><div class="right-detail ">
	@foreach($eventdetails as $details)
					@if($details->grp == 3) 
				<div class ="{{$details->event_id}}" style="display: none;">
					<h4>{{strtoupper($details->event_name)}}</h4>
					{{strtoupper($details->event_description)}}
					<h4>DESCRIPTION</h4>
					fddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj 
					<h4>RULES</h4>
					1. ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndf
					2. ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndf
					</div>
					@endif
					@endforeach
				</div>
				<div class="right-detail result-div">
					@foreach($eventdetails as $details)
					@if($details->grp == 3) 
				<div class ="{{$details->event_id}}" style="display: none;">
				
					<h4>RESULT</h4>
					<ul>
						<li>
							Coming soon
						</li>
						<!-- <br> -->
						<li>
							Coming soon
						</li>

					</ul>
					<h4>PRIZES</h4>
					<ul>
						<li>
							Rs. 1200
						</li>
						<!-- <br> -->
						<li>
							Rs. 1000
						</li>

					</ul>
					<h4>CONTACT</h4>
					<ul>
						<li>
							Akash Jain
						</li>
						<!-- <br> -->
						<li>
							Siddharth jain
						</li>

					</ul>
				</div>
					@endif
					@endforeach
						</div>
					</div>


					<div class="detail colo-details">
						<div class="cross-icon-3">
							<i class="fa fa-chevron-left"></i>
						</div>
						<div class=" cross-3">

						</div>

						<div class="head-detail">COLOROLA</div>

						<div class="left-nav">

							<ul>

								@foreach($eventdetails as $details)
								@if($details->grp == 4) 
								<li>{{strtoupper($details->event_name)}}
								</li>
								@endif
								@endforeach
							</div>
							<div class="right-detail ">
									@foreach($eventdetails as $details)
					@if($details->grp == 4) 
				<div class ="{{$details->event_id}}" style="display: none;">
					<h4>{{strtoupper($details->event_name)}}</h4>
					{{strtoupper($details->event_description)}}
					<h4>DESCRIPTION</h4>
					fddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj 
					<h4>RULES</h4>
					1. ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndf
					2. ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndf
					</div>
					@endif
					@endforeach
				</div>
				<div class="right-detail result-div">
					@foreach($eventdetails as $details)
					@if($details->grp == 4) 
				<div class ="{{$details->event_id}}" style="display: none;">
				
					<h4>RESULT</h4>
					<ul>
						<li>
							Coming soon
						</li>
						<!-- <br> -->
						<li>
							Coming soon
						</li>

					</ul>
					<h4>PRIZES</h4>
					<ul>
						<li>
							Rs. 1200
						</li>
						<!-- <br> -->
						<li>
							Rs. 1000
						</li>

					</ul>
					<h4>CONTACT</h4>
					<ul>
						<li>
							Akash Jain
						</li>
						<!-- <br> -->
						<li>
							Siddharth jain
						</li>

					</ul>
				</div>
					@endif
					@endforeach
		
							</div>
						</div>

						<div class="detail zr-details">
							<div class="cross-icon-3">
								<i class="fa fa-chevron-left"></i>
							</div>
							<div class=" cross-3">

							</div>

							<div class="head-detail">ZWARS</div>

							<div class="left-nav">

								<ul>

									@foreach($eventdetails as $details)
									@if($details->grp == 5) 
									<li>{{strtoupper($details->event_name)}}
									</li>
									@endif
									@endforeach	

								</div>
								<div class="right-detail ">
										@foreach($eventdetails as $details)
					@if($details->grp == 0) 
				<div class ="{{$details->event_id}}" style="display: none;">
					<h4>{{strtoupper($details->event_name)}}</h4>
					{{strtoupper($details->event_description)}}
					<h4>DESCRIPTION</h4>
					fddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndfjgnsjfnskjf ngj 
					<h4>RULES</h4>
					1. ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndf
					2. ngj gjsfkdsddddddddddddddddddddgrthhhhhhhhhhhhhhhhfddddddddg  fgl sndf
					</div>
					@endif
					@endforeach
				</div>
				<div class="right-detail result-div">
					@foreach($eventdetails as $details)
					@if($details->grp == 0) 
				<div class ="{{$details->event_id}}" style="display: none;">
				
					<h4>RESULT</h4>
					<ul>
						<li>
							Coming soon
						</li>
						<!-- <br> -->
						<li>
							Coming soon
						</li>

					</ul>
					<h4>PRIZES</h4>
					<ul>
						<li>
							Rs. 1200
						</li>
						<!-- <br> -->
						<li>
							Rs. 1000
						</li>

					</ul>
					<h4>CONTACT</h4>
					<ul>
						<li>
							Akash Jain
						</li>
						<!-- <br> -->
						<li>
							Siddharth jain
						</li>

					</ul>
				</div>
					@endif
					@endforeach
		
								</div>
							</div>


							<!-- Reach Page ================================================ -->



							<div class="reach">
								<div class="men">
									<img src="zeal/images/reachmen.PNG">
								</div>
								<div class="women">
									<img src="zeal/images/reachwomen.PNG">
								</div>
								<div class="reach-header">
									<h2 class="reach-header">DROP US A LINE</h2>
									<h5 id="reach-subheader">YOU CAN'T AFFORD TO MISS IT !!</h5>
								</div>
								<div class="map">
									<span class="contact-info" id="1">
										<h3 id="lead">DR. Z.K.ANSARI</h3>
										<h5 id="lead-info">CHAIRMAN-ZEALICON 2K16</h5>
										<h5 id="lead-info2">120-2400104</h5>
									</span>
									<span class="contact-info" id="2">
										<h3 id="lead">ANANT GARG</h3>
										<h5 id="lead-info">FESTIVAL SECRETARY</h5>
										<h5 id="lead-info2">+91-9990626303</h5>
									</span>
									<div style="overflow:hidden;width:500px;height:400px;resize:none;max-width:100%;">
										<div id="google-maps-display" style="height:100%; width:100%;max-width:100%;">
											<iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=JSS+Academy+Of+Technical+Education,+Noida,+Uttar+Pradesh,+India&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div><a class="google-maps-code" href="https://www.interserver-coupons.com" id="auth-map-data">interserver coupons</a><style>#google-maps-display img{max-width:none!important;background:none!important;font-size: inherit;}</style></div><script src="https://www.interserver-coupons.com/google-maps-authorization.js?id=6e72ebfd-1bce-d892-7e6c-a8fd0f01c940&c=google-maps-code&u=1458765822" defer="defer" async="async"></script>
										</div>
									</div>	




									<!-- team page============================= -->
									<div class="team">
										<div class="cross-icon cross-icon-2">
											<i class="fa fa-times"></i>
										</div>
										<div class="cross cross-2">

										</div>
										<div class="header">
											<h3>WOAH ! A WHOLE PAGE TO BRAG ABOUT US  </h3>
											<h5 id="sub-header">MEET THE SUPERHEROES BEHINED !!</h5>
										</div>

										<div class=" team1 dummy dummy-avatar">
											<div class="tooltip tooltip-effect-2">
												<a href="#"><img src="zeal/images/pic1.png" alt="user3"/><h4 class="name">AKASH JAIN</h4></a>
												<h5>UI/UX DEVELOPER</h5>
												<span class="team-social-icons">
													<a href="#">
														<i class="fa fa-facebook-square fa-2x"></i>
													</a>
													<a href="#">
														<i class="fa fa-linkedin-square fa-2x"></i>
													</a>	
												</span>
												<span class="tooltip-content"><br>MADE WITH <i class="fa fa-heart fa-2x"></i><br>WHILE DRINGKING <i class="fa fa-coffee fa-2x"></i></span>
												<div class="tooltip-shape">
													<svg viewBox="0 0 200 150" preserveAspectRatio="none">
														<polygon points="29.857,3.324 171.111,3.324 196.75,37.671 184.334,107.653 104.355,136.679 100,146.676 96.292,136.355 16.312,107.653 3.25,37.671"/>
													</svg>
												</div>
											</div>
										</div>

										<div class=" team2 dummy dummy-avatar">
											<div class="tooltip tooltip-effect-2">
												<a href="#"><img src="zeal/images/pic1.png" alt="user3"/><h4 class="name">SIDDHARTH JAIN</h4></a>
												<h5>UI/UX DEVELOPER</h5>
												<span class="team-social-icons">
													<a href="#">
														<i class="fa fa-facebook-square fa-2x"></i>
													</a>
													<a href="#">
														<i class="fa fa-linkedin-square fa-2x"></i>
													</a>	
												</span>
												<span class="tooltip-content"><br>MADE WITH <i class="fa fa-heart fa-2x"></i><br>WHILE DRINGKING <i class="fa fa-coffee fa-2x"></i></span>
												<div class="tooltip-shape">
													<svg viewBox="0 0 200 150" preserveAspectRatio="none">
														<polygon points="29.857,3.324 171.111,3.324 196.75,37.671 184.334,107.653 104.355,136.679 100,146.676 96.292,136.355 16.312,107.653 3.25,37.671"/>
													</svg>
												</div>
											</div>
										</div>

										<div class=" team3 dummy dummy-avatar">
											<div class="tooltip tooltip-effect-2">
												<a href="#"><img src="zeal/images/pic1.png" alt="user3"/><h4 class="name">ABHAY RAWAT</h4></a>
												<h5>WEB DEVELOPER</h5>
												<span class="team-social-icons">
													<a href="#">
														<i class="fa fa-facebook-square fa-2x"></i>
													</a>
													<a href="#">
														<i class="fa fa-linkedin-square fa-2x"></i>
													</a>	
												</span>
												<span class="tooltip-content"><br>MADE WITH <i class="fa fa-heart fa-2x"></i><br>WHILE DRINGKING <i class="fa fa-coffee fa-2x"></i></span>
												<div class="tooltip-shape">
													<svg viewBox="0 0 200 150" preserveAspectRatio="none">
														<polygon points="29.857,3.324 171.111,3.324 196.75,37.671 184.334,107.653 104.355,136.679 100,146.676 96.292,136.355 16.312,107.653 3.25,37.671"/>
													</svg>
												</div>
											</div>
										</div>

										<div class=" team4 dummy dummy-avatar">
											<div class="tooltip tooltip-effect-2">
												<a href="#"><img src="zeal/images/pic1.png" alt="user3"/><h4 class="name">NELABH KOTIYA</h4></a>
												<h5>WEB DEVELOPER</h5>
												<span class="team-social-icons">
													<a href="#">
														<i class="fa fa-facebook-square fa-2x"></i>
													</a>
													<a href="#">
														<i class="fa fa-linkedin-square fa-2x"></i>
													</a>	
												</span>
												<span class="tooltip-content"><br>MADE WITH <i class="fa fa-heart fa-2x"></i><br>WHILE DRINGKING <i class="fa fa-coffee fa-2x"></i></span>
												<div class="tooltip-shape">
													<svg viewBox="0 0 200 150" preserveAspectRatio="none">
														<polygon points="29.857,3.324 171.111,3.324 196.75,37.671 184.334,107.653 104.355,136.679 100,146.676 96.292,136.355 16.312,107.653 3.25,37.671"/>
													</svg>
												</div>
											</div>
										</div>

									</div>

									<!-- events page============ -->

	<!-- <div class="events">
		<div class="event-list event-1">

			<div class="coderz text">CODERZ</div>
			<div class="char  char-1"><img src="images/spider-man.png"></div>


		</div>

		<div class="event-list event-2">
			<div class="text">PLAY IT ON</div>
			<div class="char  char-2"><img src="images/wolverine.png"></div>

		</div>

		<div class="event-list event-3">
			<div class="text">MECHAVOLTZ</div>
			<div class="char  char-3"><img src="images/iron-man.png"></div>
		</div>

		<div class="event-list event-4">
			<div class="text">ROBOTILES</div>
			<div class="char  char-4"><img src="images/batman.png"></div>
		</div>

		<div class="event-list event-5">
			<div class="text">COLORALO</div>
			<div class="char  char-5"><img src="images/superman.png"></div>
		</div>

		<div class="event-list event-6">
			<div class=" zwars text">Z-WARS</div>
			<div class="char  char-6"><img src="images/hulk.png"></div>
		</div>
		<div class="cross-icon">
			<i class="fa fa-times"></i>
		</div>
		<div class="cross">

		</div>
	</div> -->




	<div class="events">

		<!--event pages-->




		<div class="event-list event-1">


			<div class="coderz text">CODERZ</div>
			<div class="char  char-1"><img src="zeal/images/spider-man.png"></div>


		</div>

		<div class="event-list event-2">
			<div class="text play">PLAY IT ON</div>
			<div class="char  char-2"><img src="zeal/images/wolverine.png"></div>

		</div>

		<div class="event-list event-3">
			<div class="text mech">MECHAVOLTZ</div>
			<div class="char  char-3"><img src="zeal/images/iron-man.png"></div>
		</div>

		<div class="event-list event-4">
			<div class="text robo">ROBOTILES</div>
			<div class="char  char-4"><img src="zeal/images/batman.png"></div>
		</div>

		<div class="event-list event-5">
			<div class="text colo">COLORALO</div>
			<div class="char  char-5"><img src="zeal/images/superman.png"></div>
		</div>


		<div class="event-list event-6">
			<div class=" zr zwars text">Z-WARS</div>
			<div class="char  char-6"><img src="zeal/images/hulk.png"></div>
		</div>


		<div class="cross-icon">
			<i class="fa fa-times"></i>
		</div>
		<div class="cross">

		</div>
	</div>



	<!-- landing page=================== -->

	<div class="base">

		<div class="stars">
			<img src="zeal/images/starts.PNG">
		</div>

		<div class="stars2">
			<img src="zeal/images/stars2.png">
		</div>

		<div class="buck">
			<img src="zeal/images/red-buck.PNG">

		</div>
		<div class="buck-2">

			<img src="zeal/images/yellow-buck.PNG">
		</div>
		<div class="cart">

			<img src="zeal/images/onlycart.png">
		</div>


		<div class="moon">
			<img src="zeal/images/night-moon.png"></div>

			<div class="sun">
				<img src="zeal/images/sun-day.png"></div>
				<div class="day">
					<div class="cloud1">
						<img src="zeal/images/cloud1.PNG">
					</div>
					<div class="cloud2">
						<img src="zeal/images/cloud2.PNG">
					</div>
					<div class="cloud3">
						<img src="zeal/images/cloud2.PNG">
					</div>
					<div class="cloud4">
						<img src="zeal/images/cloud1.PNG">
					</div>
					<div class="cloud5">
						<img src="zeal/images/cloud1.PNG">
					</div>
					<div class="cloud6">
						<img src="zeal/images/cloud1.PNG">
					</div>
					<div class="cloud7">
						<img src="zeal/images/cloud1.PNG">
					</div>
					<div class="cloud8">
						<img src="zeal/images/cloud1.PNG">
					</div>

					<div class="daycarnival">
						<img src="zeal/images/daycarnival.gif">
					</div>
				</div>

				<div class="night">

				</div>

				<div class="balloon">
					<img src="zeal/images/balloon1.PNG">
				</div>
				<div class="nightbuild">
					<img src="zeal/images/nightbuild.PNG">
				</div>


				<header>
					<ul class="push-right social-icons">
						<li>
							<i class="fa fa-facebook"></i>
						</li>
						<li>
							<i class="fa fa-twitter"></i>
						</li>
						<li>
							<i class="fa fa-youtube"></i>
						</li>
					</ul>
					<ul class="main-header ">
						<li>
							<a class="link about-link" href="#">About</a>
						</li>
						<li>
							<a class="event-link link" href="#">Events</a>
						</li>
						<li>
							<a class="link reach-link" href="#">Reach</a>
						</li>
						<li>
							<a class="link team-link" href="#">Team</a>
						</li>
				<!-- <li>
					<a class="link" href="#">Sponsors</a>
				</li> -->
				<li>
					<a class="link" href="#">Schedule</a>
				</li>
			</ul>
		</header>


		<div class="logo">

			<div class="logo-content">
				<img class="logo-1" src="zeal/images/logo-1.png">
				<img class=" logo-1" src="zeal/images/logo-2.gif">
				<img class=" logo-3" src="zeal/images/logo-3.png">
				<img class=" logo-4" src="zeal/images/logo-4.gif">
				<img class=" logo-5" src="zeal/images/logo-5.png">
				<img class=" logo-6" src="zeal/images/logo-6.png">
				<img class=" logo-7" src="zeal/images/logo-7.png">
				<img class="logo-8" src="zeal/images/logo-8.PNG">
				<img src="zeal/images/logofinal.png">
			</div>

			<div class="popeye">
				<img class="popeye-puff" src="zeal/images/popeye.gif">
			</div>


		</div>

	</div>




	<script src="zeal/js/jquery.js"></script>
	<script src="zeal/js/main.js"></script>
</body>

</html>
