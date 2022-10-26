<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Category;
use App\Models\Post;
use DB;
use Illuminate\Support\Carbon;
class NotificationController extends Controller
{
    public function index(Category $category ,  Request $request)
    {
        $recent_posts = Post::latest()->take(5)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count','desc')->take(100)->get();
    
        return view('categories.show',[
            'category'=>$category,
            'posts' => $category->posts()->paginate(1000),
            'recent_posts' => $recent_posts,
            'categories'=>$categories,
        ]);
    }
}
