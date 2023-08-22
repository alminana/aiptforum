@extends('main_layouts.master')

@section('title')
@section("style")
<link href="{{ asset('admin_dashboard_assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endsection
	
@section('content')  
		<!--start page wrapper -->
		<div class="page-wrapper">
		<div class="page-content">
	<!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div style="font-weight: 200"  class="breadcrumb-title pe-3"><a  href="">Patent</a></div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('patent.create')}}"><button type="button" class="btn btn-primary">Add New</button></a>
                 
                    </li>
                </ol>
                
            </nav>
        </div>
    </div>

    <div class="container-fuild">
        <div class="card" style="width: auto; height:25%;">
            <div class="container-fuild">
                <div class="container-fuild alert alert-success" role="alert">
                    Application
                  </div>
                  <div class="container">
                    <div class="row" style="margin-top:15px">
                        <div class="col-3">
                        <label style="color: blueviolet; font-weight:bold">Aipt Reference</label>
                        <h6 style="color:black; font-weight:bold">{{$past->aiptref}}</h6>
                        </div>
                        <div class="col-3">
                            <label style="color: blueviolet; font-weight:bold">Client Reference</label>
                            <h6 style="color:black; font-weight:bold">{{$past->clientref}}</h6>
                        </div>
                        <div class="col-3">
                            <label style="color: blueviolet; font-weight:bold">Filing Number</label>
                            <h6 style="color:black; font-weight:bold">{{$past->filingno}}</h6>
                        </div>
                        <div class="col-3">
                            <label style="color: blueviolet; font-weight:bold">Country</label>
                            <h6 style="color:black; font-weight:bold">{{$past->country}}</h6>
                        </div>
                    </div>
                    <div class="row" style="margin-top:15px">
                        <div class="col-12">
                        <label style="color: blueviolet; font-weight:bold">Application Title</label>
                        <h6 style="color:black; font-weight:bold">{{$past->title}}</h6>
                        </div>
                    </div>
                    <div class="row" style="margin-top:15px">
                        <div class="col-9">
                            <label style="color: blueviolet; font-weight:bold">Client</label>
                            <h6 style="color:black; font-weight:bold">{{$past->client}}</h6>
                        </div>
                        <div class="col-3">
                            <label style="color: blueviolet; font-weight:bold">Status</label>
                            <h6 style="color:black; font-weight:bold">{{$past->deadline_Status}}</h6>
                        </div>
                    </div>
                  </div>
              
              </div>
          </div>

    </div>
    <div class="container-fuild">
        <div class="card" style="width: auto; height:25%;">
            <div class="container-fuild">
                <div class="container-fuild alert alert-success" role="alert">
                    Schdule of Date
                  </div>
                  <div class="container">
                    <div class="row" style="margin-top:15px">
                        <div class="col-6">
                        <label style="color: blueviolet; font-weight:bold">PCT Date</label>
                        <h6 style="color:black; font-weight:bold">{{$past->pct_date}}</h6>
                        </div>
                        <div class="col-6">
                            <label style="color: blueviolet; font-weight:bold">PCT Number</label>
                            <h6 style="color:black; font-weight:bold">{{$past->pct_no}}</h6>
                        </div>
                    </div>
                    <div class="row" style="margin-top:15px">
                        <div class="col-6">
                        <label style="color: blueviolet; font-weight:bold">Regular Date</label>
                        <h6 style="color:black; font-weight:bold">{{$past->regular_date}}</h6>
                        </div>
                        <div class="col-6">
                            <label style="color: blueviolet; font-weight:bold">Regular Number</label>
                            <h6 style="color:black; font-weight:bold">{{$past->regular_date}}</h6>
                        </div>
                    </div>
                  
                  </div>
              
              </div>
          </div>

    </div>
    <div class="container-fuild">
        <div class="card" style="width: auto; height:25%;">
            <div class="container-fuild">
                <div class="container-fuild alert alert-success" role="alert">
                    Procedure
                  </div>
                  <div class="container">
                    <div class="row" style="margin-top:15px">
                        <div class="col-4">
                        <label style="color: blueviolet; font-weight:bold">Procedure</label>
                        <h6 style="color:black; font-weight:bold">{{$past->procedure}}</h6>
                        </div>
                        <div class="col-4">
                            <label style="color: blueviolet; font-weight:bold">Requested Date</label>
                            <h6 style="color:black; font-weight:bold">{{$past->requesteddate}}</h6>
                        </div>
                        <div class="col-4">
                            <label style="color: blueviolet; font-weight:bold">Actual Date</label>
                            <h6 style="color:black; font-weight:bold">{{$past->proceduredate}}</h6>
                        </div>
                    </div>
                  </div>
              
              </div>
          </div>

    </div>
    <div class="container-fuild">
        <div class="card" style="width: auto; height:25%;">
            <div class="container-fuild">
                <div class="container-fuild alert alert-success" role="alert">
                    Annuity
                  </div>
                  <div class="container">
                    <div class="row" style="margin-top:15px">
                        <div class="col-3">
                        <label style="color: blueviolet; font-weight:bold">Annuity</label>
                        <h6 style="color:black; font-weight:bold">{{$past->annuity}}</h6>
                        </div>
                        <div class="col-3">
                            <label style="color: blueviolet; font-weight:bold">Annuity Fee.</label>
                            <h6 style="color:black; font-weight:bold">{{$past->annual_office_fee}}</h6>
                        </div>
                        <div class="col-3">
                            <label style="color: blueviolet; font-weight:bold">Annuity Date</label>
                            <h6 style="color:black; font-weight:bold">{{$past->annual_deadline}}</h6>
                        </div>
                    </div>
                
                  </div>
              
              </div>
          </div>

    </div>
    <div class="container-fuild">
        <div class="card" style="width: auto; height:25%;">
            <div class="container-fuild">
                <div class="container-fuild alert alert-success" role="alert">
                    Comment Section
                    
                  </div>
                  @foreach ($comments as $comment)
                  <div class="container">
                    <div class="row" style="margin-top:15px">
                        <div class="col-3">
                        <label style="color: blueviolet; font-weight:bold">User</label>
                        <h6 style="color:black; font-weight:bold">{{ $comment->author }}</h6>
                        </div>
                        <div class="col-6">
                            <label style="color: blueviolet; font-weight:bold">Comment</label>
                            <h6 style="color:black; font-weight:bold">{{ $comment->text }}</h6>
                        </div>
                        <div class="col-3">
                            <label style="color: blueviolet; font-weight:bold">Date</label>
                            <h6 style="color:black; font-weight:bold">{{ $comment->created_at->diffForHumans() }}</h6>
                        </div>
                    </div>
                  </div> 
                  <hr>
                  @endforeach
                

              </div>
          </div>
          <div class="row animate-box">
            <div class="col-md-12">

                <x-blog.message :status="'success'"/>

                <h2 class="colorlib-heading-2" style="color: blueviolet; font-weight:bold">Say something</h2>

                @auth

                <form action="/pasts/{{ $past->id }}/comments" method="POST" class="mb-0">
                    @csrf
                    <div class="row form-group">
                        <textarea type="text"  name="author" class="mt-1 py-2 px-3 block w-full borded border-gray-400 rounded-md shadow-sm" value="{{ old('author')}}" placeholder="Enter your name" required></textarea>

                        <!-- <label for="message">Message</label> -->
                        <textarea name="text" id="the_comment" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
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
@endsection
