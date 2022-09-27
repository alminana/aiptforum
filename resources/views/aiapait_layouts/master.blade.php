<!DOCTYPE html>


<html lang="zxx">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Aipt,patent,aiptpatent,aiptlaw">
  <meta name="author" content="">

  <title>aiAPaiT</title>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />
          <!--font-awesome.min.css-->
		  <link rel="stylesheet" href="{{asset('aiapait/assets/css/font-awesome.min.css')}}">

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{asset('aiapait/plugins/bootstrap/css/bootstrap.min.css')}}">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="{{asset('aiapait/plugins/themify/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('aiapait/plugins/fontawesome/css/all.css')}}">
  <link rel="stylesheet" href="{{asset('aiapait/plugins/magnific-popup/dist/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('aiapait/plugins/modal-video/modal-video.css')}}">
    <link rel="stylesheet" href="{{asset('aiapait/plugins/animate-css/animate.css')}}">
  <!-- Slick Slider  CSS -->
  <link rel="stylesheet" href="{{asset('aiapait/plugins/slick-carousel/slick/slick.css')}}">
  <link rel="stylesheet" href="{{asset('aiapait/plugins/slick-carousel/slick/slick-theme.css')}}">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{asset('aiapait/css/style.css')}}">

</head>

<body>
        <!-- Navbar -->
        @include("aiapait_layouts.layouts.nav")
        <!-- Slider header Start -->
        <!-- @include("aiapait_layouts.layouts.header") -->

        <!-- home start -->
        @yield("content")


		<!--contact start-->
	    	@include("aiapait_layouts.layouts.contact")
        <!-- footer Start -->
        @include("aiapait_layouts.layouts.footer")

   

    <!-- 
    Essential Scripts
    =====================================-->

    
    <!-- Main jQuery -->
    <script src="{{asset('aiapait/plugins/jquery/jquery.js')}}"></script>
    <script src="{{asset('aiapait/js/contact.js"')}}></script>
    <!-- Bootstrap 4.3s.2 -->
    <script src="{{asset('aiapait/plugins/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('aiapait/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
   <!--  Magnific Popup-->
    <script src="{{asset('aiapait/plugins/magnific-popup/dist/jquery.magnific-popup.min.js')}}"></script>
    <!-- Slick Slider -->
    <script src="plugins/slick-carousel/slick/slick.min.js"></script>
    <!-- Counterup -->
    <script src="plugins/counterup/jquery.waypoints.min.js"></script>
    <script src="plugins/counterup/jquery.counterup.min.js"></script>

     <script src="plugins/modal-video/modal-video.js"></script>
    <!-- Google Map -->
    <script src="plugins/google-map/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>    
    
    <script src="{{asset('aiapait/js/script.js')}}"></script>
  </body>
  </html>
