<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class TKTsController extends Controller
{
         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        //
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
        //
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

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function related_to_client_tkt($id)
    {
        //
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tkt_questions()
    {
        $countries  = DB::select("SELECT countries.id , countries.country_name 
        FROM countries ;"); 
        $clients  = DB::select("SELECT clients.id , clients.client_name 
        FROM clients ;");
        $associates  = DB::select("SELECT associates.id , associates.associate_name 
        FROM associates ;");
        return view('tickets.filter',compact('countries','clients','associates'));      
    }

    function trademarkstkts(){
        /*
     $trademarkstkts = DB::select("SELECT trade_mark_tickets.id , trade_mark_tickets.TKT_Type , 
     trade_mark_tickets.clientref , trade_mark_tickets.aiptref , 
     trade_mark_tickets.class , trade_mark_tickets.register_no , 
     trade_mark_tickets.trademark_name , trade_mark_tickets.trademark_brief , 
 
     associates.associate_name   , countries.country_name ,
     procedures.procedure_name   ,
     methodes._methode_name   , methodes.color , 
     addedby.name as addedby ,assignedto.name as assignedto 

     FROM trade_mark_tickets

     left outer join countries
     ON countries.id = trade_mark_tickets.country_id

     left outer join associates
     ON associates.id = trade_mark_tickets.associate_id

     left outer join clients
     ON clients.id = trade_mark_tickets.client_id

     left outer join users as addedby
     ON addedby.id = trade_mark_tickets.added_by

     left outer join users as assignedto
     ON assignedto.id = trade_mark_tickets.assigned_to

     left outer join methodes
     ON methodes.id = trade_mark_tickets.methode_id

     left outer join procedures 
     ON procedures.id = trade_mark_tickets.procedure_id
     
     ;")->paginate(5);
        */



    $trademarkstkts = DB::table('trade_mark_tickets')
    ->leftJoin('countries', 'countries.id', '=', 'trade_mark_tickets.country_id')
    ->leftJoin('associates', 'associates.id', '=', 'trade_mark_tickets.associate_id')
    ->leftJoin('clients', 'clients.id', '=', 'trade_mark_tickets.client_id')  
  //  ->leftJoin('users ', 'users.id', '=', 'trade_mark_tickets.added_by')
    ->leftJoin('users', 'users.id', '=', 'trade_mark_tickets.added_by')  
    ->leftJoin('methodes', 'methodes.id', '=', 'trade_mark_tickets.methode_id')  
    ->leftJoin('procedures', 'procedures.id', '=', 'trade_mark_tickets.procedure_id')
    ->select('trade_mark_tickets.id' , 'trade_mark_tickets.TKT_Type' , 
    'trade_mark_tickets.clientref' , 'trade_mark_tickets.aiptref' , 
    'trade_mark_tickets.class' , 'trade_mark_tickets.register_no' , 
    'trade_mark_tickets.trademark_name' , 'trade_mark_tickets.trademark_brief' , 
    'trade_mark_tickets.img_paths',
    'associates.associate_name'   , 'countries.country_name' ,
    'procedures.procedure_name'   ,
    'methodes._methode_name'   , 'methodes.color' , 'clients.client_name',
    /*addedby*/'users.name','trade_mark_tickets.assigned_to')
    ->paginate(10); 
    // dd($trademarkstkts);
     return view('trademarkstkts', compact('trademarkstkts'));
    }
}


