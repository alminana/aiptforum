<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>AIPAIT</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{asset('docketing_layout/css/bootstrap.css')}}" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Raleway:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="{{asset('docketing_layout/css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset('docketing_layout/css/responsive.css')}}" rel="stylesheet" />
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.html">

          </a>
          <div class="navbar-collapse" id="">
            <ul class="navbar-nav justify-content-between ">
              <div class="User_option">
                <li class="">
                  <a class="mr-4" href="">
                 
                  </a>
                  <a class="" href="">
                  
                  </a>
                </li>
              </div>
            </ul>
        
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
      <div class="container">
        <div class="row">
          <div class="col-md-4 offset-md-1">
            <div class="detail-box">
				<div >
				<!-- <img src="{{asset('logo/logo.JPG')}}" style="weight:50px;height:50px;" alt="logo icon"> -->
				<br>
				</div>
              <h1>
                <span>AIPT</span> <br>
                Docketing<br>
                System
              </h1>
              <p>
              </p>
              <div class="btn-box">
			  @guest
			   <a  href="{{route('login')}}"  class="btn btn-main">Login</a>
                    @endguest
                @auth
				<a class="btn btn-main" href="/dashboard">Dashboard
				</a>
				<a class="btn btn-main" onclick="event.preventDefault();
                    document.getElementById('nav-logout-form').submit()" 
                    href="#">Logout</a>

                <form id="nav-logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
                </li>
                </ul>
                 </li>
                @endauth
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>
  <script type="text/javascript" src="{{asset('docketing_layout/js/jquery-3.4.1.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('docketing_layout/js/bootstrap.js')}}"></script>
  <script type="text/javascript" src="{{asset('docketing_layout/js/custom.js')}}"></script>


</body>

</html>