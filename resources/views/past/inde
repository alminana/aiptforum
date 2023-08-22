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
        <div style="font-weight: 200"  class="breadcrumb-title pe-3"><a  href="{{ route('past.create') }}">Past</a></div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('past.create') }}"><button type="button" class="btn btn-primary">Add New</button></a>
                 
                    </li>
                </ol>
                
            </nav>
        </div>
    </div>
    <div class="text-center">
        <h2 class="text-4xl leading-10 tracking-tight font-bold text-gray-900">Welcome to the blog</h2>
        <p class="max-w-2xl mx-auto mt-5 text-xl leading-7 text-gray-500">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem tenetur expedita debitis veritatis aut ea quae itaque beatae delectus corrupti aspernatur, odio nesciunt possimus excepturi, necessitatibus et adipisci, minus deleniti!</p>
    </div>


 {{-- Posts Wrapper --}}
 <div class="mt-12 grid gap-5 max-w-lg mx-auto lg:grid-cols-3 lg:max-w-none">
    @foreach ($pasts as $past)
        {{-- Post --}}
        <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
            {{-- Header --}}
            <div class="flex-shrink-0">
                <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1602526430780-782d6b1783fa?ixid=MXwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="blog image">
            </div>

            {{-- Contet --}}
            <div class="flex-1 p-6 flex flex-col justify-between">
                <div class="flex-1">
                    <a href="/past/{{ $past->id }}">
                        <h3 class="mt-2 text-xl leading-7 font-semibold text-gray-900">{{ $past->title }}</h3>
                    </a>
                    <p class="mt-3 text-base leading-6 text-gray-500">
                        @if (strlen($past->text) > 200)
                            {{ substr($past->text, 0, 200) }}...
                        @else
                            {{ $past->text }}
                        @endif
                    </p>
                </div>

                <div class="mt-6 flex items-center">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="https://pbs.twimg.com/profile_images/1194113737092935681/63O1znGw.jpg" alt="author avatar">
                    </div>

                    <div class="ml-3">
                        <p class="text-sm leading-5 font-medium text-gray-900">John Doe</p>
                        <div class="flex text-sm leading-5 text-gray-500">
                            <time datetime="{{ $past->created_at }}">
                                {{ $past->created_at->diffForHumans() }}
                            </time>
                            <span class="mx-1">&middot;</span>
                            <span>{{ ceil(strlen($past->text) / 863) }} min read</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
</div>

  
@endsection

