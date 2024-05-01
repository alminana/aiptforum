<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Client;

class ClientsController extends Controller
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
        $clients = DB::select("SELECT clients.id , clients.client_name , clients.img_path , countries.country_name ,countries.code , type_clients.type_client_name  ,associates.associate_name
            FROM clients 
            INNER JOIN countries
            ON countries.id = clients.country_id
            INNER JOIN type_clients
            ON type_clients.id = clients.type_clients_id
            INNER JOIN associates
            ON associates.id = clients.associate_id
            ;");
          
            return view('clients.index', compact('clients'));
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
            $type_clients  = DB::select("SELECT type_clients.id , type_clients.type_client_name 
            FROM type_clients ;");
            $associates  = DB::select("SELECT associates.id , associates.associate_name 
            FROM associates ;");
            return view('clients.add', compact('countries','type_clients','associates'));
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
            'name'=>   'required|unique:clients,client_name',
            'img_path' => 'image|mimes:jpg,png,jpeg|max:2048',
            'country'=> 'required|exists:countries,id',
            'type_client'=> 'required|exists:type_clients,id',
            'associate'=> 'required|exists:associates,id',
            
          ]); 
          $profileImage = uniqid().date('YmdHis') . "." . $request->name  . '.'. $request->file('img_path')->getClientOriginalExtension();

          $client = Client::create([
            'client_name'=>   $request->name ,
            'country_id' => $request->country ,
            'type_clients_id' => $request->type_client,
            'added_by'=>auth()->user()->id,
            'associate_id'=>$request->associate,
            'img_path' => $profileImage,
            'following'=>null
          ]);
          if ($client) {
            $request->img_path->move('public/clientimages', $profileImage);
            return redirect()->route('clients.index')->with('success','Client created successfully');
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
            $type_clients  = DB::select("SELECT type_clients.id , type_clients.type_client_name 
            FROM type_clients ;");
            $client = DB::select("SELECT * 
            FROM clients where clients.id = $id ;");
            $associates = DB::select("SELECT associates.id , associates.associate_name FROM associates ;");
            return view('clients.show', compact('countries','type_clients','client','associates'));
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
        $type_clients  = DB::select("SELECT type_clients.id , type_clients.type_client_name 
        FROM type_clients ;");
        $client = DB::select("SELECT * 
        FROM clients where clients.id = $id ;");
        $associates = DB::select("SELECT associates.id , associates.associate_name FROM associates ;");
        return view('clients.edit', compact('countries','type_clients','client','associates'));
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
            'img_path' => 'image|mimes:jpg,png,jpeg|max:2048',
            'country'=> 'required|exists:countries,id',
            'type_client'=> 'required|exists:type_clients,id',
            'associate'=> 'required|exists:associates,id',
          ]); 
        //  $profileImage = uniqid().date('YmdHis') . "." . $request->name  . '.'. $request->file('img_path')->getClientOriginalExtension();
          $user = DB::select("SELECT * FROM clients where clients.id = $id ;");
       ///  dd($request);
          if(is_null($request->file('image'))){
            $profileImage = $user[0]->img_path;
          }else{
            $profileImage = uniqid().date('YmdHis') . "." . $request->name  . '.'. $request->file('image')->getClientOriginalExtension();

          }
        //  dd($request);
        DB::table('clients')
        ->where('id', $id)
        ->update([
            'client_name'=>   $request->name ,
            'country_id' => $request->country ,
            'type_clients_id' => $request->type_client,
            'added_by'=>auth()->user()->id,
            'associate_id'=>$request->associate,
            'img_path' => $profileImage,
            'following'=>null 
        ]);

        return redirect()->route('clients.index')->with('success','Client updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // dd($id);
       DB::table('clients')->where('id', $id)->delete();
        return redirect()->route('clients.index')->with('success','client deleted successfully');

    }
}
