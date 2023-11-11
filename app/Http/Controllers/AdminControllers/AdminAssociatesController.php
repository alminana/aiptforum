<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Associates;
use Illuminate\Validation\Rule;
class AdminAssociatesController extends Controller
{
    private $rules = [
        'name' => 'required',
        'abbr' => 'required',
        'assignedID' => 'required',
        'country' => 'required',
        'type' => 'required',
    ];
   

    public function index(Request $request)
    {  
        $associates = Associates::latest()->take(1000)->get();

        if ($request->has('search')) {
            $associates = Associates::where('name', 'like', "%{$request->search}%")
            ->paginate(10);
        }
        
        return view('admin_dashboard.associates.index',compact('associates'));
    }

    public function create()
    {
        $associates = Associates::latest()->take(1000)->get();        
        return view('admin_dashboard.associates.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);
        $associates = Associates::latest()->take(1000)->get();
        Associates::create($validated);
        return redirect()->route('admin.associates.create')->with('success', 'Associates has been Created.');
    }

    public function edit(Associates $associates)
    {
       
        return view('admin_dashboard.associates.edit', [
            'associates' => $associates
        ]);
  
    }

    public function update(Request $request, Associates $associates)
    {
        $validated = $request->validate($this->rules);
        
        $associates->update($validated);
        


        return redirect()->route('admin.associates.index', $associates)->with('success', 'Associates has been updated');
    }

    public function destroy(Associate $associates)
    {
      
        $associates->delete();

        return redirect()->route('admin.associates.index')->with('success', 'Associates has been Deleted.');
    }
}
