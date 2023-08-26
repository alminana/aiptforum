<?php

namespace App\Http\Controllers;
use DB;
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
class PastController extends Controller
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

    public function index()
    {
        $clients = Client::all();
        $method = Method::all();
        return view('past.index', [
            'pasts' => Past::latest()->get(),
            'clients'=> Client::all(),
            'method'=> Method::all(),
        ]);
    }

    public function create()
    {
        $clients = Client::all();
        $method = Method::all();
        return view('past.create',compact('clients','method'));
    }

    public function store(Request $request)
    {
        $clients = Client::all();
        $method = Method::latest()->take(1000)->get();
        $validated = $request->validate($this->rules);
        $validated['user_id'] = auth()->id();
        $past = Past::create($validated);
        $past = Past::all();
        return redirect()->route('past.index',compact('clients','method'))->with('success', 'Patent has been Created.');
    }
    
    public function show(Past $past): View
    {
        return view('past.show', [
            'past' => $past,
            'comments' => $past->Pcomment()->paginate(5)
        ]);
    }

    public function edit(Past $past )
    {
        $clients = Client::all();
        $method = Method::latest()->take(1000)->get();
     
        return view('past.edit', [
            'past' => $past,
            'clients'=>$clients,
            'method' => $method,
        ],compact('clients','method','past'));
    }
    public function update(Request $request, Past $past)
    {
        $validated = $request->validate($this->rules);
        
        $past->update($validated);

        return redirect()->route('past.index', $past)->with('success', 'Patent has been updated');

    }
   
}