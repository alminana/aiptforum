<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Tag;
class AdminCommentsController extends Controller
{
    private $rules = [
        'post_id' => 'required|numeric',
        'the_comment' => 'required|min:3|max:1000'
    ];

    public function index(Request $request)
    {


        $recent_posts = Post::latest()->take(1000)->get();

        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(1000)->get();

        $tags = Tag::latest()->take(50)->get();
        $comments = Comment::latest()->take(1000)->get();
        
        if ($request->has('search')) {
            $comments = Comment::where('the_comment', 'like', "%{$request->search}%")->paginate(10);
        }
        return view('admin_dashboard.comments.index',compact('comments'), [
            'comments' => Comment::orderBy('id', 'DESC')->paginate(50),
        ]);
    }
    
    public function create()
    {
        return view('admin_dashboard.comments.create', [
            'posts' => Post::pluck('title', 'id')
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);
        $validated['user_id'] = auth()->id();

        Comment::create($validated);
        return redirect()->route('admin.comments.create')->with('success', 'Comment has been added.');
    }
    
    public function edit(Comment $comment)
    {
        return view('admin_dashboard.comments.edit', [
            'posts' => Post::pluck('title', 'id'),
            'comment' => $comment
        ]);
    }

    public function update(Request $request, Comment $comment)
    {
        $validated = $request->validate($this->rules);
        $comment->update($validated);
        return redirect()->route('admin.comments.edit', $comment)->with('success', 'Comment has been updated.');
    }
    
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('admin.comments.index')->with('success', 'Comment has been deleted.');
    }
}
