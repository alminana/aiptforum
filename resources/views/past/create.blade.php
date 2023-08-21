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
        <div style="font-weight: 200"  class="breadcrumb-title pe-3"><a  href="">Past</a></div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('patent.create')}}"><button type="button" class="btn btn-primary">Add New</button></a>
                 
                    </li>
                </ol>
                
            </nav>
        </div>
    </div>
    <div class="text-center">
        <h2 class="text-4xl leading-10 tracking-tight font-bold text-gray-900">Welcome to the blog</h2>
        <p class="max-w-2xl mx-auto mt-5 text-xl leading-7 text-gray-500">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem tenetur expedita debitis veritatis aut ea quae itaque beatae delectus corrupti aspernatur, odio nesciunt possimus excepturi, necessitatibus et adipisci, minus deleniti!</p>
    </div>

<div class="bg-gray-50 h-full md:grid md:grid-cols-12">
    <div class="py-16 px-4 md:px-0 md:col-start-4 md:col-span-6">
        <h2 class="text-4xl leading-10 tracking-tight font-bold text-gray-900 text-center">New Post</h2>
        <div class="bg-white shadow-sm mt-5 p-6 rounded-md">
            <form action="{{ route('past.store') }}" method="POST" class="mb-0">
                @csrf
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" class="mt-1 py-2 px-3 block w-full border border-gray-400 rounded-md shadow-sm" value={{ old('title') }} autofocus required>

                <label for="text" class="mt-6 block text-sm font-medium text-gray-700">Text</label>
                <textarea name="text" class="mt-1 py-2 px-3 block w-full border border-gray-400 rounded-md shadow-sm" required>{{ old('text') }}</textarea>

                @if($errors->any())
                    <div class="mt-6">
                        <ul class="bg-red-100 px-4 py-5 rounded-md">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <button type="submit" class="mt-6 py-2 px-4 w-full border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">Post</button>
            </form>
        </div>
    </div>
</div>

  
@endsection

