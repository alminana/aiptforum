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
use DB;
use Carbon\Carbon;
use App\Models\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class AdminPostsController extends Controller
{
    private $rules = [
                            'aiptref'=>'required',
                            'clientref'=> 'required',
                            'title'=> 'required',
                            'agent'=> 'required',
                            'slug'=> 'required',
                            'proceduredate'=>'required',
                            'requesteddate'=>'required',
                            'registrationno'=>'required',
                            'class'=>'required',
                            'renewal'=>'required',
                            'excerpt' => 'required|max:1000',
                            'status'=> 'required',
                            'country'=> 'required',
                            'category_id' => 'required|numeric',
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
        return redirect()->route('admin.posts.index')->with('success', 'Post has been created.');
        // dd($post);
// -----------------------
        // if($request->has('thumbnail'))
        // {
        //     // $thumbnail = $request->file('thumbnail');
        //     $filename = $thumbnail->getClientOriginalName();
        //     $file_extension = $thumbnail->getClientOriginalExtension();
        //     $path = $request->file('thumbnail')->store('images', 's3');

        //     // Storage::disk('s3')->delete($path. "/".$file_extension );

        //     $post->image()->create([
        //         'name' => $filename,
        //         'extension' => $file_extension,
        //         'path' => $path
        //     ]);

        //     $url = Storage::disk('s3')->url($path."/".$file_extension);
        // }
// ------------------------
        // $path = $request->file('thumbnail')->store('images', 's3');

        // Storage::disk('s3')->setVisibility($path, 'private');

        //     // c->image()->create([
        //      $post->image()->create([
        //     'name' => $filename,
        //     'extension' => $file_extension,
        //     'path' => basename($path),
        //     'url' => Storage::disk('s3')->url($path),
        // ]);

//  -----------------------------------------------
      
        // if($request->has('thumbnail'))
        // {
            // $thumbnail = $request->file('thumbnail');
            // $filename = $thumbnail->getClientOriginalName();
            // $file_extension = $thumbnail->getClientOriginalExtension();
            // $path = $thumbnail->store('images', 'public');
            // $path = $thumbnail->store('images', 'public');

            // $post->image()->create([
            //     'name' => $filename,
            //     'extension' => $file_extension,
            //     'path' => $path
            // ]);
        // }

        
    }

    public function show($id)
    {
        //
    }
    
    public function edit(Post $post)
    {
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
        $validated = $request->validate($this->rules);
        $validated['approved'] = $request->input('approved') !== null;
        $method = Method::all();
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
            // $thumbnail = $request->file('thumbnail');
            // $filename = $thumbnail->getClientOriginalName();
            // $file_extension = $thumbnail->getClientOriginalExtension();
            // $path = $thumbnail->store('images', 'public');
            // $path = $request->file('thumbnail')->store('images/', 's3');

            // $path = Storage::disk('s3')->put('images', $request->file('thumbnail'), 'public');

            //save image name in database
           
            // $post->image()->update([
            //     'name' => $filename,
            //     'extension' => $file_extension,
            //     'path' => $path,
            //     'filename' => basename($path),
            //     'url' => Storage::disk('s3')->url('$path')
            // ]);
   
        }
        return redirect()->route('admin.posts.index', $post)->with('success', 'Post has been updated.');

        // if($request->has('thumbnail'))
        // {
        //     $thumbnail = $request->file('thumbnail');
        //     $filename = $thumbnail->getClientOriginalName();
        //     $file_extension = $thumbnail->getClientOriginalExtension();
        //     $path = $thumbnail->store('images', 'public');

        //     $post->image()->update([
        //         'name' => $filename,
        //         'extension' => $file_extension,
        //         'path' => $path
        //     ]);
        // }

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
        $recent_posts = Post::latest()->take(10)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        $tags= Tag::all();
        $post = Post::latest()->take(1000)->get();
        $clients = Client::all();
        $method = Method::latest()->take(1000)->get();
        return view('print', [
            'post' => $post,
            'categories' => Category::pluck('name', 'id'),
            'clients'=>$clients,
            'method' > $method
        ],compact('clients','method','post'));
    }
    
   
}