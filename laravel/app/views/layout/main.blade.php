<!DOCTYPE html>
<html lang="en">
	<head>
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<meta name = "format-detection" content = "telephone=no" />

<link rel="icon" href="{{ asset('favicon.ico') }}">
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
	<!--<link rel="icon" href="images/favicon.ico">
	<link rel="shortcut icon" href="images/favicon.ico" />
	<link rel="stylesheet" href="css/form.css">-->
	{{HTML::style('css/form.css')}}
	{{HTML::style('css/thumbs.css')}}
	{{HTML::style('css/slider.css')}}
	{{HTML::style('css/style.css')}}
	
	<!--<link rel="stylesheet" href="css/thumbs.css">
	<link rel="stylesheet" href="css/slider.css">
	<link rel="stylesheet" href="css/style.css">-->
   
	{{HTML::script('js/jquery.js')}}
	{{HTML::script('js/jquery-migrate-1.2.1.js')}}
	{{HTML::script('js/script.js')}}
	{{HTML::script('js/superfish.js')}}
	{{HTML::script('js/sForm.js')}}
	{{HTML::script('js/jquery.ui.totop.js')}}
	{{HTML::script('js/jquery.equalheights.js')}}
	{{HTML::script('js/jquery.easing.1.3.js')}}
	{{HTML::script('js/jquery.iosslider.min.js')}}
	{{HTML::script('js/livevalidation_standalone.js')}}
	
	<!--<script type="text/javascript" src="formToWizard.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/jquery-migrate-1.2.1.js"></script>
	<script src="js/script.js"></script>
	<script src="js/superfish.js"></script>
	<script src="js/sForm.js"></script>
	<script src="js/jquery.ui.totop.js"></script>
	<script src="js/jquery.equalheights.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.iosslider.min.js"></script>-->

	
	<script>
	$(document).ready(function(){
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>

	</head>



<body class="page1" id="top">

<header>
	<div class="container_12">
		<div class="grid_12">
			<h1>
				<a href="{{ URL::route('home') }}">
					{{HTML::image('images/logo.png','Your Happy Family')}}
			    </a>
			</h1>

<div class="menu_block ">
<a href="{{URL::route('donate')}}" class="donate">DONATE</a> 
<a href="{{URL::route('volunteer')}}" class="donate" style="float: left; margin-left: 12px;">Volunteer</a>
@include('layout.nav')
<div class="clear"></div>
<nav class="horizontal-nav full-width horizontalNav-notprocessed">
	<ul class="sf-menu">
		<li class="current"><a href="{{ URL::route('home') }}">Home</a></li>
		<li><a href="{{route('index1')}}">What We Do</a></li>
		<li><a href="{{route('index2')}}">Media</a></li>
		<li><a href="{{route('index3')}}">Get Involved</a></li>
		<li><a href="{{route('index4')}}">Contacts</a></li>
	</ul>
</nav>
<div class="clear"></div>
</div>
</div>
</header>


@yield('slider')


<!--conent goes here -->
<div class="content">
	@if(Session::has('global'))]
		<br>
		<div style="margin-left:30%">
        	 <h1 style="font-weight: normal;
font-family: inherit;
font-style: oblique;
font-size: 24px;
color: #ED6931;">{{ Session::get('global') }}</h1>
        </div>
 @endif

 @yield('content')
</div>

<div class="bottom_block">
			<div class="container_12">
				<div class="grid_4">
					<h3>Stay Informed</h3>
					<div class="text1">Subscribe to Our Newsletter</div>
					<form id="newsletter">
						<div class="rel">
							<div class="success">Your subscribe request has been sent!</div>
							<label class="email">
								<input type="email" value="Enter your Email" >
								<span class="error">*This is not a valid email address.</span>
							</label>
						</div>
						<a href="#" class="btn" data-type="submit">Submit</a>
					</form>
				</div>
				<div class="grid_5 prefix_3">
					<h3>Stay Connected ! </h3>
					<div class="text1">Follow Us on Social Media Accounts </div>
					
					<div class="socials">
						<a href="//www.twitter.com" target="_blank"><div class="fa fa-twitter"></div></a>
						<a href="//www.facebook.com/yuvabengaluru" target="_blank"><div class="fa fa-facebook"></div></a>
						<a href="#"><div class="fa fa-pinterest-square"></div></a>
						<a href="//www.google.co.in/search?q=ngo&oq=ngo&aqs=chrome..69i57j69i59l2j0l3.3393j0j9&sourceid=chrome&es_sm=93&ie=UTF-8" target="_blank"><div class="fa fa-google-plus"></div></a>
						<a href="#"><div class="fa fa-instagram"></div></a>
					</div>
				</div>
			</div>
		</div>
<!--==============================footer=================================-->
		<footer>
			<div class="container_12">
				<div class="grid_12">
					<div class="copy">
						Life &copy; 2014 | <a href="#">Privacy Policy</a> 
					</div>
				</div>
			</div>
		</footer>
		<script src="js/jquery.hoverdir.js"></script>
		<script>
		$(document).ready(function() {
		 $('.iosSlider').iosSlider({
			desktopClickDrag: true,
			snapToChildren: true,
			navSlideSelector: '.sliderContainer .slideSelectors .item',
			onSlideComplete: slideComplete,
			onSliderLoaded: sliderLoaded,
			onSlideChange: slideChange,
			scrollbar: false,
			autoSlide: true,
			autoSlideTimer: 3300,
			infiniteSlider: true
		 });
		});
		function slideChange(args) {
		 $('.sliderContainer .slideSelectors .item').removeClass('selected');
		 $('.sliderContainer .slideSelectors .item:eq(' + (args.currentSlideNumber - 1) + ')').addClass('selected');
		}
		function slideComplete(args) {
		 if(!args.slideChanged) return false;
		 $(args.sliderObject).find('.text1, .text2').attr('style', '');
		 $(args.currentSlideObject).find('.text1').animate({
			right: '100px',
			opacity: '0.72'
		 }, 400, 'easeOutQuint');
		 $(args.currentSlideObject).find('.text2').delay(200).animate({
			right: '70px',
			opacity: '0.72'
		 }, 400, 'easeOutQuint');
		}
		function sliderLoaded(args) {
		 $(args.sliderObject).find('.text1, .text2').attr('style', '');
		 $(args.currentSlideObject).find('.text1').animate({
			right: '100px',
			opacity: '0.72'
		 }, 400, 'easeOutQuint');
		 $(args.currentSlideObject).find('.text2').delay(200).animate({
			right: '70px',
			opacity: '0.72'
		 }, 400, 'easeOutQuint');
		 slideChange(args);
		}
		$(function() {
				$(' #da-thumbs > li ').each( function() { $(this).hoverdir(); } );
			});
		</script>
	</body>
</html>	

