<?php

namespace App\Http\Controllers\AdminControllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

use App\Models\Role;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;
use Auth;

class AdminProfileController extends Controller
{
    private $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|max:20',
        'image' => 'nullable|file|mimes:jpg,png,webp,svg,jpeg|dimensions:max_width=1000,max_height=1000',
        'role_id' => 'required|numeric'
    ];

    public function index(User $user)
    {
        $recent_posts = Post::latest()->take(5)->get();

        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();

        $tags= Tag::all();
        $posts = Post::all();
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('profiles.index', [
            'user' => User::with('role')->paginate('50'),
        ],compact('user','categories'));
    }

    public function update(Request $request){

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword )) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();
        }

            return view('profiles.index', [
                'user' => User::with('role')->paginate('50'),
            ],compact('user','categories'));

    }// End Method


}
