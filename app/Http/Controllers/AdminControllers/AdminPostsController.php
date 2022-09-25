<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;

class AdminPostsController extends Controller
{
    private $rules = [
        'title' => 'required|max:200',
        'slug' => 'required|max:200',
        'filingdate'=> 'required',
        'registrationno'=> 'required',
        'registrationdate'=>'required',
        'renewal' => 'required',
        'excerpt' => 'required|max:1000',
        'category_id' => 'required|numeric',
        'class' => 'required',
        'aiptref' => 'required',
        'status' => 'required',
        'country' => 'required',
        'thumbnail' => 'required|file|mimes:jpg,png,webp,svg,jpeg',
        'body' => 'required',
    ];

    public function index(Request $request)
    {
        $recent_posts = Post::latest()->take(5)->get();

        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();

        $tags= Tag::all();
        $posts = Post::all();
        
        if ($request->has('search')) {
            $posts = Post::where('body', 'like', "%{$request->search}%")
            ->orWhere('id', 'like', "%{$request->search}%")
            ->orWhere('title', 'like', "%{$request->search}%")
            ->orWhere('slug', 'like', "%{$request->search}%")
            ->orWhere('excerpt', 'like', "%{$request->search}%")
            ->orWhere('class', 'like', "%{$request->search}%")
            ->orWhere('country', 'like', "%{$request->search}%")
            ->orWhere('status', 'like', "%{$request->search}%")
            ->orWhere('aiptref', 'like', "%{$request->search}%")
            ->orWhere('created_at', 'like', "%{$request->search}%")
            ->paginate(10);
        }
        return view('admin_dashboard.posts.index',compact('posts','tags'));

    }

    public function create()
    {
        $tags = Tag::latest()->take(50)->get();
        return view('admin_dashboard.posts.create', [
            'tags'=> Tag::all(),
            'categories' => Category::pluck('name', 'id')
        ]);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);
        $validated['user_id'] = auth()->id();
        $post = Post::create($validated);

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
        }

        // $tags = explode(',', $request->input('tags'));
        // $tags_ids = [];
        // foreach($tags as $tag){
        //     $tag_ob = Tag::create(['name' => trim($tag)]);
        //     $tags_ids[] = $tag_ob->id;
        // }
        
        // if(count($tags_ids) > 0)
        //     $post->tags()->sync( $tags_ids );

        return redirect()->route('admin.posts.create')->with('success', 'Post has been created.');
    }

    public function show($id)
    {
        //
    }
    
    public function edit(Post $post)
    {
        // $tags = '';
        // foreach($post->tags as $key => $tag)
        // {
        //     $tags .s= $tag->name;
        //     if($key !== count($post->tags) - 1)
        //         $tags .= ', ';
        // }
        
        return view('admin_dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::pluck('name', 'id')
        ]);
    }
    
    public function update(Request $request, Post $post)
    {
        $this->rules['thumbnail'] = 'nullable|file|mimes:jpg,png,webp,svg,jpeg';
        $validated = $request->validate($this->rules);
        $validated['approved'] = $request->input('approved') !== null;

        $post->update($validated);

        if($request->has('thumbnail'))
        {
            $thumbnail = $request->file('thumbnail');
            $filename = $thumbnail->getClientOriginalName();
            $file_extension = $thumbnail->getClientOriginalExtension();
            $path = $thumbnail->store('images', 'public');

            $post->image()->update([
                'name' => $filename,
                'extension' => $file_extension,
                'path' => $path
            ]);
        }

        $tags = explode(',', $request->input('tags'));
        $tags_ids = [];
        foreach($tags as $tag){

            $tag_exist = $post->tags()->where('name', trim($tag) )->count();
            if($tag_exist == 0) {
                $tag_ob = Tag::create(['name' => $tag]);
                $tags_ids[] = $tag_ob->id;
            }
        }
        
        if(count($tags_ids) > 0)
            $post->tags()->syncWithoutDetaching( $tags_ids );
        

        return redirect()->route('admin.posts.edit', $post)->with('success', 'Post has been updated.');
    }

    public function destroy(Post $post)
    {
        $post->tags()->delete();
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Post has been Deleted.');
    }
}