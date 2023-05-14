<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Category;

class AdminCategoriesController extends Controller
{
    private $rules = [
        'name' => 'required|min:3|max:30',
        'slug' => 'required|unique:categories,slug'
    ];

    public function index(Category $category, Request $request)
    {

        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        if ($request->has('search')) {
            $categories = Category::where('name', 'like', "%{$request->search}%")
            ->orWhere('id', 'like', "%{$request->search}%")
            ->orWhere('slug', 'like', "%{$request->search}%")
            ->orWhere('user_id', 'like', "%{$request->search}%")
            ->paginate(10);
        }
        return view('admin_dashboard.categories.index',compact('categories','category'));

    }

    public function create()
    {
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        return view('admin_dashboard.categories.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);
        $validated['user_id'] = auth()->id();
        Category::create($validated);

        return redirect()->route('admin.categories.create')->with('success', 'Category has been Created.');
    }

    public function show(Category $category)
    {
        return view('admin_dashboard.categories.show', [
            'category' => $category
        ]);
    }

    public function edit(Category $category)
    {
        return view('admin_dashboard.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $this->rules['slug'] = ['required', Rule::unique('categories')->ignore($category)];
        $validated = $request->validate($this->rules);
        
        $category->update($validated);

        return redirect()->route('admin.categories.edit', $category)->with('success', 'Category has been Updated.');
    }

   public function destroy(Category $category)
    {
        $default_category_id = Category::where('name', 'Uncategorized')->first()->id;
        
        if($category->name === 'Uncategorized')
            abort(404);
    
        $category->posts()->update(['category_id' => $default_category_id]);

        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category has been Deleted.');
    }
}
