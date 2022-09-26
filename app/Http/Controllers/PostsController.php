<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category; 
use App\Models\Tag;
use App\Models\Comment;
use PhpOffice\PhpWord\TemplateProcessor;
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
        $templateProcessor->setValue('aiptref', $post->aiptref);
        $templateProcessor->setValue('title', $post->title);
        $templateProcessor->setValue('slug', $post->slug);
        $templateProcessor->setValue('filingdate', $post->filingdate);
        $templateProcessor->setValue('status', $post->status);
        $templateProcessor->setValue('excerpt', $post->excerpt);
        $templateProcessor->setValue('country', $post->country);
        $templateProcessor->setValue('class', $post->class);
        $templateProcessor->setValue('body', $post->body);
        $templateProcessor->setValue('renewal', $post->renewal);
        $templateProcessor->setValue('the_comment', $comment->the_comment);

        $templateProcessor->setValue('post_id', $comment->user->name);
        $templateProcessor->setValue('created_at', $comment->created_at);
        $fileName = $post->title;
        $templateProcessor->saveAs($fileName . '.docx');
        return response()->download($fileName . '.docx')->deleteFileAfterSend(true);
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

    
}
