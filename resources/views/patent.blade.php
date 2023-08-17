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

                  <div class="form-body mt-4">
                    <div class="row">
                    <div class="col-lg-12">
                            <div class="border border-3 p-4 rounded">
                                <!-- aiptref -->
                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label">AIPTREF:</label>
                                    <input type="text" disabled value='{{ old("aiptref",$patent->aiptref) }}' name='aiptref' required class="form-control" id="inputProductTitle">                                        
                                    
                                    @error('aiptref')
                                        <p class='text-danger'>{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- Client Refference-->
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Client Reference</label>
                                    <input type="text" disabled value='{{ old("clientref",$patent->clientref) }}' name='clientref'  class="form-control" id="inputProductclientref">

                                    @error('clientref')
                                        <p class='text-danger'>{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- Application name -->
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Title</label>
                                    <input type="text" disabled value='{{ old("title",$patent->title) }}' name='title' required class="form-control" id="inputProductTitle">

                                    @error('title')
                                        <p class='text-danger'>{{ $message }}</p>
                                    @enderror
                                </div>
                                 
        
                                  <!-- client -->
                                  <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Client</label>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="rounded">
                                                <div class="mb-3">
                                                   
                                                        @foreach($clients as $key => $client)
                                                        <input type="text" disabled value='{{  $client->name,$patent->name  }}' name='title' required class="form-control" id="inputProductTitle">

                                                        @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               <!-- Filing no. -->
                                <div class="container">
                                    <div class="row">
                                      <div class="col">
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">PCT Date:</label>
                                            <label for="inputProductTitle" class="form-label"></label>
                                            <input type="text" disabled value='{{ old("pct_date",$patent->pct_date) }}' class="form-control" required  name='pct_date' id="inputProductTitle">
                                            @error('pct_date')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                      </div>
                                      <div class="col">
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Priority Date:</label>
                                            <label style="font-size: 9" for="inputProductTitle" class="form-label"></label>
                                            <input type="text" disabled value='{{ old("regular_date",$patent->regular_date) }}' class="form-control" required  name='regular_date' id="inputProductTitle">
                                            @error('regular_date')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                      </div>
                                      <div class="col">
                                        <!-- filing -->
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Filing no.</label>
                                            <input type="text"  disabled value='{{ old("filingno",$patent->filingno) }}'  required  placeholder="Please Input n/a if theres is no Client References no." name='filingno'  class="form-control" id="inputProductclientref">

                                            @error('filingno')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                      </div>
                                    </div>
                                </div>

                                <div class="container">
                                    <div class="row">
                                      <div class="col">
                                        <label for="inputProductTitle" class="form-label">Procedure</label>
                                        <div class="mb-3">
                                          <input type="text"  disabled value='{{ old("procedure",$patent->procedure) }}'  required  placeholder="Please Input n/a if theres is no Client References no." name='filingno'  class="form-control" id="inputProductclientref">
                                        </div>
                                      </div>
                                      <div class="col">
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Requested Date:</label>
                                            <input type="text"  disabled value='{{ old("requesteddate",$patent->requesteddate) }}'  required  placeholder="Please Input n/a if theres is no Client References no." name='filingno'  class="form-control" id="inputProductclientref">
                                        </div>
                                      </div>
                                      <div class="col">
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Actual Date:</label>
                                            <input type="text" disabled value='{{ old("proceduredate",$patent->proceduredate) }}' placeholder='' required  class="form-control"  name='proceduredate' id="inputProductTitle">
                                            @error('proceduredate')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  
                             
                                <div class="mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="container">
                                                <div class="row">
                                                
                                                  <div class="col-sm">
                                                    <label for="inputProductTitle" class="form-label">Annualy</label>
                                                    <input type="text" disabled value='{{ old("annuity",$patent->annuity) }}' placeholder='' required  class="form-control"  name='proceduredate' id="inputProductTitle">
                                                  </div>
                                                  <div class="col-sm">
                                                    <label for="inputProductTitle" class="form-label">Office Fee</label>
                                                    <input type="text" disabled value='{{ old("annual_office_fee",$patent->annual_office_fee) }}' class="form-control" required  name='annual_office_fee' id="inputProductTitle">
        
                                                    @error('annual_office_fee')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror
                                                  </div>
                                                  <div class="col-sm">
                                                    <label for="inputProductTitle" class="form-label">Annualy date</label>
                                                    <input type="text" disabled value='{{ old("annual_deadline",$patent->annual_deadline) }}' name='annual_deadline' required class="form-control" id="inputProductTitle">
        
                                                    @error('annual_deadline')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror
                                                  </div>
                                                </div>
                                              </div>
                                        </div>
                                    </div>
                                  </div>  

                             
                             
                                    <!-- Country -->
                                    <div class="mb-3">
                                        <label for="inputProductTitle" class="form-label">Country</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="rounded">
                                                    <div class="mb-3">
                                                      <input type="text" disabled value='{{ old("country",$patent->country) }}' name='annual_deadline' required class="form-control" id="inputProductTitle">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    
                                 {{-- Deadline Status --}}
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Deadline Status</label>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="rounded">
                                                <div class="mb-3">
                                                  <input type="text" disabled value='{{ old("deadline_Status",$patent->deadline_Status) }}' name='annual_deadline' required class="form-control" id="inputProductTitle">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                                                
                            </div>
                        </div>
                    </div>
                </div>
					
							</div>
		     <div class="col-md-12">
								<h2 class="colorlib-heading-2">{{ count($patent->Patent_comments) }} Activity logs</h2>

								@foreach($patent->Patent_comments as $patent_comments)
								<div id="comment_{{ $comment->id }}" class="review">
							   		{{-- <div 
							   		class="user-img" 
							   		style="background-image: url({{ $comment->user->image ? asset('storage/' . $comment->user->image->path. '') : 'https://images.assetsdelivery.com/compings_v2/salamatik/salamatik1801/salamatik180100019.jpg'  }});"></div>
							   		<div class="desc"> --}}
							   			<h4>
							   				<span class="text-left">{{ $patent_comments->user->name }}</span>
							   				<span class="text-right">{{ $patent_comments->created_at->diffForHumans() }}</span>
											<span class="text-right">{{ $patent_comments->created_at}}</span>
							   			</h4>
							   			<p>{{ $patent_comments->the_comment }}</p>
							   			<p class="star">
						   					<span class="text-left"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
							   			</p>
							   		</div>
							   	</div>
							   	@endforeach

								  
							</div>  
						</div>
					
						<div class="row animate-box">
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
						</div>  
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