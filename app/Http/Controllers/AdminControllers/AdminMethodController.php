<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Method;
use Illuminate\Validation\Rule;
class AdminMethodController extends Controller
{
    private $rules = [
        'method' => 'required'
    ];
    public function index(Request $request)
    {  
        $methods = Method::latest()->take(5)->get();
        if ($request->has('search')) {
            $methods = Method::where('method', 'like', "%{$request->search}%")
            ->paginate(10);
        }
        return view('admin_dashboard.method.index',compact('methods'));
    }

    public function create()
    {
        $methods = Method::latest()->take(5)->get();
        return view('admin_dashboard.method.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);
        $methods = Method::latest()->take(10)->get();
        Method::create($validated);
        return redirect()->route('admin.method.index')->with('success', 'Method has been Created.');

    }

    public function edit(Method $method)
    {
        return view('admin_dashboard.method.edit', [
            'method' => $method
        ]);
    }

    public function update(Request $request, Method $method)
    {
        $validated = $request->validate($this->rules);
        
        $method->update($validated);
        
        return redirect()->route('admin.method.index', $method)->with('success', 'Method has been updated');
    }

    public function destroy(Method $method)
    {
        $method->delete();
        return redirect()->route('admin.method.index')->with('success', 'Method has been Deleted.');
    }
}
