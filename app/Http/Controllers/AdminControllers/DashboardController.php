<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use App\Models\User;
use DB;
class DashboardController extends Controller
{
    public function index(Category $category, Request $request)
    {
        $comments = DB::table('comments')->latest('id')->first();
        $recentPosts = Post::latest('created_at','desc')->take(5)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        $tags = Tag::latest()->take(50)->get();
        $posts = Post::withCount('comments')->get();  
        $user = User::latest()->take(50)->get();  
        
        if ($request->has('search')) {
            $posts = Post::where('body', 'like', "%{$request->search}%")
            ->orWhere('id', 'like', "%{$request->search}%")
            ->orWhere('title', 'like', "%{$request->search}%")
            ->orWhere('filingdate', 'like', "%{$request->search}%")
            ->orWhere('registrationno', 'like', "%{$request->search}%")
            ->orWhere('registrationdate', 'like', "%{$request->search}%")
            ->orWhere('renewal', 'like', "%{$request->search}%")
            ->orWhere('slug', 'like', "%{$request->search}%")
            ->orWhere('excerpt', 'like', "%{$request->search}%")
            ->orWhere('class', 'like', "%{$request->search}%")
            ->orWhere('status', 'like', "%{$request->search}%")
            ->orWhere('country', 'like', "%{$request->search}%")
            ->orWhere('aiptref', 'like', "%{$request->search}%")
            ->orWhere('created_at', 'like', "%{$request->search}%")
            ->paginate(1000);
        }
        return view('admin_dashboard.index', [
            'posts' => $posts,
            'recentPosts' => $recentPosts,
            'categories' => Category::withCount('posts')->paginate(20),
            'tags' => $tags,
            'comments' => $comments,
            'user' => $user,
        ], compact('posts','comments','user'));
    }
}
