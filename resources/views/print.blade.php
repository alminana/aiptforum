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
    <div class="container">
    <div class="card-body">
    
    <div class="text-center mt-6">
        <div class="mb-1">
            <a href="index.html" class="auth-logo">
            <img src="{{asset('logo/logo.JPG')}}" style=" height:100px; weight:100px" class="logo-dark mx-auto" alt="">
            </a>
        </div>
    </div>

    <h5 class=" text-center font-size-0"><b>Mohammad Saleh Al-otaishan Law Firm</b><br/></h5>
    <p class=" text-center font-size-0">Office 10, Bldg 03, South of Manarat Al Riyadh School, AL Ezdehar District, Exit (8), P.O Box 341774, Riyadh11333 KSA Tel: +966- 1 454 4765; www.aiptlaw.com</p>

    <div class="p-3">

        <!-- end form -->
    </div>
</div>
               

        <form action="{{ route('admin.posts.update', $post) }}" method='post' enctype='multipart/form-data'>
        <table style="border-collapse:collapse" cellspacing="0">
        <td style="width:26pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
        <p class="s1" style="padding-top: 6pt;padding-left: 2pt;text-indent: 0pt;line-height: 8pt;text-align: left;">Reference#</p>
        </td>

        <td style="width:497pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" colspan="4">
        <p class="s1" style="padding-top: 6pt;padding-left: 4pt;text-indent: 0pt;line-height: 8pt;text-align: left;">{{ old("aiptref", $post->aiptref) }}</p>
        </td>
        </tr>
        <tr style="height:10pt">
        <td style="width:523pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" colspan="5">
        <p style="text-indent: 0pt;text-align: left;">
        <span>Application Status: </span>
        </p>
        </td> 
        
        <tr style="height:10pt">
        <td style="width:523pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" colspan="5">
        <p style="text-indent: 0pt;text-align: left;">
        <span> {!! $post->body !!}</span>
        </p>
        </td>

        <tr>
        <td style="width:250pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
        <p class="s1" style="padding-top: 6pt;padding-left: 2pt;text-indent: 0pt;line-height: 8pt;text-align: left;">Image</p>
        </td>

        <td style="width:250 ;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" colspan="4">
        <p class="s1" style="padding-top: 6pt;padding-left: 4pt;text-indent: 0pt;line-height: 8pt;text-align: left;">Applicant Name</p>
        </td>
        </tr>

        <tr>
        <td style="width:250pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
        <p class="s1" style="padding-top: 6pt;padding-left: 2pt;text-indent: 0pt;line-height: 8pt;text-align: left;">
        <div class="card-body">
				<img style='width: 50%; height:100%; align-item:center;' src="/storage/{{ $post->image ? $post->image->path : 'placeholders/thumbnail_placeholder.svg' }}" class='img-responsive' alt="Post Thumbnail">
			</div>
			<div class="classes-img" style="background-image: url({{ asset($post->image ? 'storage/' . $post->image->path : 'storage/placeholders/thumbnail_placeholder.svg' . '')  }});">
				</div>
			</div>
        </p>
        </td>

        <td style="width:250 ;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" colspan="4">
        <p class="s1" style="padding-top: 6pt;padding-left: 4pt;text-indent: 0pt;line-height: 8pt;text-align: left;">
        {{ old("title", $post->title) }}
        </p>
        </td>
        </tr>
        
        <tr style="height:16pt">
        <td style="width:26pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
        <p class="s1" style="padding-top: 6pt;padding-left: 2pt;text-indent: 0pt;line-height: 8pt;text-align: left;">Class</p>
        </td>
        <td style="width:497pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" colspan="4">
        <p class="s1" style="padding-top: 6pt;padding-left: 4pt;text-indent: 0pt;line-height: 8pt;text-align: left;">{{ old("cladss", $post->class) }}</p></td></tr>
        
        <tr style="height:16pt">
        <td style="width:26pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
        <p class="s1" style="padding-top: 6pt;padding-left: 2pt;text-indent: 0pt;line-height: 8pt;text-align: left;">Filing</p>
        </td>
        <td style="width:497pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" colspan="4">
        <p class="s1" style="padding-top: 6pt;padding-left: 4pt;text-indent: 0pt;line-height: 8pt;text-align: left;">{{ old("slug", $post->slug) }}</p></td></tr>

        <tr style="height:16pt">
        <td style="width:26pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
        <p class="s1" style="padding-top: 6pt;padding-left: 2pt;text-indent: 0pt;line-height: 8pt;text-align: left;">Registration</p>
        </td>
        <td style="width:497pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" colspan="4">
        <p class="s1" style="padding-top: 6pt;padding-left: 4pt;text-indent: 0pt;line-height: 8pt;text-align: left;">{{ old("registrationno", $post->registrationno) }}</p></td></tr>

        <tr style="height:16pt">
        <td style="width:26pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
        <p class="s1" style="padding-top: 6pt;padding-left: 2pt;text-indent: 0pt;line-height: 8pt;text-align: left;">Renewal</p>
        </td>
        <td style="width:497pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" colspan="4">
        <p class="s1" style="padding-top: 6pt;padding-left: 4pt;text-indent: 0pt;line-height: 8pt;text-align: left;">{{ old("renewal", $post->renewal) }}</p></td></tr>
        </table>
        <p style="text-indent: 0pt;text-align: left;"/>
    </div>
        </form>
        <div class="container">
            <h2 class="colorlib-heading-2">{{ count($post->comments) }} Activity logs</h2>

                <div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
								<thead>
									<tr>
									    <th style="font-size:11px;">Date</th>
										<th style="font-size:11px;"> Description</th>
									</tr>
								</thead>
								<tbody>
								@forelse($post->comments as $comment)
							<tr>
							
							    <td style="font-size:12px;"><a style="color:black;" href="">{{ $comment->created_at}}</a></td>
								<td style="font-size:12px;"><a style="color:black;"href="">{{ $comment->the_comment }}</a></td>		
                            @empty
								<p class='lead'>There are no Logs to show.</p>
							@endforelse
								</tbody>
							</table>
				</div>
</div>    
    </div>
    <button type="button" value="Print" class="btn btn-info float-right" style="margin-right: 5px;">
  <a href="javascript:window.print()">Print</a>
   </button>	

</body>
</html>

<style>
table, th, td {
  border:5px black;
}
</style>