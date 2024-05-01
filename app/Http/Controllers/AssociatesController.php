<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Associate;
use DB;

class AssociatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response`
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
        $associates = DB::select("SELECT associates.id , associates.img_path , associates.associate_name   , countries.country_name
        ,  users.username
        FROM associates 
        INNER JOIN countries
        ON countries.id = associates.country_id
        INNER JOIN users
        ON users.id = associates.added_by
        ;");
        // dd($associates);
        return view('associates.index', compact('associates'));      
        //associates
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
        return view('associates.add', compact('countries'));
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
            'name'=>   'required|unique:associates,associate_name',
            'img_path' => 'image|mimes:jpg,png,jpeg|max:2048',      
            'country'=> 'required|exists:countries,id', 
            ]);
            //     dd($request);
            $profileImage = uniqid().date('YmdHis') . "." . $request->name  . '.'. $request->file('img_path')->getClientOriginalName();
            $associate = Associate::create([
            'associate_name'=>   $request->name ,
            'img_path' => $profileImage ,
            'country_id' => $request->country,
            'added_by' => auth()->user()->id,
            ]);
            if ($associate) {
                $request->img_path->move('public/associateimage', $profileImage);
                return redirect()->route('associates.index')->with('success','Associate created successfully');
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
        $countries  = DB::select("SELECT countries.id , countries.country_name 
        FROM countries ;");

        $users  = DB::select("SELECT users.id , users.username 
        FROM users ;");

        $associate = DB::select("SELECT * FROM associates Where associates.id = $id;");

        return view('associates.show', compact('countries','users','associate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries  = DB::select("SELECT countries.id , countries.country_name 
        FROM countries ;");

        $users  = DB::select("SELECT users.id , users.username 
        FROM users ;");

        $associate = DB::select("SELECT *
         FROM associates Where associates.id = $id;");
        //   dd($associate[0]->country_id);
        return view('associates.edit', compact('countries','users','associate'));
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
        'name'=>   'required|unique:associates,associate_name',
        'img_path' => 'image|mimes:jpg,png,jpeg|max:2048',      
        'country'=> 'required|exists:countries,id', 
        ]); 
        //     dd($request);
        $associate = DB::select("SELECT * FROM associates where associates.id = $id ;");
        if($request->file('image')){
        $profileImage = uniqid().date('YmdHis') . "." . $request->name  . '.'. $request->file('img_path')->getClientOriginalName();
        $associate = DB::table('associates')
        ->where('id', $id)
        ->update([
        'associate_name'=>   $request->name ,
        'img_path' => $profileImage ,
        'country_id' => $request->country,
        'added_by' => auth()->user()->id,  
        ]);
        if ($associate) {
        $request->img_path->move('public/associateimage', $profileImage);
        return redirect()->route('associates.index')->with('success','Associate updated successfully');
        }

        }else{
        $profileImage = $associate[0]->img_path;
        $associate = DB::table('associates')
        ->where('id', $id)
        ->update([
        'associate_name'=>   $request->name ,
        'img_path' => $profileImage ,
        'country_id' => $request->country,
        'added_by' => auth()->user()->id,  
        ]);
        if ($associate){  return redirect()->route('associates.index')->with('success','Associate updated successfully');
        }
        }     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('associates')->where('id', $id)->delete();
        return redirect()->route('associates.index')->with('success','Associate deleted successfully');

    }
}
