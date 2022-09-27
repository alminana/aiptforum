@extends('aiapait_layouts.master')

@section('title', 'aiapait | Home')

@section('content')
<section class="banner d-flex align-items-center">
	<div class="banner-img-part"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-md-12 col-xl-8">
				<div class="block">
					<span class="text-uppercase text-sm letter-spacing ">The most powerful Solution</span>
					<h1 class="mb-3 mt-3">Importance of Trademark </h1>
					<p class="mb-5"style="color:black;">
						It is important to register your trademark in each country where your business is operating or is likely to expand to avoid losing ownership of your trademark if it was registered by someone else prior to you. 
						All the GCC countries including Saudi Arabia and most countries over the world are first to file system which means that ownership of trademark is given to the individual who registered the trademark first and not to the one who use trademark first.
						Obtaining the trademark registration certificate in particular country means that you are the only one who can use this trademark to identify and distinguish your  goods or services and give you also the right  to prevent other from using identical or similar trademarks in the country of registration.
						AIP&T offers the services of advice on trademark selection, trademark registration, and trademark infringement & enforcement
					</p>

					<a href="about.html" target="_blank" class="btn btn-main">get started<i class="fa fa-angle-right ml-2"></i></a>
					<a href="about.html" target="_blank" class="btn btn-main">explore more<i class="fa fa-angle-right ml-2"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section about">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6 ">
				<div class="about-item mb-5 mb-lg-5">
					<div class="icon">
						<img src="{{asset('aiapait/images\about/consultency.png')}}"/>
					</div>

					<div class="content">
						<h4 class="mt-3 mb-3">Professional Advice on Trademark Selection</h4>
						<p class="mb-4" style="text-align: justify;">
							Usually enterprises are willing to choose trademarks that reflect the nature of their goods or services. Although this is a valid target, direct description of products or services lowers the strength and exclusivity of trademark or could lead the mark to be descriptive or generic and not acceptable for registration. 
							Our advice on trademark selection will enable you to choose a strong and exclusive trademark that does at the same time the desired identification to your goods and services. 
							We examine the validity of the trademark according to the official language of the country in question.
						</p>

						<!-- <a href="#"> Read More </a> -->
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6">
				<div class="about-item mb-5 mb-lg-5">
					<div class="icon">
						<img src="{{asset('aiapait/images\about/support-logo.png')}}"/>
					</div>
					<div class="content">
						<h4 class="mt-3 mb-3">Trademark Registration</h4>
						<p class="mb-4" style="text-align: justify;">
							<img src="{{asset('aipait/images\bg\aipait.png')}}" style="height: 20px;" alt="" srcset=""> provides full trademark registration services all over the world with a  competitive charges. 
							<img src="{{asset('aipait/images\bg\aipait.png')}}" style="height: 20px;" alt="" srcset=""> offers comprehensive services to register trademarks in the Middle East, European Union, USA, Asia and all countries around the world. 
							In addition, <img src="{{asset('aipait/images\bg\aipait.png')}}" style="height: 20px;" alt="" srcset=""> offers all other procedures for trademarks such as renewal, license, assignment, change of owner’s name and address.
						</p>
						<!-- <a href="#"> Read More </a> -->
					</div>
				</div>
			</div>
			
			<div class="col-lg-4 col-md-6">
				<div class="about-item">
					<div class="icon">
						<img src="{{asset('aiapait/images\about/consultency.png')}}"/>
					</div>
					<div class="content">
						<h4 class="mt-3 mb-3">Trademark Infringement & Enforcement</h4>
						<p class="mb-4" style="text-align: justify;">
							The infringement on the trademark verifies when any person uses the identical or similar trademark to a registered trademark in the country of registration without the permission of its owner. This action is very harmful to the owner of the mark because a group of his clients may turn to deal with the infringer of the mark as a result of confusion which happen due to similarity between the two marks.
							<img src="{{asset('aipait/images\bg\aipait.png')}}" style="height: 20px;" alt="" srcset=""> provides trademark protection services to its customers against the infringer on their marks by third parties and take many legal actions, including filing a lawsuit before the competent court to prevent the infringement and its implication.
							The legal procedures to prevent infringement enable our clients to prevent the infringing activities, get adequate compensation from the infringer, and the destruction of infringing and counterfeiting products.
						</p>
						<!-- <a href="service.html"> Read More </a> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section process">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-5">
				<div class="process-block pl-4">
					<span class="text-uppercase text-sm letter-spacing">Why choose us</span>
					<h2 class="mb-4 mt-3">We help you to secure your Trademarks</h2>
					<!-- <p class="mb-4">We understand what your business means to you,your requirements considering trends.Smet nemo excepturi voluptas eligendi .</p> -->
				</div>
			</div>

			<div class="col-lg-7 col-xs-12 col-md-12">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6">
						<div class="icon-block text-center mb-4 mb-lg-0">
							<img src="{{asset('aiapait/images\service/service1.png')}}"/>
							<h5>Trademark Overview</h5>
							<a  href="{{route('service')}}"> Read More </a>
						</div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6">
						<div class="icon-block text-center mt-4 mb-4 mb-lg-0">
							<img src="{{asset('aiapait/images\service/service2.png')}}"/>
							<h5>Trademark Registration</h5>
							<a href="{{route('service')}}"> Read More </a>
						</div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6">
						<div class="icon-block text-center">
							<img src="{{asset('aiapait/images\service/service3.png')}}"/>
							<h5>Trademark Infringment</h5>
							<a href="{{route('service')}}"> Read More </a>
						</div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6">
						<div class="icon-block text-center mt-4 mb-4 mb-lg-0">
							<img src="{{asset('aiapait/images\service/service4.png')}}"/>
							<h5>Trademark Watch</h5>
							<a href="{{route('service')}}"> Read More </a>
						</div>
					</div>


					<div class="col-lg-6 col-md-6 col-sm-6">
						<div class="icon-block text-center mt-4">
							<img src="{{asset('aiapait/images\service/service5.png')}}"/>
							<h5>Trademark Selection</h5>
							<a href="{{route('service')}}"> Read More </a>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
</section>



@endsection