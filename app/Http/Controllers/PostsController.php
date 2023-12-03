<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category; 
use App\Models\Tag;
use App\Models\Comment;
use App\Models\Client;
use App\Models\Method;
use PhpOffice\PhpWord\TemplateProcessor;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use DB;
use Excel;
use App\Exports\PostExport;
class PostsController extends Controller
{
 

    private $rules = [
        'assignedID' => 'required',
        'aiptref'=>'required',
        'clientref'=> 'required',
        'title'=> 'required',
        'agent'=> 'required',
        'slug'=> 'required',
        'proceduredate'=>'required',
        'requesteddate'=>'required',
        'registrationno'=>'required',
        'class'=>'required',
        'filingdate'=>'required',
        'applicant'=>'required',
        'excerpt' => 'required|max:1000',
        'status'=> 'required',
        'country'=> 'required',
        'category_id' => 'required|numeric',
        'inputPfolderlink' => 'required',
        'body' => 'required',
];    

    public function exportToCSV()
    {
      return Excel::download(new PostExport(), 'Trademark.xlsx');
    }

    public function show(Post $post) {
        $recent_posts = Post::latest()->take(5)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        $method = Method::latest()->take(1000)->get();
        $tags = Tag::latest()->take(50)->get();
        $comments = Comment::orderBy('id', 'DESC')->take(5)->get();
        return view('post', [
            'comments' => $comments,
            'post' => $post,
            'recent_posts' => $recent_posts,
            'categories' => $categories,
            'tags' => $tags
        ]);

    }
    
    
    public function create()
    {
        $clients = Client::all();
        $recent_posts = Post::latest()->take(5)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        $method = Method::latest()->take(1000)->get();
        $tags = Tag::latest()->take(50)->get();
        $comments = Comment::orderBy('id', 'DESC')->take(5)->get();
        return view('post.create',compact('clients','method','categories','tags','clients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);
        $validated['user_id'] = auth()->id();
        $post = Post::create($validated);
        $method = Method::all();

          if($request->has('thumbnail'))
        {

            $thumbnail = $request->file('thumbnail');
            $filename = $thumbnail->getClientOriginalName();
            $file_extension = $thumbnail->getClientOriginalExtension();
            $path = $thumbnail->store('images', 'public');

            $post->image()->create([
                'name' => $filename,
                'extension' => $file_extension,
                'path' => $path
            ]);
            // $thumbnail = $request->file('thumbnail');
            // $filename = $thumbnail->getClientOriginalName();
            // $file_extension = $thumbnail->getClientOriginalExtension();
            // $path = $thumbnail->store('images', 'public');
            // $path = $request->file('thumbnail')->store('images/', 's3');

            // $path = Storage::disk('s3')->put('images', $request->file('thumbnail'), 'public');

            //save image name in database
           

            // $post->image()->create([
            //     'name' => $filename,
            //     'extension' => $file_extension,
            //     'path' => $path,
            //     'filename' => basename($path),
            //     'url' => Storage::disk('s3')->url('$path')
            // ]);
   
        }
        return redirect()->route('categories.index')->with('success', 'Post has been created.');

    }

    // public function store(Request $request)
    // {
    //     $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
    //     $clients = Client::all();
    //     $method = Method::latest()->take(1000)->get();
    //     $validated = $request->validate($this->rules);
    //     $validated['user_id'] = auth()->id();
    //     $post = Post::create($validated);
    //     $post = Post::all();
    //     return redirect()->route('post.create',compact('clients','method','categories'))->with('success', 'Patent has been Created.');
    // }


    public function search(Post $post, Request $request)
    {
        $recent_posts = Post::latest()->take(5)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        $method = Method::latest()->take(1000)->get();
        $tags = Tag::latest()->take(50)->get();
        $comments = Comment::orderBy('id', 'DESC')->take(5)->get();
        $query = $request->input('search');
        $posts = Post::where('assignedID', 'like', "%$query%")
                     ->orWhere('aiptref', 'like', "%$query%")
                     ->orWhere('clientref', 'like', "%$query%")
                     ->orWhere('title', 'like', "%$query%")
                     ->orWhere('agent', 'like', "%$query%")
                     ->orWhere('slug', 'like', "%$query%")
                     ->orWhere('applicant', 'like', "%$query%")
                     ->orWhere('filingdate', 'like', "%$query%")
                     ->orWhere('registrationno', 'like', "%$query%")
                     ->orWhere('status', 'like', "%$query%")
                     ->orWhere('proceduredate', 'like', "%$query%")
                     ->orWhere('requesteddate', 'like', "%$query%")
                     ->orWhere('country', 'like', "%$query%")
                     ->orWhere('class', 'like', "%$query%")
                     ->get();
    
        return view('categories.search', compact('posts', 'query'));

    }

    public function addComment(Post $post)
    {
        $attributes = request()->validate([
            'the_comment' => 'required|min:10|max:300'
        ]);

        $attributes['user_id'] = auth()->id();
        $comment = $post->comments()->create($attributes);

        return redirect('/posts/' . $post->id . '#comment_' . $comment->id)->with('success', 'Comment has been added.');
    }

    public function destroy(Post $post)
    {
        $method = Method::all();    
        $post->tags()->delete();
        $post->delete();
        Alert::success('Successfully Delete','Delete');
        return redirect()->route('admin.posts.index')->with('success', 'Post has been Deleted.');
    }
   
    public function printthis(Post $post ,Request $request){
        $comments = Comment::orderBy('id', 'DESC')->take(5)->get();
        $recent_posts = Post::orderBy('id', 'DESC')->take(5)->get();

        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();

        $tags = Tag::latest()->take(50)->get();

        return view('print', [
            'comments' => $comments,
            'post' => $post,
            'recent_posts' => $recent_posts,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }
    
    public function getRemainingDaysAttribute()
    {
        if ($this->sub_end_date) {
            $remaining_days = Carbon::now()->diffInDays(Carbon::parse($this->sub_end_date));
        } else {
            $remaining_days = 0;
        }
        return $remaining_days;
    }

    public function deadline(Request $request){
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        $posts = Post::orderBy('id','desc')->orderBy('id','desc')->where('body','New')->take(100)->get();
        

    return view('deadline.index',compact('posts','categories'));
    }
    
    

    public function notification(Request $request , Post $posts ){
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        $posts = Post::orderBy('id','desc')->orderBy('id','desc')->where('body','Process')->take(100)->get();
        return view('deadline.notification',compact('posts','categories'));
    } 

    public function edit(Post $post)
    
    {   
        $now = Carbon::now();
        $comments = Comment::orderBy('id', 'DESC')->take(1000)->get();
        $recent_posts = Post::orderBy('id', 'DESC')->take(1000)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        $tags = Tag::latest()->take(1000)->get();
        $posts = Post::latest()->take(1000)->get();
        $method = Method::latest()->take(1000)->get();
        return view('admin_dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::pluck('name', 'id'),
            'clients'=>$clients,
            'method' > $method
        ],compact('clients','method','post'));
    }
   
    public function getData(Request $request , Post $posts ){
        $comments = DB::table('comments')->latest('id')->first();
        $recentPosts = Post::latest('created_at','desc')->take(1000)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        $posts = Post::withCount('comments')->get();
        $method = Method::latest()->take(1000)->get();
        $clients = Client::latest()->take(1000)->get();
    

        $sdate = date('Y-m-d',strtotime($request->start_date));
        $edate = date('Y-m-d',strtotime($request->end_date));
        $allData = Post::whereBetween('created_at',[$sdate,$edate])->get();


        $start_date = date('Y-m-d',strtotime($request->start_date));
        $end_date = date('Y-m-d',strtotime($request->end_date));
        return view('deadline.getData',compact('allData','start_date','end_date','categories'));
    }

    public function trademarkRequestfilter(Request $request , Post $posts ){
        $comments = DB::table('comments')->latest('id')->first();
        $recentPosts = Post::latest('created_at','desc')->take(1000)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        $posts = Post::withCount('comments')->get();
        $method = Method::latest()->take(1000)->get();
        $clients = Client::latest()->take(1000)->get();
    

        $sdate = date('Y-m-d',strtotime($request->start_date));
        $edate = date('Y-m-d',strtotime($request->end_date));
        $allData = Post::whereBetween('requesteddate',[$sdate,$edate])->get();


        $start_date = date('Y-m-d',strtotime($request->start_date));
        $end_date = date('Y-m-d',strtotime($request->end_date));
        return view('deadline.trequested',compact('allData','start_date','end_date','categories'));
    }

    public function trademarkactualfilter(Request $request , Post $posts ){
        $comments = DB::table('comments')->latest('id')->first();
        $recentPosts = Post::latest('created_at','desc')->take(1000)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        $posts = Post::withCount('comments')->get();
        $method = Method::latest()->take(1000)->get();
        $clients = Client::latest()->take(1000)->get();
    

        $sdate = date('Y-m-d',strtotime($request->start_date));
        $edate = date('Y-m-d',strtotime($request->end_date));
        $allData = Post::whereBetween('requesteddate',[$sdate,$edate])->get();


        $start_date = date('Y-m-d',strtotime($request->start_date));
        $end_date = date('Y-m-d',strtotime($request->end_date));
        return view('deadline.tactual',compact('allData','start_date','end_date','categories'));
    }
   
    public function dashboard(Request $request , Post $posts ){
        $comments = DB::table('comments')->latest('id')->first();
        $recentPosts = Post::latest('created_at','desc')->take(1000)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        $posts = Post::withCount('comments')->get();
        $method = Method::latest()->take(1000)->get();
        $clients = Client::latest()->take(1000)->get();

   
        
        $sdate = date('Y-m-d',strtotime($request->start_date));
        $edate = date('Y-m-d',strtotime($request->end_date));
        $allData = Post::whereBetween('created_at',[$sdate,$edate])->get();


        $start_date = date('Y-m-d',strtotime($request->start_date));
        $end_date = date('Y-m-d',strtotime($request->end_date));

        $allData = Post::where('status',$request->status)->get();    

        return view('deadline.dashboard',compact('allData','clients','method','categories','clients','start_date','end_date'));
    }

    public function dashboardsearch(Request $request , Post $posts ){
        $comments = DB::table('comments')->latest('id')->first();
        $recentPosts = Post::latest('created_at','desc')->take(1000)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        $posts = Post::withCount('comments')->get();
        $method = Method::latest()->take(1000)->get();
        $clients = Client::latest()->take(1000)->get();

   
        
        $sdate = date('Y-m-d',strtotime($request->start_date));
        $edate = date('Y-m-d',strtotime($request->end_date));
        $allData = Post::whereBetween('created_at',[$sdate,$edate])->get();


        $start_date = date('Y-m-d',strtotime($request->start_date));
        $end_date = date('Y-m-d',strtotime($request->end_date));

        $allData = Post::where('status',$request->status)->get();    

        return view('deadline.dashboard',compact('allData','clients','method','categories','clients','start_date','end_date'));
    }
}