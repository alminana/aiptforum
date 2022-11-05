<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container wrapper">
    <div class="card-body ">
    
    <div class="text-center mt-6">
        <div class="mb-1 container">
            <a href="index.html" class="auth-logo">
            <img src="{{asset('logo/logo.JPG')}}" style=" height:50px; weight:50px" class="logo-dark mx-auto" alt="">
            </a>
                <h5 class=" text-center font-size-0"><b>Mohammad Saleh Al-otaishan Law Firm</b><br/></h5>
                <p class=" text-center font-size-0">Office 10, Bldg 03, South of Manarat Al Riyadh School, AL Ezdehar District, Exit (8), P.O Box 341774, Riyadh11333 KSA Tel: +966- 1 454 4765; www.aiptlaw.com</p><br/>
                <h5 class=" text-center font-size-0"><b>Application Report</b><br/></h5>
                <hr>
                    <div class="row">
                        <div class="col-md-8">
                            <h6 style="text-align:left">Reference#        : {{ old("aiptref", $post->aiptref) }}</h6>  
                            <h6 style="text-align:left">Application Name : {{ old("aiptref", $post->title) }}</h6>  
                            <h6 style="text-align:left">Class            : {{ old("aiptref", $post->class) }}</h6>  
                            <h6 style="text-align:left">Filing          : {{ old("aiptref",  $post->slug) }}</h6>  
                            <h6 style="text-align:left">Registration     : {{ old("aiptref", $post->registrationno) }}</h6>  
                            <h6 style="text-align:left">Renewal          : {{ old("aiptref", $post->renewal) }}</h6>  
                            <h6 style="text-align:left">Status           : {{ old("aiptref", $post->status) }}</h6>  
                            <h6 style="text-align:left">Image :<img style='width: 10%' src="{{Storage::disk('s3')->temporaryUrl($post->image->path, now()->addMinutes(20))}}" />
                            </h6>
                        </div>
                        
                    </div>
                    <hr>
                    <h2 style="font-size:12px;text-align:left;"class="colorlib-heading-2">{{ count($post->comments) }} Activity logs</h2>

                        <div class="card">
                            <div class="card-body">
                                <div class="">
                                    <table id="example2" class="table table-striped comment table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="font-size:11px;">Date</th>
                                                <th style="font-size:11px;"> Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($post->comments as $comment)
                                    <tr>
                                    
                                        <td style="font-size:12px;text-align:left;"><a style="color:black;" href="">{{date('m/d/Y',strtotime(($comment->created)))}} </a></td>
                                        <td style="font-size:12px;text-align:left;"><a style="color:black;"href="">{{ $comment->the_comment }}</a></td>		
                                    @empty
                                        <p class='lead'>There are no Logs to show.</p>
                                    @endforelse
                                        </tbody>
                                    </table>
                        </div>
                                 
        </div>
    </div>

    <div class="p-3">

        <!-- end form -->
    </div>
</div>
               

       
            
    </div>
    <button type="button" value="Print" class="btn btn-info float-right" style="margin-right: 5px;">
  <a href="javascript:window.print()">Print</a>
   </button>	

</body>
</html>

<style>
body{
    background-color: white;
}
table, th, td {
  border:5px black;
}
thead tr th {
    max-width: 100%;
    overflow-x: hidden;
}
</style>