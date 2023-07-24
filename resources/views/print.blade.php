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
    <title>Application Result</title>
</head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div style="text-align: center; margin-top:12px;">
                        <a href="index.html" class="auth-logo">
                            <img src="{{asset('logo/logo.JPG')}}" style=" height:50px; weight:50px" class="logo-dark mx-auto" alt="">
                            </a>
                                <h5 class=" text-center font-size-0"><b>Mohammad Saleh Al-otaishan Law Firm</b><br/></h5>
                                <p class=" text-center font-size-0">Office 10, Bldg 03, South of Manarat Al Riyadh School, AL Ezdehar District, Exit (8), P.O Box 341774, Riyadh11333 KSA Tel: +966- 1 454 4765; www.aiptlaw.com</p><br/>
                                <h5 class=" text-center font-size-0"><b>Application Report</b><br/></h5>
                    </div>
                </div>
            </div>
           <div class="row">
            <div class="col-md-7">
                <div class="container">
                    <div>
                        <label for="inputProductTitle" class="form-label">Referrence :</label>
                        <label for="inputProductTitle" class="form-label">{{ old("aiptref", $post->aiptref) }}</label>
                        <!-- <input type="text" value='{{ old("aiptref", $post->aiptref) }}' name='title' required class="form-control" id="myText"> -->

                        @error('aiptref')
                            <p class='text-danger'>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Application Name :</label>
                        <label for="inputProductTitle" class="form-label">{{ old("title", $post->title) }}</label>
                        <!-- <input type="text" value='{{ old("title", $post->title) }}' name='title' required class="form-control" id="myText"> -->

                        @error('title')
                            <p class='text-danger'>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Filing No. :</label>
                        <label for="inputProductTitle" class="form-label">{{ old("slug", $post->slug) }}</label>
                        <!-- <input type="text" value='{{ old("slug", $post->slug) }}' class="form-control" required name='slug' id="inputProductTitle"> -->

                        @error('slug')
                            <p class='text-danger'>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputProductDescription" class="form-label">Registration :</label>
                        <label for="inputProductDescription" class="form-label">{{ old("registrationno", $post->registrationno) }}</label>
                        <!-- <input type="status" class="form-control" value='{{ old("status", $post->status) }}' name='status' data-role="tagsinput">                                         -->
                        @error('status')
                            <p class='text-danger'>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Class :</label>
                        <label for="inputProductTitle" class="form-label">{{ old("class", $post->class) }}</label>
                        <!-- <input type="text" value='{{ old("cladss", $post->class) }}' class="form-control" required name='class' id="inputProductTitle"> -->

                        @error('class')
                            <p class='text-danger'>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="inputProductDescription" class="form-label">Client Name :</label>
                        <label for="inputProductDescription" class="form-label">{{ old("excerpt", $post->excerpt) }}</label>
                        <!-- <textarea required class="form-control" name='excerpt' id="inputProductDescription" rows="3">{{ old("excerpt", $post->excerpt) }}</textarea> -->
                    
                        @error('excerpt')
                            <p class='text-danger'>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="inputProductTitle" class="form-label">Type :</label>
                        <label for="inputProductTitle" class="form-label">{{ $post->category->name }}</label>
                        <!-- <input type="text" value='{{ $post->category->name }}' class="form-control" required name='category' id="inputProductTitle"> -->

                        @error('category')
                            <p class='text-danger'>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputProductDescription" class="form-label">Status :</label>
                        <label for="inputProductDescription" class="form-label">{{ old("status", $post->status) }}</label>
                        <!-- <input type="status" class="form-control" value='{{ old("status", $post->status) }}' name='status' data-role="tagsinput">                                         -->
                        @error('status')
                            <p class='text-danger'>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputProductDescription" class="form-label">Status Date :</label>
                        <label for="inputProductDescription" class="form-label">{{ old("proceduredate", $post->proceduredate) }}</label>
                        {{-- <!-- <input type="status" class="form-control" value='{{ old("status", $post->status) }}' name='status' data-role="tagsinput">                                         --> --}}
                        @error('proceduredate')
                            <p class='text-danger'>{{ $message }}</p>
                        @enderror
                    </div>  
                </div> 
            </div>
            <div class="col-md-5">
                <img style='width: 50%' src="/storage/{{ $post->image ? $post->image->path : 'placeholders/thumbnail_placeholder.svg' }}" class='img-responsive' alt="Post Thumbnail">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2 class="colorlib-heading-2">{{ count($post->comments) }} Activity logs</h2>

                @foreach($post->comments as $comment)
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

                  
            </div>
        </div>
        <div>
            <button type="button" value="Print" class="btn btn-success float-right" style="margin-right: 5px;">
                     <a href="javascript:window.print()" style="color:white"> Print</a>
                 </button>	
        </div>
        </div>
    </body>
</html>

<style>
body{
    background-color: white;
}

</style>