<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comment;
use App\Models\Client;
use App\Models\Method;
use App\Models\Patent;
use DB;
use App\Models\Category;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
class PatentController extends Controller
{

    private $rules = [
        'aiptref'=>'required',
        'clientref'=>'required',
        'title'=>'required',
        'client'=>'required',

        // //selection for patent filing
        'pct_date'=>'required',
        'regular_date'=>'required',
        
        'filingno'=>'required',

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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

        public function index(Request $request)
        {
            $comments = DB::table('comments')->latest('id')->first();
            $method = Method::latest()->take(1000)->get();
            $client = Client::latest()->take(1000)->get();
            $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
            $patents = Patent::latest()->take(1000)->get();
            return view('patent.index',compact('patents','categories'));
    
        }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patent $patent)
    {
        $patent = Patent::latest()->take(100)->get();
        $method = Method::latest()->take(100)->get();
        $client = Client::latest()->take(100)->get();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        return view('patent.show', [
            'patent' => $patent,
            'method' => $method,
            'client' => $client,
        ],compact('patent','method','client','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Patent $patent )
    {
        $clients = Client::all();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        $method = Method::latest()->take(1000)->get();
        return view('patent.edit', [
            'patent' => $patent,
            'clients'=>$clients,
            'method' => $method,
        ],compact('clients','method','patent','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patent $patent)
    {
        $validated = $request->validate($this->rules);
        
        $patent->update($validated);
        
        return redirect()->route('patent.index', $patent)->with('success', 'Patent has been updated');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
