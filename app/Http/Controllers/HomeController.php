<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;
use DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        $comments = DB::table('comments')->latest('id')->first();
        $recent_posts = Post::latest()->take(5)->get();

        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();

        $tags = Tag::latest()->take(50)->get();
        $posts = Post::all();
        
        if ($request->has('search')) {
            $posts = Post::where('body', 'like', "%{$request->search}%")
            ->orWhere('id', 'like', "%{$request->search}%")
            ->orWhere('title', 'like', "%{$request->search}%")
            ->orWhere('slug', 'like', "%{$request->search}%")
            ->orWhere('excerpt', 'like', "%{$request->search}%")
            ->orWhere('class', 'like', "%{$request->search}%")
            ->orWhere('status', 'like', "%{$request->search}%")
            ->orWhere('country', 'like', "%{$request->search}%")
            ->orWhere('aiptref', 'like', "%{$request->search}%")
            ->orWhere('created_at', 'like', "%{$request->search}%")
            ->paginate(10);
        }
        return view('home',[
            'posts' => $posts,
            'recent_posts' => $recent_posts,
            'categories' => $categories,
            'tags' => $tags,
            'comments' => $comments,
        ], compact('posts','comments'));
    }
    // public function index()
    // {s
    //     $posts = Post::latest()
    //     ->approved()
    //     ->where('approved', 1)
    //     ->withCount('comments')->paginate(10);

    //     $recent_posts = Post::latest()->take(5)->get();

    //     $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();

    //     $tags = Tag::latest()->take(50)->get();

    //     return view('home', [
    //         'posts' => $posts,
    //         'recent_posts' => $recent_posts,
    //         'categories' => $categories,
    //         'tags' => $tags
    //     ]);
    // }
}