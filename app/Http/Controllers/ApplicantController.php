<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Applicant;

use DB;

class ApplicantController extends Controller
{
     /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
       // $applicants = Applicant::get();
        $applicants = DB::table('applicants')
                ->leftJoin('countries', 'countries.id', '=', 'applicants.country_id')
                ->leftJoin('users', 'users.id', '=', 'applicants.added_by')
                ->select('applicants.id' , 'applicants.name' , 
                'countries.country_name','users.username',)
                ->get(); 

        return view('applicants.index', compact('applicants'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $countries  = DB::select("SELECT countries.id , countries.country_name 
        FROM countries ;");
        return view('applicants.create', compact('countries'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
      //  dd($request);
        $request->validate([
            'name_applicant' => 'required',
            'country'=> 'required|exists:countries,id', 
        ]);
        
        Applicant::create([
            'name'=>   $request->name_applicant ,
            'country_id' => $request->country,
            'added_by'=>auth()->user()->id
            ]);

        return redirect()->route('applicants.index')->with('success','Applicant has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Applicant  $company
    * @return \Illuminate\Http\Response
    */
    public function show(Applicant $applicants)
    {
        return view('applicants.show',compact('applicants'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function edit(Applicant $applicant)
    {
        $countries  = DB::select("SELECT countries.id , countries.country_name 
        FROM countries ;");
        return view('applicants.edit',compact('applicant','countries'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Applicant $applicant)
    {
        $request->validate([
            'name' => 'required',
            'country_id'=> 'required|exists:countries,id',
        ]);
        
        $applicant->fill($request->post())->save();

       /* Applicant::where('id', $id)
        ->update([
            'name'=>   $request->name ,
            'country_id' => $request->country,
            'added_by'=>auth()->user()->id
        ]);*/
        
        return redirect()->route('applicants.index')->with('success','Applicant Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function destroy(Applicant $applicant)
    {
        $applicant->delete();
        return redirect()->route('applicants.index')->with('success','Applicant has been deleted successfully');
    }
}
