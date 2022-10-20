<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;


class userController extends Controller
{
    private $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'username'=> 'required',
        'password' => 'required|min:8|max:20',
        'image' => 'nullable|file|mimes:jpg,png,webp,svg,jpeg|dimensions:max_width=1000,max_height=1000',
        'role_id' => 'required|numeric'
    ];

    public function edit(User $user)
    {
        $user = User::find($id);
        return view('profiles.edit',compact('user'));
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }// End Method

    public function index(Request $request, Category $category){
        $id = Auth::user()->id;
        $user = User::find($id);
        $recent_posts = Post::latest()->take(5)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        $tags = Tag::latest()->take(50)->get();
        $posts = Post::latest()->take(50)->get();
        return view('profiles.index',compact('posts','categories') ,[
            'category' => $category,
            'posts' => $category->posts()->paginate(10),
            'recent_posts' => $recent_posts,
            'categories' => $categories,
            'tags' => $tags,
            'user' => $user,
            'roles' => Role::pluck('name', 'id')
        ]);
    }// End Method 

    // public function update(Request $request, User $user)
    // {
    //     $this->rules['password'] = 'nullable|min:3|max:20';
    //     $this->rules['email'] = ['required', 'email', Rule::unique('users')->ignore($user)];
    //     $validated = $request->validate($this->rules);
        
    //     if($validated['password'] === null)
    //         unset($validated['password']);
    //     else 
    //         $validated['password'] = Hash::make($request->input('password'));

    //     $user->update($validated);

    //     if($request->has('image'))
    //     {
    //         $image = $request->file('image');
    //         $filename = $image->getClientOriginalName();
    //         $file_extension = $image->getClientOriginalExtension();
    //         $path = $image->store('images', 'public');

    //         $user->image()->create([
    //             'name' => $filename,
    //             'extension' => $file_extension,
    //             'path' => $path,
          
    //         ]);
    //     }

    //     return redirect()->route('profiles.index', $user)->with('success', 'User has been updated.');
    // }


    public function update(Request $request, User $user)
    {
        $this->rules['password'] = 'nullable|min:3|max:20';
        $this->rules['email'] = ['required', 'email', Rule::unique('users')->ignore($user)];

        $validated = $request->validate($this->rules);
        
        if($validated['password'] === null)
            unset($validated['password']);
        else 
            $validated['password'] = Hash::make($request->input('password'));
      
        $user->update($validated);
        dd($user);
      

        return redirect()->route('profiles.index', $user)->with('success', 'User has been updated.');
    }
  
}
