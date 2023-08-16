<?php

namespace App\Http\Controllers;

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
class PostsController extends Controller
{

    

    public function show(Post $post) {
        // $comments = Comment::orderBy('id', 'DESC')->take(5)->get();
        // $recent_posts = Post::orderBy('id', 'DESC')->take(5)->get();

        // $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();

        // $tags = Tag::latest()->take(50)->get();

        $comments = DB::table('comments')->latest('id')->first();
        $recentPosts = Post::latest('created_at','desc')->take(1000)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(1000)->get();
        $posts = Post::withCount('comments')->get();
        $method = Method::latest()->take(1000)->get();

        return view('post', [
            'comments' => $comments,
            'post' => $post,
            'recent_posts' => $recent_posts,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    public function wordExport($id)
    {
        $post = Post::findOrFail($id);
        $comment = Comment::findOrFail($id);
        $templateProcessor = new TemplateProcessor('word-template/Document.docx');
        $templateProcessor->setValue('id', $post->id);
        $templateProcessor->setValue('image', $post->image ? 'storage/' . $post->image->path : 'storage/placeholders/thumbnail_placeholder.svg' . '');
        $templateProcessor->setValue('aiptref', $post->aiptref);
        $templateProcessor->setValue('title', $post->title);
        $templateProcessor->setValue('slug', $post->slug);
        $templateProcessor->setValue('filingdate', $post->filingdate);
        $templateProcessor->setValue('registrationno', $post->registrationno);
        $templateProcessor->setValue('registrationdate', $post->registrationdate);
        $templateProcessor->setValue('status', $post->status);
        $templateProcessor->setValue('excerpt', $post->excerpt);
        $templateProcessor->setValue('country', $post->country);
        $templateProcessor->setValue('class', $post->class);
        $templateProcessor->setValue('body', $post->body);
        $templateProcessor->setValue('renewal', $post->renewal);

        $templateProcessor->setValue('the_comment', $post->the_comment);
        $templateProcessor->setValue('post_id', $comment->user->name);
        $templateProcessor->setValue('created_at', $comment->created_at);
       
        $fileName = $post->title;
        $templateProcessor->saveAs($fileName . '.docx');
        return response()->download($fileName . '.docx')->deleteFileAfterSend(true);
    }

    // public function generatepdf(Post $post) {
    //     $comments = Comment::orderBy('id', 'DESC')->take(5)->get();
    //     $recent_posts = Post::orderBy('id', 'DESC')->take(5)->get();
    //     $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
    //     $tags = Tag::latest()->take(50)->get();
    //     $posts = Post::latest()->get();
       
        
    //     $pdf = Pdf::loadView('pdf', [
    //         'comments' => $comments,
    //         'post' => $post,
    //         'recent_posts' => $recent_posts,
    //         'categories' => $categories,
    //         'tags' => $tags
    //     ]);

    //     return $pdf->download('download.pdf');
    // }
  
  

    public function addComment(Post $post)
    {
        $attributes = request()->validate([
            'the_comment' => 'required|min:10|max:300'
        ]);

        $attributes['user_id'] = auth()->id();
        $comment = $post->comments()->create($attributes);

        return redirect('/posts/' . $post->id . '#comment_' . $comment->id)->with('success', 'Comment has been added.');
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
   
}