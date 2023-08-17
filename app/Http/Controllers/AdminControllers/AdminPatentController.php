<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patent;
use App\Models\Client;
use App\Models\Method;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
class AdminPatentController extends Controller
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
        $patents = Patent::latest()->take(1000)->get();
        return view('admin_dashboard.patent.index',compact('patents'));
    }

    public function create()
    {
        $clients = Client::all();
        $method = Method::all();
        $patents = Patent::all();
        return view('admin_dashboard.patent.create', [
            'clients'=> Client::all(),
            'method'=> Method::all(),
        ],compact('clients','method'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);
        $validated['user_id'] = auth()->id();
        $patents = Patent::create($validated);
        $patents = Patent::all();
        return view('admin_dashboard.patent.index',compact('patents'));
    }

    public function edit(Patent $patent )
    {
        $clients = Client::all();
        $method = Method::latest()->take(1000)->get();
        return view('admin_dashboard.patent.edit', [
            'patent' => $patent,
            'clients'=>$clients,
            'method' => $method,
        ],compact('clients','method','patent'));
    }

    public function update(Request $request, Patent $patent)
    {
        $validated = $request->validate($this->rules);
        
        $patent->update($validated);
        
        return redirect()->route('admin.patents.index', $patent)->with('success', 'Patent has been updated');

    }

  

    public function destroy(Patent $patent)
    {
        $method = Method::all();    
        $patent->delete();
        Alert::success('Successfully Delete','Delete');
        return redirect()->route('admin.patents.index')->with('success', 'Patent has been Deleted.');
    }

}
