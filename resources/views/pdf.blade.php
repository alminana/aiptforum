<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Document</title>
</head>
<body>
	<div class="wrapper">
	<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<!--end breadcrumb-->
				<div class="container">
  <h2 style="align-text:center;">Application Details</h2>
  <table>
	<thead>
		<tr>{!! $post->body !!}</tr>
	</thead>
  </table>
</div>
<hr>
				<div class="container">
				<form action="{{ route('admin.posts.update', $post) }}" method='post' enctype='multipart/form-data'>
						<div class="row">
							<div class="col-md-7">
								<div class="card">
								
								</div>
							<div class="row row-pb-lg">
							</div>
							<div class="col-md-5">
								<div class>
								<div class="card">
									<div class="card-body">
									<div class="col-lg-12">
                                    <div class="">
									<div class="mb-3">
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
                                            <label for="inputProductTitle" class="form-label">Filing Date :</label>
											<label for="inputProductTitle" class="form-label">{{ old("filingdate", $post->filingdate) }}</label>
                                            <!-- <input type="text" value='{{ old("cladss", $post->class) }}' class="form-control" required name='class' id="inputProductTitle"> -->

                                            @error('class')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
										<div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Class :</label>
											<label for="inputProductTitle" class="form-label">{{ old("cladss", $post->class) }}</label>
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
                                            <label for="inputProductTitle" class="form-label">Project :</label>
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
                                            <label for="inputProductDescription" class="form-label">Registration :</label>
											<label for="inputProductDescription" class="form-label">{{ old("registrationno", $post->registrationno) }}</label>
											<!-- <input type="status" class="form-control" value='{{ old("status", $post->status) }}' name='status' data-role="tagsinput">                                         -->
                                            @error('status')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
										<div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Registration date :</label>
											<label for="inputProductDescription" class="form-label">{{ old("registrationdate", $post->registrationdate) }}</label>
											<!-- <input type="status" class="form-control" value='{{ old("status", $post->status) }}' name='status' data-role="tagsinput">                                         -->
                                            @error('status')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
										<div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Renewal date :</label>
											<label for="inputProductDescription" class="form-label">{{ old("renewal", $post->renewal) }}</label>
											<!-- <input type="status" class="form-control" value='{{ old("status", $post->status) }}' name='status' data-role="tagsinput">                                         -->
                                            @error('status')
                                                <p class='text-danger'>{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
								</div>
								</div>
								</div>
							</div>
						</div>
					</form>
				</div>
				<hr>
				        <div class="row row-pb-lg animate-box">

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
			</div>
		</div>
	</div>
</body>
</html><a href="http://" target="_blank" rel="noopener noreferrer"></a>