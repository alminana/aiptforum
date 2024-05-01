<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Department;
class DepartmentsController extends Controller
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
        //dd(1);
        $departments =  DB::select("SELECT departments.id , departments.department_name 
        FROM departments ;");
        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departments.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate(['department_name'=>   'required|unique:departments,department_name' ]);
        $department = Department::create([
            'department_name'=>$request->department_name
        ]);
           return redirect()->route('departments.index')->with('success','department created successfully ');
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
        $department =  DB::select("SELECT departments.id , departments.department_name 
        FROM departments where departments.id =".$id.";");
        
        return view('departments.edit' , compact('department'));
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
        $request->validate([
            'name'=>   'required',
          ]); 
          DB::table('departments')
        ->where('id', $id)
        ->update([
            'department_name'=>   $request->name ,
                 
        ]);
        return redirect()->route('departments.index')->with('success','department updated successfully ');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('departments')->where('id', $id)->delete();
        return redirect()->route('departments.index')->with('success','department deleted successfully');

    }
}
