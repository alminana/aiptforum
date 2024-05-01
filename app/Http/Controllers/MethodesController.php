<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Methode;

class MethodesController extends Controller
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
        $methodes = DB::select("SELECT methodes.id , methodes._methode_name , methodes.color , users.username , departments.department_name
        FROM methodes 
        INNER JOIN departments
        ON departments.id = methodes.department_id
        INNER JOIN users  ON users.id = methodes.added_by
        ;");
        return view('methodes.index', compact('methodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('methodes.add');
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
            'name'=>   'required|unique:methodes,_methode_name',
            'color'=>   'required|unique:methodes,color',        
            ]); 

            Methode::create([
            '_methode_name'=>   $request->name ,
            'color' => $request->color ,
            'department_id' => auth()->user()->department_id,
            'added_by' => auth()->user()->id,
            ]);

            return redirect()->route('methodes.index')->with('success','methode created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $methode = DB::select("SELECT methodes.id , methodes._methode_name , methodes.color
        FROM methodes where methodes.id = $id ;");
      //  dd($methode);
        return view('methodes.edit', compact('methode'));   
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
          ]); 
          DB::table('methodes')
        ->where('id', $id)
        ->update([
            '_methode_name'=>   $request->name ,
            'color'=>   $request->color ,
                 
        ]);
        return redirect()->route('methodes.index')->with('success','methode updated successfully ');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('methodes')->where('id', $id)->delete();
        return redirect()->route('methodes.index')->with('success','methode deleted successfully');

    }
}
