<html>
<head>
<title></title>
<link rel="icon" href="{{ asset('admin_dashboard_assets/images/favicon-32x32.png') }}" type="image/png" />
	<!--plugins-->

	<link href="{{ asset('admin_dashboard_assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin_dashboard_assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin_dashboard_assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{ asset('admin_dashboard_assets/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('admin_dashboard_assets/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('admin_dashboard_assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('admin_dashboard_assets/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_dashboard_assets/css/icons.css') }}" rel="stylesheet">


    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('admin_dashboard_assets/css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_dashboard_assets/css/semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_dashboard_assets/css/header-colors.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_dashboard_assets/css/my_style.css') }}" />
    <link rel="stylesheet" href="{{ asset('blog_template/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/mystyle.css') }}">
<style type="text/css">

body { font-family: Arial; font-size: 17.0px }
.pos { position: absolute; z-index: 0; left: 0px; top: 0px }

</style>
</head>
<body>
<div class="container">
        <div class="row">
                <div class="col-12">

                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                          <!-- title row -->
                          <div class="row">
                            <div class="col-12">
                              <h4>
                                <i class="fa fa-globe"></i> AIPT Docketing System
                                
                              </h4>
                            </div>
                            <!-- /.col -->
                          </div>
						  <form action="{{ route('admin.posts.update', $post) }}" method='post' enctype='multipart/form-data'>
                          <!-- info row -->
						  <div class="row">
                            <div class="col-12">
                              <table class="">
                                <thead>
                                <tr>
                                  <th>Application Details</th>
	                              <th></th>
                                </tr>
                                </thead>
                                <tbody>
								
                                <tr>
                                  <td >
								                Referrence : {{ old("aiptref", $post->aiptref) }}<br>
                                Application Name : {{ old("title", $post->title) }}<br>
                                Filing No. : {{ old("slug", $post->slug) }}<br>
                                Filing Date : {{ old("filingdate", $post->filingdate) }}<br>
                                Class :{{ old("cladss", $post->class) }}<br/>
                                Client Name : {{ old("excerpt", $post->excerpt) }} <br/>
                                Type :{{ $post->category->name }}<br/>
                                Status : {{ old("status", $post->status) }}</br/>
                                Registration : {{ old("registrationno", $post->registrationno) }}<br/>
                                Registration Date: {{ old("registrationdate", $post->registrationdate) }}<br/>
                                Renewal date :{{ old("renewal", $post->renewal) }}<br/>
								              </td>
                                  <td>
                                    <div>
								                    <img style='width: 40%' class="center" src="/storage/{{ $post->image ? $post->image->path : 'placeholders/thumbnail_placeholder.svg' }}" class='img-responsive' alt="Post Thumbnail">
                                    </div>
								                  </td>
                                </tr>
							
                                </tbody>
                              </table>
                            </div>
                            <!-- /.col -->
                          </div>
                       
                          <!-- /.row -->

                          <!-- Table row -->
                          <div class="row">
                            <div class="col-12 table-responsive">
                              <table class="table table-striped">
							  <h5 class="colorlib-heading-2">{{ count($post->comments) }} Activity logs</h5>
                                <thead>
                                <tr>
                                  <th>User</th>
                                  <th>Comment</th>
                                  <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
								@foreach($post->comments as $comment)
                                <tr>
                                  <td style="font-size:10px;">{{ $comment->user->name }}</td>
                                  <td style="font-size:10px;">{{ $comment->the_comment }}</td>
                                  <td style="font-size:10px;">{{ $comment->created_at }}</td>
                                </tr>
								@endforeach
                                </tbody>
                              </table>
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
						  </form>
						  <div class="row animate-box">
							<div class="col-md-12">

								<x-blog.message :status="'success'"/>

								<h2 class="colorlib-heading-2">Say something</h2>

								@auth

								<form method="POST" action="{{ route('posts.add_comment', $post) }}">
									@csrf
									
									<div class="row form-group">
										<div class="col-md-12">
											<!-- <label for="message">Message</label> -->
											<textarea name="the_comment" id="the_comment" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
										</div>
									</div>
									<div class="form-group">
										<input type="submit" value="Post Comment" class="btn btn-primary">
										<button type="button" value="Print" class="btn btn-info float-right" style="margin-right: 5px;">
										 <a href="javascript:window.print()">Print</a>
                    </button>	
                    <button type="button" value="Back" class="btn btn-success float-right" style="margin-right: 5px;">
										 <a href="{{route('categories.index')}}">Back</a>
									  </button>									
									</div>
								</form>

								@endauth

								@guest
								<p class="lead"><a href="{{ route('login') }}">Login </a> OR <a href="{{ route('register') }}">Register</a> to write comments</p>
								@endguest	
							</div>
						</div>
                        </div>
                        <!-- /.invoice -->
                      </div>
        </div>
    </div>
</body>
</html>

<style>
  .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
</style>
