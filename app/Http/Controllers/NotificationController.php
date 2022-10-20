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
        $comments = DB::table('comments')->latest('id')->first();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        $anchor = Carbon::today()->subDay(7);
        $posts = Post::where('created_at', '>=',  $anchor)->get();
        return view('notification.index', [
            'posts' => $category->posts()->paginate(10),
            'categories' => $categories,
        ]);
    }

}
