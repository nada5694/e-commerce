<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="favicon.png">

	<meta name="description" content="" />
	<meta name="keywords" content="" />

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,400;0,700;1,700&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="/assets/website/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/website/css/animate.min.css">
	<link rel="stylesheet" href="/assets/website/css/owl.carousel.min.css">
	<link rel="stylesheet" href="/assets/website/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="/assets/website/css/jquery.fancybox.min.css">
	<link rel="stylesheet" href="/assets/website/css/style.css"> <!-- ICO moon font -->
	<link rel="stylesheet" href="/assets/website/css/flaticon.css"> <!-- flat icon font -->
	<link rel="stylesheet" href="/assets/website/css/aos.css">
	<link rel="stylesheet" href="/assets/website/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="/assets/website/images/" type="image/x-icon">

    <title>@yield('title')</title>
</head>
<body>
    @include("layouts.website.header") <!-- STATIC only for the header -->

    <div>
        @yield('content') <!-- The yield is DYNAMIC with all the pages in the website (in inspect elements its div called "container") -->
    </div>

    @include("layouts.website.footer") <!-- STATIC only for the footer -->

	<script src="/assets/website/js/jquery-3.4.1.min.js"></script>
	<script src="/assets/website/js/popper.min.js"></script>
	<script src="/assets/website/js/bootstrap.min.js"></script>
	<script src="/assets/website/js/owl.carousel.min.js"></script>
	<script src="/assets/website/js/jquery.animateNumber.min.js"></script>
	<script src="/assets/website/js/jquery.waypoints.min.js"></script>
	<script src="/assets/website/js/jquery.fancybox.min.js"></script>
	<script src="/assets/website/js/jquery.sticky.js"></script>
	<script src="/assets/website/js/aos.js"></script>
	<script src="/assets/website/js/custom.js"></script>
</body>
</html>
