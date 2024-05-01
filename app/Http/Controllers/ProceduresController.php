<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Procedure;

class ProceduresController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $Procedures = DB::select("SELECT procedures.id , users.username  , methodes._methode_name , methodes.color , procedures.procedure_name
            FROM procedures 
            INNER JOIN methodes
            ON methodes.id = procedures.methode_id
            INNER JOIN users
            ON users.id = procedures.added_by
            ;");
           //  dd($Procedures);
            return view('procedures.index', compact('Procedures'));    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $methodes = DB::select("SELECT methodes.id , methodes._methode_name FROM methodes ;");
        // dd($methodes);
        return view('procedures.add', compact('methodes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'name'=>   'required',
            'methodes'=>   'required|exists:methodes,id',
          ]); 
        
        $Procedure = Procedure::create([
           'procedure_name'=>   $request->name ,
           'methode_id' => $request->methodes ,
           'added_by'=> auth()->user()->id
           ]);
           if($Procedure){
            return redirect()->route('procedures.index')->with('success','Procedure created successfully');
           }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $procedures = DB::select("SELECT procedures.id , users.username  , methodes.id as mid , methodes._methode_name , methodes.color , procedures.procedure_name
            FROM procedures 
            INNER JOIN methodes
            ON methodes.id = procedures.methode_id
            INNER JOIN users
            ON users.id = procedures.added_by
            where procedures.id = $id
            ;");

        $methode = DB::select("SELECT methodes.id , methodes._methode_name , methodes.color
        FROM methodes ;");
      //  dd($procedures);
        return view('procedures.edit', compact('procedures','methode')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // dd($request);
        $request->validate([
            'name'=>   'required',
            'methodes'=> 'required|exists:methodes,id',
          ]); 

          DB::table('procedures')
        ->where('id', $id)
        ->update([
            'procedure_name'=>   $request->name ,
            'methode_id' =>  $request->methodes ,
        ]);
        return redirect()->route('procedures.index')->with('success','procedure updated successfully ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('procedures')->where('id', $id)->delete();  
        return redirect()->route('procedures.index')->with('success','procedure deleted successfully');

    }
}
