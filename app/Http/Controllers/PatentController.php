<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Client;
use App\Models\Method;
use App\Models\Patent;
use App\Models\Patent_comments;
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
        $clients = Client::all();
        $method = Method::all();
        $patents = Patent::all();
        return view('patent.create', [
            'clients'=> Client::all(),
            'method'=> Method::all(),
            'patents'=> Patent::all(),
        ],compact('clients','method','patents'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clients = Client::all();
        $method = Method::latest()->take(1000)->get();
        $validated = $request->validate($this->rules);
        $validated['user_id'] = auth()->id();
        $patents = Patent::create($validated);
        $patents = Patent::all();
        return redirect()->route('patent.index',compact('clients','method','patents'))->with('success', 'Patent has been Created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patent $patent)
    {
        $patent_comments = Patent_comments::orderBy('id', 'DESC')->take(5)->get();
        $patents = Patent::latest()->take(1000)->get();
        $clients = Client::all();
        $categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->take(10)->get();
        $method = Method::all();
        return view('patent.show', [
            'patent' => $patent,
            'clients'=>$clients,
            'method' => $method,
        ],compact('clients','method','patent','categories','patents','patent_comments'));
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

    public function addComment(Patent $patent)
    { 
       
         $attributes = request()->validate([
            'the_comment' => 'required|min:10|max:300',
            'patent_id' => 'required|min:10|max:300',
         ]);

         $attributes['user_id'] = auth()->id();
         $attributes['patent_id'] ->id();
         $patent_comment = $patent->Patent_comments()->create($attributes);
         dd( $patent_comment);
        // return redirect('/posts/' . $post->slug . '#comment_' . $comment->id)->with('success', 'Comment has been added.');

    }
}
