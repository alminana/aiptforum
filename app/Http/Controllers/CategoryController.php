<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\Client;
use App\Models\Method;
use DB;
use Carbon\Carbon;
class CategoryController extends Controller
{
    public function downloadPdf(Post $post) {
        
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(1000)->get();
        // return view('pdf', );
        
        $pdf = Pdf::loadView('pdf', [
            'post' => $post,
        ]);

        return $pdf->download('download.pdf');
    }

    public function viewPDF()
    {
        $posts =Post::all();
        $pdf = PDF::loadView('pdf.postlist', array('posts'=> $posts))->setPaper('a4', 'portrait');
        return $pdf->stream();
    }


    public function exportExcel()
    {
        return Excel::download(PostDataExport::class);
    }

    public function index(Request $request)
    {
        $comments = DB::table('comments')->latest('id')->first();
        $recentPosts = Post::latest('created_at','desc')->take(1000)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(1000)->get();
        $posts = Post::withCount('comments')->get();
        $method = Method::latest()->take(1000)->get();
   
        return view('categories.index', [
            'posts' => $posts,
            'recentPosts' => $recentPosts,
            'categories' => Category::withCount('posts')->paginate(1000),
            'comments' => $comments,
        ], compact('posts','comments', 'method'));
    }

    // public function show(Category $category , Request $request)
    // {
    //     $comments = DB::table('comments')->latest('id')->first();
    //         $recentPosts = Post::latest('created_at','desc')->take(5)->get();
    //         $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
    //         $posts = Post::withCount('comments')->get();

    //     if ($request->has('search')) {
    //         $posts = Post::where('body', 'like', "%{$request->search}%")
    //         ->orWhere('id', 'like', "%{$request->search}%")
    //         ->orWhere('title', 'like', "%{$request->search}%")
    //         ->orWhere('filingdate', 'like', "%{$request->search}%")
    //         ->orWhere('registrationno', 'like', "%{$request->search}%")
    //         ->orWhere('registrationdate', 'like', "%{$request->search}%")
    //         ->orWhere('renewal', 'like', "%{$request->search}%")
    //         ->orWhere('slug', 'like', "%{$request->search}%")
    //         ->orWhere('excerpt', 'like', "%{$request->search}%")
    //         ->orWhere('class', 'like', "%{$request->search}%")
    //         ->orWhere('status', 'like', "%{$request->search}%")
    //         ->orWhere('country', 'like', "%{$request->search}%")
    //         ->orWhere('aiptref', 'like', "%{$request->search}%")
    //         ->orWhere('created_at', 'like', "%{$request->search}%")
    //         ->paginate(1000);
    //     }
    //     return view('categories.show', [
    //         'posts' => $posts,
    //         'recentPosts' => $recentPosts,
    //         'categories' => Category::withCount('posts')->paginate(100),

    //         'comments' => $comments,
    //         'category' => $category,
    //     ]);
    // }

//     public function show(Category $category)
//  {
//     $comments = DB::table('comments')->latest('id')->first();
//     $recent_posts = Post::latest('created_at','desc')->take(1000)->get();
//     $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(1000)->get();
//     $posts = Post::withCount('comments')->get();
//     $method = Method::latest()->take(1000)->get();
    
//     return view('categories.show',[
//         'category'=>$category,
//         'posts' => $category->posts()->paginate(1000),
//         'recent_posts' => $recent_posts,
//         'categories'=>$categories,
//         'methos'=>$method,
//     ], compact('posts','comments', 'method'));
//  }
public function show(Category $category)
{
    $comments = DB::table('comments')->latest('id')->first();
    $recentPosts = Post::latest('created_at','desc')->take(1000)->get();
    $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(1000)->get();
    $posts = Post::withCount('comments')->get();
    $method = Method::latest()->take(1000)->get();

    return view('categories.index', [
        'posts' => $posts,
        'recentPosts' => $recentPosts,
        'categories' => Category::withCount('posts')->paginate(1000),
        'comments' => $comments,
    ], compact('posts','comments', 'method'));
}
 public function getData(Request $request){
    $comments = DB::table('comments')->latest('id')->first();
    $recentPosts = Post::latest('created_at','desc')->take(1000)->get();
    $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(1000)->get();
    $posts = Post::withCount('comments')->get();
    $method = Method::latest()->take(1000)->get();
    $clients = Client::latest()->take(1000)->get();


    $searchTerm = $request->status;
    $dateFrom = $request->datefrom;
    $dateTo = $request->dateto;

    $posts = Post::where('status', 'LIKE', "%{$searchTerm}%")->orWhere('proceduredate', 'LIKE', "%{$searchTerm}%")->whereBetween('proceduredate',[$dateFrom."00:00:00",$dateTo."23:59:59"])->get();
    if ($request->has('status')) {
                $posts = Post::where('status', 'like', "%{$request->search}%")
                ->orWhere('id', 'like', "%{$request->search}%")
                
                ->paginate(1000);
            }
    return view('categories.show', [
        'posts' => $posts,
        'categories' => Category::pluck('name', 'id'),
        'clients'=>$clients,
        'method'=>$method,
    ],compact('clients','method', 'posts','categories'));
}


}


