<!DOCTYPE HTML>
<!--
	Photon by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>{{env('APP_NAME')}}</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="photon/assets/css/main.css" />
		<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
		<link rel="manifest" href="/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
		<noscript><link rel="stylesheet" href="photon/assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Header -->
			<section id="header">
				<div class="inner">
					<span class="icon major fa-cloud"></span>
					<h1>Welcome to <strong>{{env('APP_NAME')}}</strong>, the world's first black owned <br />
					encrypted cloud and communications platform.</h1>
					<p>A private encrypted cloud platform for your business needs</p>
					<ul class="actions special">
						<li><a href="#one" class="button scrolly">Discover</a></li>
					</ul>
				</div>
			</section>

		<!-- One -->
			<section id="one" class="main style1">
				<div class="container">
					<div class="row gtr-150">
						<div class="col-6 col-12-medium">
							<header class="major">
								<h2>A full suite cloud platform<br />
								without the intrusive data mining</h2>
							</header>
							<p>Every business needs cloud services. That being said your data should be completely owned by you and left alone. {{env('APP_NAME')}} offers a suite of productivity and office tools that allows you to seamlessly operate your business.</p>
						</div>
						<div class="col-6 col-12-medium imp-medium">
							<span class="image fit"><img src="https://images.pexels.com/photos/1181316/pexels-photo-1181316.jpeg?cs=srgb&dl=adult-business-data-1181316.jpg&fm=jpg" alt="" /></span>
						</div>
					</div>
				</div>
			</section>

		<!-- Two -->
			<section id="two" class="main style2">
				<div class="container">
					<div class="row gtr-150">
						<div class="col-6 col-12-medium">
							<ul class="major-icons">
								<li><span class="icon style1 major fa-code"></span></li>
								<li><span class="icon style2 major fa-bolt"></span></li>
								<li><span class="icon style3 major fa-camera-retro"></span></li>
								<li><span class="icon style4 major fa-cog"></span></li>
								<li><span class="icon style5 major fa-desktop"></span></li>
								<li><span class="icon style6 major fa-calendar"></span></li>
							</ul>
						</div>
						<div class="col-6 col-12-medium">
							<header class="major">
								<h2>Full of features<br />
								to make everything a breeze</h2>
							</header>
							<p>Developer friendly - {{env('APP_NAME')}} offers a well documented API so you can write your own homegrown applications to extend the functionality of your business applications!</p>
							<p>Encrypted services - All of your data is encrypted and our conferencing application is end-to-end encrypted. You never have to worry about the security of your work.</p>
							<p>Office tools - With the ability to upload and edit documents with collaborators, schedule appointments and more! {{env('APP_NAME')}} has all the tools you need to run your virtual office. </p>
						</div>
					</div>
				</div>
			</section>

		<!-- Three -->
			<section id="three" class="main style1 special">
				<div class="container">
					<header class="major">
						<h2>Why should you switch to {{env('APP_NAME')}}</h2>
					</header>
					<p>Here are just a few reasons</p>
					<div class="row gtr-150">
						<div class="col-4 col-12-medium">
							<span class="image fit"><img src="images/pic02.jpg" alt="" /></span>
							<h3>Simple pricing</h3>
							<p>$20/mo standard fee gets you full access to the {{env('APP_NAME')}} system! </p>
							<ul class="actions special">
								<li><a href="{{url('/pricing')}}" class="button">More</a></li>
							</ul>
						</div>
						<div class="col-4 col-12-medium">
							<span class="image fit"><img src="images/pic03.jpg" alt="" /></span>
							<h3>New updates added regularly</h3>
							<p>We are constantly adding new functionality to the {{env('APP_NAME')}} infrastructure	.</p>
							<ul class="actions special">
								<li><a href="{{url('/features')}}" class="button">More</a></li>
							</ul>
						</div>
						<div class="col-4 col-12-medium">
							<span class="image fit"><img src="images/pic04.jpg" alt="" /></span>
							<h3>Transparency</h3>
							<p>We are very open with our customers. Our lines of communication are also open!</p>
							<ul class="actions special">
								<li><a href="{{url('/contact')}}" class="button">More</a></li>
							</ul>
						</div>
					</div>
				</div>
			</section>

		<!-- Four -->
			<section id="four" class="main style2 special">
				<div class="container">
					<header class="major">
						<h2>Would you like to try us out?</h2>
					</header>
					<p>Sign up and get a free 3-day trial.</p>
					<ul class="actions special">
						<li><a href="{{url('/register')}}" class="button wide primary">Sign Up</a></li>
						<li><a href="{{url('/pricing')}}" class="button wide">Learn More</a></li>
					</ul>
				</div>
			</section>


		<!-- Footer -->
			<section id="footer">
				<ul class="icons">
					<li><a href="https://twitter.com/mastashake08" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="https://facebook.com/jyroneparker" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
					<li><a href="https://instagram.com/mastashake08" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="https://github.com/mastashake08" class="icon alt fa-github"><span class="label">GitHub</span></a></li>
					<li><a href="https://youtube.com/c/jyroneparker" class="icon alt fa-youtube"><span class="label">Email</span></a></li>
				</ul>
				<ul class="copyright">
					<li>&copy; {{env('APP_NAME')}}</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
				</ul>
			</section>

		<!-- Scripts -->
			<script src="photon/assets/js/jquery.min.js"></script>
			<script src="photon/assets/js/jquery.scrolly.min.js"></script>
			<script src="photon/assets/js/browser.min.js"></script>
			<script src="photon/assets/js/breakpoints.min.js"></script>
			<script src="photon/assets/js/util.js"></script>
			<script src="photon/assets/js/main.js"></script>

	</body>
</html>
