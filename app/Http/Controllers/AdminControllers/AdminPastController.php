<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Past;
use App\Models\Client;
use App\Models\Method;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
class AdminPastController extends Controller
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
        return view('admin_dashboard.patent.index',compact('past'));
    }

    public function create()
    {
        $clients = Client::all();
        $method = Method::all();
        $past = Past::all();
        return view('admin_dashboard.patent.create', [
            'clients'=> Client::all(),
            'method'=> Method::all(),
        ],compact('clients','method','past'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);
        $validated['user_id'] = auth()->id();
        $past = Past::create($validated);
        $past = Past::all();
        return view('admin_dashboard.patent.index',compact('past'));
    }

    public function edit(Past $past )
    {
       dd($past);
    //     $clients = Client::all();
    //     $method = Method::latest()->take(1000)->get();
    //    dd($past);
    //     return view('admin_dashboard.patent.edit', [
    //         'past' => $past,
    //         'clients'=>$clients,
    //         'method' => $method,
    //     ],compact('clients','method','past'));
    }

    public function update(Request $request, Past $past)
    {
        $validated = $request->validate($this->rules);
        
        $past->update($validated);

        return redirect()->route('past.index', $past)->with('success', 'Patent has been updated');

    }

  

    public function destroy(Patent $patent)
    {
        $method = Method::all();    
        $patent->delete();
        Alert::success('Successfully Delete','Delete');
        return redirect()->route('admin.patents.index')->with('success', 'Patent has been Deleted.');
    }

}
