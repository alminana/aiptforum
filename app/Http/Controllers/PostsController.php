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
class PostsController extends Controller
{

    

    public function show(Post $post) {
        $comments = Comment::orderBy('id', 'DESC')->take(5)->get();
        $recent_posts = Post::orderBy('id', 'DESC')->take(5)->get();

        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();

        $tags = Tag::latest()->take(50)->get();

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

    public function generatepdf(Post $post) {
        $comments = Comment::orderBy('id', 'DESC')->take(5)->get();
        $recent_posts = Post::orderBy('id', 'DESC')->take(5)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        $tags = Tag::latest()->take(50)->get();
        $posts = Post::latest()->get();
       
        
        $pdf = Pdf::loadView('pdf', [
            'comments' => $comments,
            'post' => $post,
            'recent_posts' => $recent_posts,
            'categories' => $categories,
            'tags' => $tags
        ]);

        return $pdf->download('download.pdf');
    }
  
  

    public function addComment(Post $post)
    {
        $attributes = request()->validate([
            'the_comment' => 'required|min:10|max:300'
        ]);

        $attributes['user_id'] = auth()->id();
        $comment = $post->comments()->create($attributes);

        return redirect('/posts/' . $post->slug . '#comment_' . $comment->id)->with('success', 'Comment has been added.');
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

    public function deadline(){
        $now = Carbon::now();
        $comments = Comment::orderBy('id', 'DESC')->take(5)->get();
        $recent_posts = Post::orderBy('id', 'DESC')->take(5)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        $tags = Tag::latest()->take(50)->get();
        $posts = Post::latest()->get();
        $method = Method::latest()->get();

        // foreach($posts as $post)
        // {
        // if ($post->proceduredate) {
        //     $remaining_days = Carbon::now()->diffInDays(Carbon::parse($post->proceduredate));
        // } else {
        //     $remaining_days = 0;
        // }
        // return $remaining_days;
        // }
  

        // foreach($posts as $post)
        // {
        // $end_date = $post->proceduredate;
        // $cDate = Carbon::parse($end_date);
        // $count = $now->diffInDays($cDate );
        // }
        // return $count;

        return view('deadline.index', [
            'comments' => $comments,
            'posts' => $posts,
            'recent_posts' => $recent_posts,
            'categories' => $categories,
            'tags' => $tags,
            'method' => $method,
        ]);
    }


}