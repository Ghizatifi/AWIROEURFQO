@extends('FrontEnd.layout.Header.header')


<!-- Hero-area -->
	<div class="hero-area section">

		<!-- Backgound Image -->
		<div class="bg-image bg-parallax overlay" style="background-image:url(frontEnd/img/page-background.jpg)"></div>
		<!-- /Backgound Image -->

		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 text-center">
					<ul class="hero-area-tree">
						<li><a href="index.html">Home</a></li>
						<li>Contact</li>
					</ul>
					<h1 class="white-text">Get In Touch</h1>

				</div>
			</div>
		</div>

	</div>
	<!-- /Hero-area -->
	<!-- Contact -->
		<div id="contact" class="section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<!-- contact form -->
					<div class="col-md-6">
						<div class="contact-form">
							<h4>Envoyer un Message</h4>
							<form action="{{ url('contactB') }}" method="POST">
								 {{ csrf_field() }}
								<input class="input" id="name" type="text" name="name" placeholder="Nom">
								<input class="input"id="email" type="email" name="email" placeholder="Email">
								<input class="input" id="subject" type="text" name="subject" placeholder="Sujet">
								<textarea class="input" id="message" name="message" placeholder="Votre message"></textarea>
								<button class="main-button icon-button pull-right">Envoyer</button>
							</form>
						</div>
					</div>
					<!-- /contact form -->

					<!-- contact information -->
					<div class="col-md-5 col-md-offset-1">
						<h4>Contactez l'École....</h4>
						<ul class="contact-details">
							<li><i class="fa fa-envelope"></i>Educate@gmail.com</li>
							<li><i class="fa fa-phone"></i>05-24-24-24-24</li>
							<li><i class="fa fa-map-marker"></i>216 Mly smail Marrakech</li>
						</ul>

						<!-- contact map -->
						<!-- <div id="contact-map"></div> -->
						<div style="width: 500px; height: 500px;">
							{!! Mapper::render() !!}
						</div>

						<!-- /contact map -->

					</div>
					<!-- contact information -->

				</div>
				<!-- /row -->

			</div>
			<!-- /container -->

		</div>
		<!-- /Contact -->

	@extends('FrontEnd.layout.Footer.footer')
