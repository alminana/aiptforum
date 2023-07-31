@extends('main_layouts.master')

@section('title', 'AIPTFORUM | Home')

@section('content')

@section("style")

<link href="{{ asset('admin_dashboard_assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admin_dashboard_assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />

<link href="{{ asset('admin_dashboard_assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js" integrity="sha512-XNYSOn0laKYg55QGFv1r3sIlQWCAyNKjCa+XXF5uliZH+8ohn327Ewr2bpEnssV9Zw3pB3pmVvPQNrnCTRZtCg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endsection

@section('custom_css')

	<style>
		body{
			top:50px;
		}
		.class-single .desc img {
			width: 100%;
		}
	</style>

@endsection

@section('content')


<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Detials</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href=""><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Details</li>
                <li class="breadcrumb-item active" aria-current="page"><a href="">Print</a></li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			
				<hr>
				        <div class="row row-pb-lg animate-box">
							<div class="container">
								@forelse($patent as $patent)
									<div class="row">
										<div class="col-8">
											<div class="card" style="width:100rem; align-item:center;">											
												<div class="card-body">
													<div class="mb-3">
														<label for="inputProductTitle" class="form-label">Referrence :</label>
														<label for="inputProductTitle" class="form-label">{{ old("aiptref", $patent->aiptref) }}</label>
														<!-- <input type="text" value='{{ old("aiptref", $patent->aiptref) }}' name='title' required class="form-control" id="myText"> -->
			
														@error('aiptref')
															<p class='text-danger'>{{ $message }}</p>
														@enderror
													</div>
													<div class="mb-3">
														<label for="inputProductTitle" class="form-label">Aipt Ref:</label>
														<label for="inputProductTitle" class="form-label">{{ old("aiptref", $patent->aiptref) }}</label>
			
														@error('aiptref')
															<p class='text-danger'>{{ $message }}</p>
														@enderror
													</div>
			
													<div class="mb-3">
														<label for="inputProductTitle" class="form-label">Client Ref :</label>
														<label for="inputProductTitle" class="form-label">{{ old("clientref", $patent->clientref) }}</label>
			
														@error('clientref')
															<p class='text-danger'>{{ $message }}</p>
														@enderror
													</div>
													<div class="mb-3">
														<label for="inputProductDescription" class="form-label">Title:</label>
														<label for="inputProductDescription" class="form-label">{{ old("title", $patent->title) }}</label>
														@error('title')
															<p class='text-danger'>{{ $message }}</p>
														@enderror
													</div>
													<div class="mb-3">
														<label for="inputProductTitle" class="form-label">Client :</label>
														<label for="inputProductTitle" class="form-label">{{ old("client", $patent->client) }}</label>
			
														@error('client')
															<p class='text-danger'>{{ $message }}</p>
														@enderror
													</div>
			
													
													<div class="mb-3">
														<label for="inputProductDescription" class="form-label">PCT Date :</label>
														<label for="inputProductDescription" class="form-label">{{ old("pct_date", $patent->pct_date) }}</label>
														@error('pct_date')
															<p class='text-danger'>{{ $message }}</p>
														@enderror
													</div>
                                                    <div class="mb-3">
														<label for="inputProductDescription" class="form-label">Priority Date :</label>
														<label for="inputProductDescription" class="form-label">{{ old("regular_date", $patent->regular_date) }}</label>
														@error('regular_date')
															<p class='text-danger'>{{ $message }}</p>
														@enderror
													</div>
                                                    <div class="mb-3">
														<label for="inputProductDescription" class="form-label">Filing # :</label>
														<label for="inputProductDescription" class="form-label">{{ old("filingno", $patent->filingno) }}</label>
														@error('filingno')
															<p class='text-danger'>{{ $message }}</p>
														@enderror
													</div>
                                                    <div class="mb-3">
														<label for="inputProductDescription" class="form-label">Procedure :</label>
														<label for="inputProductDescription" class="form-label">{{ old("procedure", $patent->procedure) }}</label>
														@error('procedure')
															<p class='text-danger'>{{ $message }}</p>
														@enderror
													</div>
                                                    <div class="mb-3">
														<label for="inputProductDescription" class="form-label">Requested Date :</label>
														<label for="inputProductDescription" class="form-label">{{ old("requesteddate", $patent->requesteddate) }}</label>
														@error('requesteddate')
															<p class='text-danger'>{{ $message }}</p>
														@enderror
													</div>
                                                    <div class="mb-3">
														<label for="inputProductDescription" class="form-label">Actual Date :</label>
														<label for="inputProductDescription" class="form-label">{{ old("proceduredate", $patent->proceduredate) }}</label>
														@error('proceduredate')
															<p class='text-danger'>{{ $message }}</p>
														@enderror
													</div>
                                                    <div class="mb-3">
														<label for="inputProductDescription" class="form-label">Country :</label>
														<label for="inputProductDescription" class="form-label">{{ old("country", $patent->country) }}</label>
														@error('country')
															<p class='text-danger'>{{ $message }}</p>
														@enderror
													</div>
                                                    <div class="mb-3">
														<label for="inputProductDescription" class="form-label">Annuity :</label>
														<label for="inputProductDescription" class="form-label">{{ old("annuity", $patent->annuity) }}</label>
														@error('annuity')
															<p class='text-danger'>{{ $message }}</p>
														@enderror
													</div>
                                                    <div class="mb-3">
														<label for="inputProductDescription" class="form-label">Office Fee :</label>
														<label for="inputProductDescription" class="form-label">{{ old("annual_office_fee", $patent->annual_office_fee) }}</label>
														@error('annual_office_fee')
															<p class='text-danger'>{{ $message }}</p>
														@enderror
													</div>
                                                    <div class="mb-3">
														<label for="inputProductDescription" class="form-label">Annuity Date :</label>
														<label for="inputProductDescription" class="form-label">{{ old("annual_deadline", $patent->annual_deadline) }}</label>
														@error('annual_deadline')
															<p class='text-danger'>{{ $message }}</p>
														@enderror
													</div>
                                                    <div class="mb-3">
														<label for="inputProductDescription" class="form-label">DeadLine Status :</label>
														<label for="inputProductDescription" class="form-label">{{ old("deadline_Status", $patent->deadline_Status) }}</label>
														@error('deadline_Status')
															<p class='text-danger'>{{ $message }}</p>
														@enderror
													</div>
												</div>
											</div>
										</div>
									</div>
                                    @empty
                                    <p class='lead'>There are no Application to show.</p>
                                @endforelse
							</div>
			
							{{-- <div class="col-md-12">
								<h2 class="colorlib-heading-2">{{ count($patent->comments) }} Activity logs</h2>

								@foreach($patent->comments as $comment)
								<div id="comment_{{ $comment->id }}" class="review">
							   		<div 
							   		class="user-img" 
							   		style="background-image: url({{ $comment->user->image ? asset('storage/' . $comment->user->image->path. '') : 'https://images.assetsdelivery.com/compings_v2/salamatik/salamatik1801/salamatik180100019.jpg'  }});"></div>
							   		<div class="desc">
							   			<h4>
							   				<span class="text-left">{{ $comment->user->name }}</span>
							   				<span class="text-right">{{ $comment->created_at->diffForHumans() }}</span>
											<span class="text-right">{{ $comment->created_at}}</span>
							   			</h4>
							   			<p>{{ $comment->the_comment }}</p>
							   			<p class="star">
						   					<span class="text-left"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
							   			</p>
							   		</div>
							   	</div>
							   	@endforeach

								  
							</div> --}}
						</div>
						
						{{-- <div class="row animate-box">
							<div class="col-md-12">

								<x-blog.message :status="'success'"/>

								<h2 class="colorlib-heading-2">Say something</h2>

								@auth

								<form method="POST" action="{{ route('patent.add_comment', $patent) }}">
									@csrf
									
									<div class="row form-group">
										<div class="col-md-12">
											<!-- <label for="message">Message</label> -->
											<textarea name="the_comment" id="the_comment" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
										</div>
									</div>
									<div class="form-group">
										<input type="submit" value="Post Comment" class="btn btn-primary">
									</div>
								</form>

								@endauth

								@guest
								<p class="lead"><a href="{{ route('login') }}">Login </a> OR <a href="{{ route('register') }}">Register</a> to write comments</p>
								@endguest	
							</div>
						</div> --}}
			</div>
		</div>
@endsection

@section('custom_js')

<script>
	setTimeout(() => {
		$(".global-message").fadeOut();
	}, 5000);
	function undisableTxt() {
     document.getElementById("myText").disabled = false;
}

</script>


@endsection

<style>
  @media screen {
  #printSection {
      display: none;
  }
}

@media print {
  body * {
    visibility:hidden;
  }
  #printSection, #printSection * {
    visibility:visible;
  }
  #printSection {
    position:absolute;
    left:0;
    top:0;
  }
}
</style>
