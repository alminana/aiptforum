<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\Client;
use App\Models\Method;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
class AdminPostsController extends Controller
{
    private $rules = [
        'aiptref' => 'required',
        'clientref'=> 'required',
        'title' => 'required',
        'agent' =>'required',
        // 'slug' => 'required',
        // 'filingdate'=> 'required',
        // 'pubdate' => 'required',
        // 'appealdate' => 'required',
        // 'opposedate' => 'required',
        'registrationno'=> 'required',
        // 'registrationdate'=>'required',
        // 'renewal' => 'required',
        'excerpt' => 'required|max:1000',
        'status' => 'required',
        'country' => 'required',
        'class' => 'required',
        'category_id' => 'required|numeric',
        'annuitydue' => 'required',
        // 'annuitydeadline' => 'required',
        'thumbnail' => 'required|file|mimes:jpg,png,webp,svg,jpeg',
        'body' => 'required',
       
    ];
    public function generatepdf(Post $post) {
        $comments = Comment::orderBy('id', 'DESC')->take(5)->get();
        $recent_posts = Post::orderBy('id', 'DESC')->take(5)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        $tags = Tag::latest()->take(50)->get();
        $posts = Post::latest()->get();
        // return view('pdf', );
        
        $pdf = Pdf::loadView('pdf', [
            'comments' => $comments,
            'post' => $post,
            'recent_posts' => $recent_posts,
            'categories' => $categories,
            'tags' => $tags
        ]);

        return $pdf->download('download.pdf',compact('posts'));
    }

    // public function viewPDF()
    // {
    //     $posts =Post::all();
    //     $pdf = PDF::loadView('pdf.postlist', array('posts'=> $posts))->setPaper('a4', 'portrait');
    //     return $pdf->stream();
    // }

    // public function downloadPDF()
    // {
    //     $posts =Post::all();
    //     $pdf = PDF::loadView('pdf.postlist', array('posts'=> $posts))->setPaper('a4', 'portrait');
    //     return $pdf->stream();
    // }

    // public function exportExcel()
    // {
    //     return Excel::download(PostDataExport::class);
    // }

    public function index(Request $request)
    {
        
        $recent_posts = Post::latest()->take(10)->get();

        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();

        $tags= Tag::all();
        $posts = Post::latest()->take(1000)->get();
        $client = Client::latest()->take(1000)->get();
        $method = Method::latest()->take(1000)->get();
        
        if ($request->has('search')) {
            $posts = Post::where('body', 'like', "%{$request->search}%")
            ->orWhere('id', 'like', "%{$request->search}%")
            ->orWhere('title', 'like', "%{$request->search}%")
            ->orWhere('clientref', 'like', "%{$request->search}%")
            ->orWhere('annuitydue', 'like', "%{$request->search}%")
            ->orWhere('annuitydeadline', 'like', "%{$request->search}%")
            ->orWhere('slug', 'like', "%{$request->search}%")
            ->orWhere('excerpt', 'like', "%{$request->search}%")
            ->orWhere('class', 'like', "%{$request->search}%")
            ->orWhere('country', 'like', "%{$request->search}%")
            ->orWhere('status', 'like', "%{$request->search}%")
            ->orWhere('aiptref', 'like', "%{$request->search}%")
            ->orWhere('created_at', 'like', "%{$request->search}%")
            ->paginate(10);
        }
        return view('admin_dashboard.posts.index',compact('posts','tags','client','method'));

        // return view('admin_dashboard.posts.index', [
        //     'tags'=> Tag::all(),
        //     'client'=> Client::all(),
        //     'posts'=> Post::all(),
        // ],compact('posts','tags','client'));
    }

    public function create()
    {
        $tags = Tag::latest()->take(50)->get();
        $clients = Client::all();
        $method = Method::all();
        return view('admin_dashboard.posts.create', [
            'tags'=> Tag::all(),
            'clients'=> Client::all(),
            'method'=> Method::all(),
            'categories' => Category::pluck('name', 'id')
        ],compact('clients','method'));
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
        $clients = Client::all();
        $method = Method::latest()->take(1000)->get();
        return view('admin_dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::pluck('name', 'id'),
            'clients'=>$clients,
            'method' > $method
        ],compact('clients','method'));
    }
    
    public function update(Request $request, Post $post)
    {
        $this->rules['thumbnail'] = 'nullable|file|mimes:jpg,png,webp,svg,jpeg';
        $validated = $request->validate($this->rules);
        $validated['approved'] = $request->input('approved') !== null;
        $method = Method::latest()->take(10)->get();
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
        $method = Method::all();    
        $post->tags()->delete();
        $post->delete();
        Alert::success('Successfully Delete','Delete');
        return redirect()->route('admin.posts.index')->with('success', 'Post has been Deleted.');
    }


}