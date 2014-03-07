<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	@include('includes.header')
</head>
<body>
	<header>
		@include('includes.navigation')
	</header>
	
	<section role="main">
		<div class="row">
			<div id="main-sidebar" class="large-3 medium-4 columns">
				@include('includes.sidebar')
			</div>
			
			<div id="main-content" class="large-9 medium-8 columns">
				@yield('content')
			</div>
		</div>
	</section>
	
	<footer>
		@include('includes.footer')
	</footer>
</body>
</html>