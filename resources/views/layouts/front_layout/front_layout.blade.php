<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, shrink-to-fit=no">

<meta name="description" content="website app template description can be written">
<meta name="keywords" content="">
<meta name=”theme-color” content=”#0d6efd>
<meta name="apple-mobile-web-app-capable" content="yes"> 

<title>PantryShop</title>

<link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">

<!-- Bootstrap -->
<link href="css/front_css/bootstrap.css" rel="stylesheet" type="text/css"/>

<!-- custom style -->
<link href="css/front_css/ui.css" rel="stylesheet" type="text/css"/>

<!-- Fonticon -->
<link href="fonts/front/css/round.css" rel="stylesheet" type="text/css" />

</head>
<body>

<!-- Preloader-->
<div class="preloader" id="preloader">
    <div class="spinner-grow" role="status">
	  <span class="visually-hidden">Loading...</span>
	</div>
</div>
<!-- Preloader //end -->

@include('layouts.front_layout.front_header')

@yield('content')

@include('layouts.front_layout.front_sidebar')

@include('layouts.front_layout.front_footer')


<!-- jQuery -->
<script src="js/front_js/jquery-3.5.0.min.js" type="text/javascript"></script>

<!-- Bootstrap 5 JS -->
<script src="js/front_js/bootstrap.bundle.js" type="text/javascript"></script>

<!-- custom javascript -->
<script src="js/front_js/script.js" type="text/javascript"></script>
<script src="js/front_js/front_script.js" type="text/javascript"></script>

<!-- PWA -->
<script src="js/front_js/pwa.js"></script>

</body>
</html>