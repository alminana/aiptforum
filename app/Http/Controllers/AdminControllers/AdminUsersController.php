<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

use App\Models\Role;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;
class AdminUsersController extends Controller
{
    private $rules = [
        'name' => 'required|min:3',
        'username' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|max:20',
        'image' => 'nullable|file|mimes:jpg,png,webp,svg,jpeg',
        'role_id' => 'required|numeric'
    ];

    public function index( Request $request)
    {
        $recent_posts = Post::latest()->take(1000)->get();

        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();

        $tags= Tag::latest()->take(1000)->get();
        $posts = Post::latest()->take(1000)->get();
        $users= User::latest()->take(1000)->get();
        
        if ($request->has('search')) {
            $users = User::where('name', 'like', "%{$request->search}%")
            ->orWhere('id', 'like', "%{$request->search}%")
            ->orWhere('email', 'like', "%{$request->search}%")
            ->orWhere('role_id', 'like', "%{$request->search}%")
            ->paginate(1000);
        }
        if ($request->has('search'))
        {
            $roles = Role::where('name', 'like', "%{$request->search}%")
            ->orWhere('id', 'like', "%{$request->search}%")
            ->paginate(10);
        }
        return view('admin_dashboard.users.index',compact('users'));
    }

    public function profileindex(User $user,Category $category, Request $request)
    {
        $recent_posts = Post::latest()->take(100)->get();

        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();

        $tags= Tag::latest()->take(1000)->get();
        $posts = Post::latest()->take(1000)->get();
        $users= User::latest()->take(1000)->get();
        $roles = Role::latest()->take(1000)->get();
        if ($request->has('search')) {
            $users = User::where('name', 'like', "%{$request->search}%")
            ->orWhere('id', 'like', "%{$request->search}%")
            ->orWhere('email', 'like', "%{$request->search}%")
            ->orWhere('role_id', 'like', "%{$request->search}%")
            ->paginate(10);
        }
        if ($request->has('search'))
        {
            $roles = Role::where('name', 'like', "%{$request->search}%")
            ->orWhere('id', 'like', "%{$request->search}%")
            ->paginate(10);
        }
        return view('profiles.index',compact('users','roles') ,[
            'category' => $category,
            'posts' => $category->posts()->paginate(10),
            'recent_posts' => $recent_posts,
            'categories' => $categories,
            'tags' => $tags,
            'user' => $user,
            'roles' => Role::pluck('name', 'id')
        ]);

    }
    public function create()
    {
        return view('admin_dashboard.users.create', [
            'roles' => Role::pluck('name', 'id'),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);
        $validated['password'] = Hash::make($request->input('password'));

        $user = User::create($validated);

        if($request->has('image'))
        {
            $image = $request->file('image');
            
            $filename = $image->getClientOriginalName();
            $file_extension = $image->getClientOriginalExtension();
            $path = $image->store('images', 'public');

            $user->image()->create([
                'name' => $filename,
                'extension' => $file_extension,
                'path' => $path
            ]);
        }

        return redirect()->route('admin.users.create')->with('success', 'User has been created.');
    }

    public function edit(User $user)
    {
        return view('admin_dashboard.users.edit', [
            'user' => $user,
            'roles' => Role::pluck('name', 'id')
        ]);
    }

    public function show(User $user)
    {
        return view('admin_dashboard.users.show',[
            'user' => $user
        ]);
    }
    
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

        if($request->has('image'))
        {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $file_extension = $image->getClientOriginalExtension();
            $path = $image->store('images', 'public');

            $user->image()->update([
                'name' => $filename,
                'extension' => $file_extension,
                'path' => $path
            ]);
        }

        return redirect()->route('admin.users.edit', $user)->with('success', 'User has been updated.');
    }
    
    public function destroy(User $user)
    {
        if($user->id === auth()->id())
            return redirect()->back()->with('error', 'You can not delete your self.');

        User::whereHas('role', function($query){
            $query->where('name', 'admin');
        })->first()->posts()->saveMany( $user->posts );

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User has been deleted.');
    }

   /** 
    *  @param Integer 
    *  @param Integer
    *  @return Success
    * */
   public function updateStatus ($user_id, $status_code){
        try {
            $update_user  = User::whereId()->update([
                'status' => $status_code
            ]);

            if($update_user){
                return redirect()->route('admin.users.index')->with('success', 'User Status Updated');
            }

            return redirect()->route('admin.users.index')->with('error', 'Fail lto update user status');
        } catch (\Throwable $th) {
            //throw $th;
        }
   }

}
