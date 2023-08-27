<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Past;
use App\Models\Client;
use App\Models\Method;
use App\Models\Pcomment;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use App\Http\Requests\PastRequest;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
class AdminpastController extends Controller
{
    private $rules = [
        'aiptref'=>'required',
        'clientref'=>'required',
        'title'=>'required',
        'client'=>'required',

        // //selection for patent filing
        'pct_date'=>'required',
        'pct_no' =>'required',
        'regular_date'=>'required',
        'pct_no' =>'required',
        'regular_no'=>'required',
        'filingno' =>'required',

        //date of filing
        'procedure'=>'required',
        'requesteddate'=>'required',
        'proceduredate'=>'required',
      
        //annuity selection
        'country'=>'required',
        'annuity'=>'required',
        'annual_office_fee'=>'required',
        'annual_deadline'=>'required',
        //comment
        'deadline_Status'=>'required',
        //user

    ];

    public function index(Request $request) 
    {
        $past = Past::latest()->take(1000)->get();
        $clients = Client::all();
        $method = Method::all();
        return view('admin_dashboard.past.index',compact('past','clients','method'));
    }

   
    public function create()
    {
        $clients = Client::all();
        $method = Method::all();
        return view('admin_dashboard.past.create',compact('clients','method'));

    }

    public function store(Request $request)
    {
        $clients = Client::all();
        $method = Method::latest()->take(1000)->get();
        $validated = $request->validate($this->rules);
        $validated['user_id'] = auth()->id();
        $past = Past::create($validated);
        $past = Past::all();
        return redirect()->route('admin.past.index',compact('clients','method'))->with('success', 'Patent has been Created.');
    }

    public function edit(Past $past )
    {
        $clients = Client::all();
        $method = Method::all();
        return view('admin_dashboard.past.edit')->with([
            'past' => $past,
            'clients'=>$clients,
            'method' => $method,
        ],compact('past','clients','method'));
    }
 
    public function update(Request $request, Past $past)
    {
       
        $validated = $request->validate($this->rules);
        
        $past->update($validated);

        dd('$past');
        // return redirect()->route('admin_dashboard.past.index', $past)->with('success', 'Patent has been Updated.');

    }
  
    // public function destroy(Past $past)
    // {
    //     $past->delete();

    //     return redirect()->route('admin.past.index')->with('success', 'Patent has been Deleted.');
    // }
    public function delete(\Illuminate\Http\Request $request)
{
    $id = $request->get('id', false);
    // TODO: Check for validation
    $past = DB::select('select '.$id.' from past');
    $past -> delete();
    return redirect()->route('admin.past.index')->with('success', 'Patent has been Deleted.');
}
}
