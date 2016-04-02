<html>

<head>
	<title>
		Zealicon-Annual Techno-Cultural Festival
	</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" type="image/x-icon" href="zeal/images/favicon.ico">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="zeal/css/main.css">
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />

</head>

<body>

	<!-- window- loader -->

	<div class="loader"><img src="zeal/images/Hamaraloader.gif">
		<h3>WARNING!</h3>
		<h4>AWESOMENESS LOADING</h4>
		<h5>BEST VIEW ON <i class = "fa fa-desktop"></i></h5>
	</div>
	<!-- sponsors -->
	<div class="sponsor">
		<div class="sponsor-head">
			<h2>COMING SOON</h2>
			<!-- <h5>PROUD TO HAVE YOU WITH US</h5> -->
		</div>
		<!-- <div class="sponsor-name">
			<img src="zeal/images/bubble.PNG">
			<a href="#"><h2 class="main-name">FATUCK EXPRESS</h2></a>
			<h1 class="coming">MORE COMING SOON....</h1>
		</div> -->
	</div>



	<!-- video -->

	<div class="vid">
		<div class="vid-cross-icon">
			<i class="fa fa-times"></i>
		</div>
		<div class="vid-cross ">

		</div>
		VIDEO COMING SOON!
	</div>


	<!------Register Page-------------------------------->	
	<div class="register">
		<div class="super">
			<img src="zeal/images/super.gif">
		</div>
		<div class="register-header">
			<h2 class="register-main">GET YOURSELF REGISTERED</h2>
			<h4 class="register-submain">IT 'S NEVER TOO LATE</h4>
		</div>
		<div class="form-group">
			<form>
				<div class="right-form">
					<label>
						<input id="name" type="text" placeholder="Name">
						<span>Name</span>
					</label>

					<label>
						<input id="email" type="email" placeholder="Email">
						<span>Email</span>
					</label>





					<label>
						<input type="text" id="contact" placeholder="Contact Number">
						<span>Contact</span>
					</label>
					<input type="hidden" name="_token" id = "token" value="{{ csrf_token() }}">

					<label>
						<input type="text"  placeholder="College" id="college">
						<span>College</span>
					</label>	
					<div class="warn-msg">
					</div>
					<input type="submit" value="Register" id="register_btn">

				</div>

				<div class="left-form">
					<select id="branch">
						<option selected="true" style="display:none;" value="">Branch</option>
						<option value="CSE">CSE</option>
						<option value="ECE">ECE</option>
						<option value="EE">EE</option>
						<option value="CE">CE</option>
						<option value="ME">ME</option>
						<option value="IT">IT</option>
						<option value="EEE">EEE</option>
						<option value="IC">IC</option>
						<option value="MT">MT</option>
						<option value="OTHER">OTHER</option>

					</select>
					<select id="year" >
						<option selected="true" style="display:none;" value="">Year</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="other">OTHER</option>

					</select>
					<select id="course">
						<option selected="true" style="display:none;" value="">Course</option>
						<option value="btech">B.Tech</option>
						<option value="mtech">M.Tech</option>
						<option value="mba">MBA</option>
						<option value="mam">MAM</option>
						<option value="mca">MCA</option>
						<option value="other">OTHER</option>

					</select>
				</div>	



			</form>
		</div>
	</div>
	





	<!-- About Page ================================================ -->
	<div class="about">
		<div class="about-bg"></div>
		<h2 class="about-header">ABOUT ZEALICON '16</h2>
		<p>Zealicon is the annual techno-cultural festival of JSS ATE, Noida . Dedicated to the celebration of creativity and science , it is a stimulating event brimming with youthful dynamism.It transforms the campus into a veritable kaleidoscope of people. Involving multifarious exciting events from technical scratch to cultural zeal.  A platform for all the creative minds to express their ideas in the form of events including  band performances, discussions, film screenings that are spread over three days. Apart from the exuberant cultural events, Zealicon is also known for its mind boggling  technical events that creates an ambience for the technocrats.<br><br>
			Zealicon 2016 is based upon the theme COMIC-CON, covering the aspects of hysterical face of literature along with popular arts , science and technology . This edition of Zealicon promises all the trademarks of the earlier versions. A plethora of events where academicians will vouch out their intellect and artists will showcase the best of art .  Projecting the fictitious gesture onto the real world, COMIC CON  will act as a connecting link between the fantasy and reality.<br><br>
			Creating an aura of avidity and togetherness , We hope that Zealicon 2016 will turn out to  be a memorable experience for you !
		</p>
		
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
				<li id = "a{{$details->event_id}}">{{strtoupper($details->event_name)}}
				</li>
				@endif
				@endforeach
			</ul>

		</div>
		<?php $i=0;?>
		<div class="right-detail ">
			@foreach($eventdetails as $details)
			@if($details->grp == 0) 
			@if($i==0)
			<div id ="{{$details->event_id}}">
				@else
				<div id ="{{$details->event_id}}"  style="display : none;">

					@endif
					<?php $i++;?>
					<h4>{{strtoupper($details->event_name)}}</h4>
					{!!substr($details->event_description,1,-1)!!}
					@if(isset($details->event_id))
					<h4>DESCRIPTION</h4>
					{!!substr($details->long_des,1,-1)!!}
					@endif
					@if(isset($details->rules))
					<h4>RULES</h4>
					<?php $i = 1;?>
						@foreach(json_decode($details->rules) as $rul)
						{{$i++}}. {{$rul}}</br>
						
						@endforeach				
					@endif
				</div>
				@endif
				@endforeach
			</div>
			<?php $i=0;?>

			<div class="right-detail result-div">
				@foreach($eventdetails as $details)
				@if($details->grp == 0) 
				@if($i==0)
				<div id ="r{{$details->event_id}}">
					@else
					<div id ="r{{$details->event_id}}"  style="display : none;">

						@endif


						<?php  $i++; ?>
							@if(isset($details->first_place))
						<h4>RESULT</h4>
						<ul>
							<li>
								{{$details->first_place}}
							</li>

							<li>
								{{$details->second_place}}
							</li>
						</ul>
							@endif	
							@if(isset($details->prize_money))
						<h4>PRIZES</h4>
						<ul>
							<li>
							{{json_decode($details->prize_money)[0]}}
							</li>
							<!-- <br> -->
							<li>
							{{json_decode($details->prize_money)[1]}}
							</li>

						</ul>
						@endif
						@if(isset($details->contact))
						<h4></h4>
						<ul>
							<li>
							</li>
							<!-- <br> -->
							<li>
							</li>

						</ul>
						@endif
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
					</ul>

				</div>

				<div class="right-detail ">
					<h4>COMING SOON</h4>


				</div>
				<div class="right-detail result-div">
					<h4>RESULT</h4>
					<ul>
						<li>
							Coming soon
						</li>
						<!-- <br> -->


					</ul>





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
					</ul>

				</div>

				<div class="right-detail ">
					<h4>COMING SOON</h4>


				</div>
				<div class="right-detail result-div">
					<h4>RESULT</h4>
					<ul>
						<li>
							Coming soon
						</li>
						<!-- <br> -->


					</ul>





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
					</ul>

				</div>

				<div class="right-detail ">
					<h4>COMING SOON</h4>


				</div>
				<div class="right-detail result-div">
					<h4>RESULT</h4>
					<ul>
						<li>
							Coming soon
						</li>
						<!-- <br> -->


					</ul>





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
					</ul>

				</div>

				<div class="right-detail ">
					<h4>COMING SOON</h4>


				</div>
				<div class="right-detail result-div">
					<h4>RESULT</h4>
					<ul>
						<li>
							Coming soon
						</li>
						<!-- <br> -->


					</ul>





				</div></div>

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
						</ul>

					</div>

					<div class="right-detail ">
						<h4>COMING SOON</h4>


					</div>
					<div class="right-detail result-div">
						<h4>RESULT</h4>
						<ul>
							<li>
								Coming soon
							</li>
							<!-- <br> -->


						</ul>





					</div></div>


					<!-- Reach Page ================================================ -->



					<div class="reach">

						<div class="women">
							<img src="zeal/images/menwomen.PNG">
						</div>
						<div class="reach-header">
							<h2 class="reach-header">REACH OUT TO US</h2>
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
							<span class="contact-info" id="1">
								<h3 id="lead">NIKHIL VERMA</h3>
								<h5 id="lead-info">TECHNICAL COORDINATOR</h5>
								<h5 id="lead-info2">+91-9953017515</h5>
							</span>

							<div style="position: absolute;overflow:hidden;width:670px;height:400px;resize:none;max-width:100%;right: 50px;">
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

								<div class="team-slider">
									<div class="left slider-arrow">
										<i class="fa fa-chevron-circle-left"></i>
									</div>
									<div class="right slider-arrow">
										<i class="fa fa-chevron-circle-right"></i>
									</div>
									<div class="team-slider-inner">

										<div class=" team1 dummy dummy-avatar">
											<div class="tooltip tooltip-effect-2">
												<a href="#"><img src="zeal/images/pic1.png" alt="user3"/><h4 class="name">ANANT GARG</h4></a>
												<h5>TEAM LEAD</h5>
												<span class="team-social-icons">
													<a href="https://www.facebook.com/infinitegarg" target="_blank">
														<i class="fa fa-facebook-square fa-2x"></i>
													</a>
													<a href="https://in.linkedin.com/in/infinitegarg"  target="_blank">
														<i class="fa fa-linkedin-square fa-2x"></i>
													</a>	
												</span>
												<span class="tooltip-content"><br>MADE WITH <i class="fa fa-heart fa-2x"></i><br>WHILE DRINKING <i class="fa fa-coffee fa-2x"></i></span>
												<div class="tooltip-shape">
													<svg viewBox="0 0 200 150" preserveAspectRatio="none">
														<polygon points="29.857,3.324 171.111,3.324 196.75,37.671 184.334,107.653 104.355,136.679 100,146.676 96.292,136.355 16.312,107.653 3.25,37.671"/>
													</svg>
												</div>
											</div>
										</div>

										<div class=" team2 dummy dummy-avatar">
											<div class="tooltip tooltip-effect-2">
												<a href="#"><img src="zeal/images/pic2.png" alt="user3"/><h4 class="name">NIKHIL VERMA</h4></a>
												<h5>TEAM LEAD</h5>
												<span class="team-social-icons">
													<a href="https://www.facebook.com/v.nikz143"  target="_blank">
														<i class="fa fa-facebook-square fa-2x"></i>
													</a>
													<a href="https://in.linkedin.com/in/vrmanikhil"  target="_blank">
														<i class="fa fa-linkedin-square fa-2x"></i>
													</a>	
												</span>
												<span class="tooltip-content"><br>MADE WITH <i class="fa fa-heart fa-2x"></i><br>WHILE DRINKING <i class="fa fa-coffee fa-2x"></i></span>
												<div class="tooltip-shape">
													<svg viewBox="0 0 200 150" preserveAspectRatio="none">
														<polygon points="29.857,3.324 171.111,3.324 196.75,37.671 184.334,107.653 104.355,136.679 100,146.676 96.292,136.355 16.312,107.653 3.25,37.671"/>
													</svg>
												</div>
											</div>
										</div>

										<div class=" team3 dummy dummy-avatar">
											<div class="tooltip tooltip-effect-2">
												<a href="https://www.facebook.com/deshrajdry"><img src="zeal/images/pic3.png" alt="user3"/><h4 class="name">DESHRAJ YADAV</h4></a>
												<h5>TEAM LEAD</h5>
												<span class="team-social-icons">
													<a href="https://www.facebook.com/deshrajdry"  target="_blank"> 
														<i class="fa fa-facebook-square fa-2x"></i>
													</a>
													<a href="https://in.linkedin.com/in/deshraj-yadav-34325975"  target="_blank">
														<i class="fa fa-linkedin-square fa-2x"></i>
													</a>	
												</span>
												<span class="tooltip-content"><br>MADE WITH <i class="fa fa-heart fa-2x"></i><br>WHILE DRINKING <i class="fa fa-coffee fa-2x"></i></span>
												<div class="tooltip-shape">
													<svg viewBox="0 0 200 150" preserveAspectRatio="none">
														<polygon points="29.857,3.324 171.111,3.324 196.75,37.671 184.334,107.653 104.355,136.679 100,146.676 96.292,136.355 16.312,107.653 3.25,37.671"/>
													</svg>
												</div>
											</div>
										</div>
										<div class=" team3 dummy dummy-avatar">
											<div class="tooltip tooltip-effect-2">
												<a href="#" ><img src="zeal/images/pic4.png" alt="user3"/><h4 class="name">AKASH JAIN</h4></a>
												<h5>UI/UX DEVELOPER</h5>
												<span class="team-social-icons">
													<a href="https://www.facebook.com/akashjain993"  target="_blank">
														<i class="fa fa-facebook-square fa-2x"></i>
													</a>
													<a href="https://in.linkedin.com/in/jainakashin"  target="_blank">
														<i class="fa fa-linkedin-square fa-2x"></i>
													</a>	
												</span>
												<span class="tooltip-content"><br>MADE WITH <i class="fa fa-heart fa-2x"></i><br>WHILE DRINKING <i class="fa fa-coffee fa-2x"></i></span>
												<div class="tooltip-shape">
													<svg viewBox="0 0 200 150" preserveAspectRatio="none">
														<polygon points="29.857,3.324 171.111,3.324 196.75,37.671 184.334,107.653 104.355,136.679 100,146.676 96.292,136.355 16.312,107.653 3.25,37.671"/>
													</svg>
												</div>
											</div>
										</div>
										<div class=" team3 dummy dummy-avatar">
											<div class="tooltip tooltip-effect-2">
												<a href="#"><img src="zeal/images/pic5.png" alt="user3"/><h4 class="name">SIDDHARTH JAIN</h4></a>
												<h5>UI/UX DEVELOPER</h5>
												<span class="team-social-icons">
													<a href="https://in.linkedin.com/in/siddharth-jain-67a020b8"  target="_blank">
														<i class="fa fa-facebook-square fa-2x"></i>
													</a>
													<a href="https://www.facebook.com/siddharth.jain.2901"  target="_blank">
														<i class="fa fa-linkedin-square fa-2x"></i>
													</a>	
												</span>
												<span class="tooltip-content"><br>MADE WITH <i class="fa fa-heart fa-2x"></i><br>WHILE DRINKING <i class="fa fa-coffee fa-2x"></i></span>
												<div class="tooltip-shape">
													<svg viewBox="0 0 200 150" preserveAspectRatio="none">
														<polygon points="29.857,3.324 171.111,3.324 196.75,37.671 184.334,107.653 104.355,136.679 100,146.676 96.292,136.355 16.312,107.653 3.25,37.671"/>
													</svg>
												</div>
											</div>
										</div>

										<div class=" team3 dummy dummy-avatar">
											<div class="tooltip tooltip-effect-2">
												<a href="#"><img src="zeal/images/pic6.png" alt="user3"/><h4 class="name">ABHAY RAWAT</h4></a>
												<h5>WEB DEVELOPER</h5>
												<span class="team-social-icons">
													<a href="https://www.facebook.com/abhayRAW"  target="_blank">
														<i class="fa fa-facebook-square fa-2x"></i>
													</a>
													<a href="https://in.linkedin.com/in/abhay-rawat-084104b8"  target="_blank">
														<i class="fa fa-linkedin-square fa-2x"></i>
													</a>	
												</span>
												<span class="tooltip-content"><br>MADE WITH <i class="fa fa-heart fa-2x"></i><br>WHILE DRINKING <i class="fa fa-coffee fa-2x"></i></span>
												<div class="tooltip-shape">
													<svg viewBox="0 0 200 150" preserveAspectRatio="none">
														<polygon points="29.857,3.324 171.111,3.324 196.75,37.671 184.334,107.653 104.355,136.679 100,146.676 96.292,136.355 16.312,107.653 3.25,37.671"/>
													</svg>
												</div>
											</div>
										</div>

										<div class=" team4 dummy dummy-avatar">
											<div class="tooltip tooltip-effect-2">
												<a href="#"><img src="zeal/images/pic7.png" alt="user3"/><h4 class="name">NELABH KOTIYA</h4></a>
												<h5>WEB DEVELOPER</h5>
												<span class="team-social-icons">
													<a href="https://www.facebook.com/nelabhk"  target="_blank">
														<i class="fa fa-facebook-square fa-2x"></i>
													</a>
													<a href="https://in.linkedin.com/in/nelabhkotiya"  target="_blank">
														<i class="fa fa-linkedin-square fa-2x"></i>
													</a>	
												</span>
												<span class="tooltip-content"><br>MADE WITH <i class="fa fa-heart fa-2x"></i><br>WHILE DRINKING <i class="fa fa-coffee fa-2x"></i></span>
												<div class="tooltip-shape">
													<svg viewBox="0 0 200 150" preserveAspectRatio="none">
														<polygon points="29.857,3.324 171.111,3.324 196.75,37.671 184.334,107.653 104.355,136.679 100,146.676 96.292,136.355 16.312,107.653 3.25,37.671"/>
													</svg>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>





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
											<div class="day-balloon">
												<img src="zeal/images/dayballoon.PNG">
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
													<a href="http://www.facebook.com/zealicon/" target="_blank"><i class="fa fa-facebook"></i></a>
												</li>
												<li>
													<a href="http://twitter.com/zealicon" target="_blank"><i class="fa fa-twitter"></i></a>
												</li>
												<li>
													<a href="zeal/brochure.pdf" download><i class="fa fa-download"></i></a>
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
												<li>
													<a class="link sponsor-link" href="#">Sponsors</a>
												</li>
												<li>
													<a class="link register-link" href="#">Register</a>
												</li>
												<li>
													<a class="link video-link" href="#">Video</a>
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
									<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
									<script src="zeal/js/main.js"></script>

									<script type="text/javascript">

										@foreach($eventdetails as $details)
										$('#a{{$details->event_id}}').click(function(){
											@foreach($eventdetails as $dummdetails)
											@if($details->event_id == $dummdetails->event_id)
											setTimeout(function() {
												$('#{{$details->event_id}}').hide().fadeIn();
												$('#r{{$details->event_id}}').hide().fadeIn();		

											},500);

											@else
											$('#{{$dummdetails->event_id}}').fadeOut();
											$('#r{{$dummdetails->event_id}}').fadeOut();		

											@endif
											@endforeach
										});
										@endforeach
									</script>

								</body>

								</html>
