<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Bloxic Furniture Business HTML-5 Template | Homepage 01</title>
<!-- Stylesheets -->
@include('layouts.shop._includes.styles')
@stack('css')
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

</head>

<body>

<div class="page-wrapper">

    {{-- @include('layouts.shop._includes.preloader') --}}

 	@include('layouts.shop._includes.header')

	@include('layouts.shop._includes.sidebar')

    {{ $slot }}

	@include('layouts.shop._includes.footer')

</div>
<!-- End PageWrapper -->

<!-- Search Popup -->
<div class="search-popup">
	<div class="color-layer"></div>
	<button class="close-search"><span class="fa fa-arrow-up"></span></button>
	<form method="post" action="blog.html">
		<div class="form-group">
			<input type="search" name="search-field" value="" placeholder="Search Here" required="">
			<button type="submit"><i class="fa fa-search"></i></button>
		</div>
	</form>
</div>
<!-- End Search Popup -->

<!-- Scroll To Top -->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-up"></span></div>

@include('layouts.shop._includes.scripts')
@stack('js')

<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->

</body>
</html>
