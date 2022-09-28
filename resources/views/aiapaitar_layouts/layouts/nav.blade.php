<nav class="navbar navbar-expand-lg py-4 navigation header-padding " id="navbar">
		<div class="container">
		  <a class="navbar-brand" href="index.html">
			<img src="{{asset('aiapait/images/logo.png')}}" style="align-items: flex-end; margin-top: 0%; padding-top: 0px; height: 200px;width: 450px;"  alt="" class="img-fluid">
		</a>

		  <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
			<span class="fa fa-bars"></span>
		  </button>
	  
		  <div class="collapse navbar-collapse" id="navbarsExample09">
			<ul class="navbar-nav m-auto">
			  <li class="nav-item active">
				<!-- <a class="nav-link btn btn-solid-border" href="index.html">Home <span class="sr-only">(current)</span></a> -->
			  </li>
			   <!-- <li class="nav-item"><a class="nav-link btn btn-solid-border"  href="about.html">About</a></li> -->
			    <!-- <li class="nav-item"><a class="nav-link btn btn-solid-border" href="service.html">Services</a></li>
				<li class="nav-item"><a class="nav-link btn btn-solid-border" href="news.html">News</a></li>
			   <li class="nav-item"><a class="nav-link btn btn-solid-border" href="contact.html">Contact</a></li>
			   <li class="nav-item"><a class="nav-link btn btn-solid-border d-none d-lg-block" href="index(ar).html">Arabic <i class="fa fa-angle-right ml-2"></i></a></li> -->
			   <a href="{{route('homear')}}" class="nav-link btn btn-main">Home</a>
			   <a href="{{route('aboutar')}}"  class=" btn btn-main">About</a>
			   <a href="{{route('servicear')}}" id="service" class="btn btn-main">Services</a>
			   <a href="{{route('newsar')}}"  class="btn btn-main">News</a>
			   <a href="{{ route('contactar') }}"  class="btn btn-main">Contact</a>
			   <a href="{{route('home')}}"  class="btn btn-main">English</i></a>
			   @guest
			   <a href="{{route('login')}}"  class="btn btn-main">Login</a>
                    @endguest
                @auth
				<a class="btn btn-main" href="/dashboard">Dashboard
				</a>
				<a class="btn btn-main" onclick="event.preventDefault();
                    document.getElementById('nav-logout-form').submit()" 
                    href="#">Logout
				</a>

                <form id="nav-logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
                </li>
                                    </ul>
                                </li>
                                @endauth
			</ul>
			<!-- <a href="index(ar).html" class="nav-link btn btn-solid-border">Arabic<i class="fa fa-angle-right ml-2"></i></a> -->
			<!-- <a href="index(ar).html" class="btn btn-solid-border d-none d-lg-block">Arabic<i class="fa fa-angle-right ml-2"></i></a> -->
		  </div>
		</div>
	</nav>