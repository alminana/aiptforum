<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Exports\TradeMarkTicketExport;
use Maatwebsite\Excel\Facades\Excel;


use App\DataTables\TrademarksDataTable;


use Illuminate\Support\Facades\Storage;

use App\Models\TrademarkTicketHistory;
use App\Models\TradeMarkTicket;


use Session;


class TradeMarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trademarkstkts = DB::table('trade_mark_tickets')
        ->leftJoin('countries', 'countries.id', '=', 'trade_mark_tickets.country_id')
        ->leftJoin('associates', 'associates.id', '=', 'trade_mark_tickets.associate_id')
        ->leftJoin('clients', 'clients.id', '=', 'trade_mark_tickets.client_id')  
        ->leftJoin('users', 'users.id', '=', 'trade_mark_tickets.assigned_to')  
        ->leftJoin('methodes', 'methodes.id', '=', 'trade_mark_tickets.methode_id')  
        ->leftJoin('procedures', 'procedures.id', '=', 'trade_mark_tickets.procedure_id')
        ->select('trade_mark_tickets.id' , 'trade_mark_tickets.TKT_Type' , 
        'trade_mark_tickets.clientref' , 'trade_mark_tickets.aiptref' ,
        'trade_mark_tickets.class' , 'trade_mark_tickets.register_no' , 
        'trade_mark_tickets.trademark_name' , 'trade_mark_tickets.trademark_brief' , 
        'trade_mark_tickets.img_paths','trade_mark_tickets.filing_date' ,
        'associates.associate_name'   , 'countries.country_name' ,
        'procedures.procedure_name'   , 'trade_mark_tickets.filing_no',
        'methodes._methode_name'   , 'methodes.color' ,  'clients.client_name',
        /*addedby*/'users.name','trade_mark_tickets.assigned_to')->orderBy ('trade_mark_tickets.id', 'asc')

        ->paginate(10); 
        //   dd($trademarkstkts);
        return view('trademarkstkts', compact('trademarkstkts'));
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
        $clients  = DB::select("SELECT clients.id , clients.client_name 
        FROM clients ;");
        $associates  = DB::select("SELECT associates.id , associates.associate_name 
        FROM associates ;");
        $methodes  = DB::select("SELECT methodes.id , methodes._methode_name , methodes.color
        FROM methodes ;");
        $procedures  = DB::select("SELECT procedures.id , procedures.procedure_name 
        FROM procedures ;");
        $users  = DB::select("SELECT users.id , users.name 
        FROM users ;");
        $applicants  = DB::select("SELECT applicants.id , applicants.name 
         FROM applicants ;");
       
        // dd($trademark_ticket_histories);
        return view('tickets.add', compact('countries','clients','associates','methodes','procedures','users','applicants'));
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

       // $check_trademark = DB::table('trade_mark_tickets')
       // ->where('trade_mark_tickets.trademark_name', "=", $request->Name_TradeMark)
       // ->where('trade_mark_tickets.country_id', "=", $request->country)
       // ->get();

        $check_trademark = DB::select("SELECT * FROM trade_mark_tickets Where trade_mark_tickets.trademark_name = '".$request->Name_TradeMark."' AND trade_mark_tickets.country_id = '".(int)$request->country."';");
      //  dd(count($check_trademark));
//        dd($check_trademark);
        if (is_null($check_trademark)) {
          return redirect()->back()->with('message', "this trademark existed in this country");      
       //   return redirect()->back()->with('errors','this trademark existed in this country');
        }else{
        // dd(1);
        $request->validate([
          'aiptref'=>   'required',
          'clientref'=>   'required',
          'Name_TradeMark'=>   'required',
          'client'=> 'required|exists:clients,id',
          'associate'=> 'required|exists:associates,id',
          'procedure'=> 'required|exists:procedures,id',
          'methode'=> 'required|exists:methodes,id',
          'country'=> 'required|exists:countries,id',
          'user'=> 'required|exists:users,id',
          'applicant'=> 'required|exists:applicants,id',
          'attach' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
          
          ]); 

        
            $id = DB::table('trade_mark_tickets')
            ->insertGetId([
            'aiptref'=>   $request->aiptref ,
            'clientref' =>  $request->clientref ,
            'trademark_name' => $request->Name_TradeMark,
            'client_id' => $request->client,
            'added_by' => auth()->user()->id,
            'associate_id'=> $request->associate,
            'procedure_id'=> $request->procedure,
            'country_id'=> $request->country,
            'methode_id'=> $request->methode,
            'register_no'=>$request->registrationno,
            'filing_no'=>$request->filing_no,
            'filing_date'=>$request->filing_date,
            'class'=>$request->class,
            'applicant_id'=>$request->applicant,
            'folder_path'=>$request->folder_path
            ]);
            //   dd($id);
            $file = $request->file('attach');
            $extention = $file->getClientOriginalExtension();
            $filename = 'trademark_'.$id.'_'.$extention;
            $file->move('public/TradeMarksLogo/', $filename);
            
            DB::table('trade_mark_tickets')
            ->where('id', $id)
            ->update([
                'img_paths'=>   $filename ,              
            ]);
            
            TrademarkTicketHistory::create([
              'type'=> 'status update',
              'comment'=>' create the trademark ',
              'status'=> 'created successfully',
              'related_TKT'=> $id,
              'added_by' => auth()->user()->id,
              'created_at'=>now()
            ]);

          return redirect()->route('trademarkstkts.index')->with('success','action done successfully');
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
        //dd($id);
        $trademarkstkt = DB::table('trade_mark_tickets')
        ->where('trade_mark_tickets.id','=',$id)
        ->select('trade_mark_tickets.id' , 'trade_mark_tickets.TKT_Type' , 

        'trade_mark_tickets.id' , 'trade_mark_tickets.TKT_Type' , 
        'trade_mark_tickets.id' , 'trade_mark_tickets.TKT_Type' , 

        'trade_mark_tickets.clientref' , 'trade_mark_tickets.aiptref' ,  'trade_mark_tickets.folder_path' , 
        'trade_mark_tickets.class' , 'trade_mark_tickets.register_no' , 
        'trade_mark_tickets.trademark_name' , 'trade_mark_tickets.trademark_brief' , 
        'trade_mark_tickets.img_paths', 
        'trade_mark_tickets.assigned_to' , 'trade_mark_tickets.procedure_id' , 'trade_mark_tickets.methode_id' ,
        'trade_mark_tickets.client_id' , 'trade_mark_tickets.associate_id' , 'trade_mark_tickets.country_id' ,'trade_mark_tickets.filing_no','trade_mark_tickets.filing_date'
          )
        ->get(); 
       //  dd($trademarkstkt);
        $countries  = DB::select("SELECT countries.id , countries.country_name 
        FROM countries ;"); 
        $clients  = DB::select("SELECT clients.id , clients.client_name 
        FROM clients ;");
        $associates  = DB::select("SELECT associates.id , associates.associate_name 
        FROM associates ;");
        $methodes  = DB::select("SELECT methodes.id , methodes._methode_name , methodes.color
        FROM methodes ;");
        $procedures  = DB::select("SELECT procedures.id , procedures.procedure_name 
        FROM procedures ;");
        $users  = DB::select("SELECT users.id , users.name 
        FROM users ;");

        $trademark_ticket_histories  = DB::table('trademark_ticket_histories')
        ->Join('users', 'users.id', '=', 'trademark_ticket_histories.added_by')  
        ->where('trademark_ticket_histories.related_TKT','=',$id)
        ->select(
          'trademark_ticket_histories.id' , 'trademark_ticket_histories.type' , 
        'trademark_ticket_histories.comment' , 'trademark_ticket_histories.file_path' ,
        'trademark_ticket_histories.created_at' , 'users.username'
          )
        ->get();
     //   dd($trademark_ticket_histories);
         return view('tickets.edit', compact('trademarkstkt','countries','clients','associates','methodes','procedures','users','trademark_ticket_histories'));

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
    
      if($request->hasFile('attach') || !is_null($request->comment)){
         $this->fileUploadPost($request ,  $id);
        return redirect()->back()->with('success','Attachment created successfully');
      }else{
      
      $request->validate([
      'aiptref'=>   'required',
      'clientref'=>   'required',
      'Name_TradeMark'=>   'required',
      'client'=> 'required|exists:clients,id',
      'associate'=> 'required|exists:associates,id',
      'procedure'=> 'required|exists:procedures,id',
      'methode'=> 'required|exists:methodes,id',
      'country'=> 'required|exists:countries,id',
      'assigned'=> 'exists:users,id',
      'class'=>'required',
      'filing_no'=>'required',
      'filing_date'=>'required|date'
      ]); 

      $trade_mark_tickets = DB::table('trade_mark_tickets')
      ->where('id', $id)->get();
       // dd($trade_mark_tickets[0]->assigned_to);
        if (is_null($request->assigned)) {
          $assigned = $trade_mark_tickets[0]->assigned_to;
        } else {
          $assigned = $request->assigned;
        }
        
        DB::table('trade_mark_tickets')
        ->where('id', $id)
        ->update([
            'aiptref'=>   $request->aiptref ,
            'clientref' =>  $request->clientref ,
            'trademark_name' => $request->Name_TradeMark,
            'client_id' => $request->client,
            'assigned_to' =>  $assigned,
            'associate_id'=> $request->associate,
            'procedure_id'=> $request->procedure,
            'country_id'=> $request->country,
            'methode_id'=> $request->methode,
            'register_no'=>$request->registrationno,
            'filing_no'=>$request->filing_no,
            'filing_date'=>$request->filing_date,
            'class'=>$request->class,
            'folder_path'=>$request->inputPfolderlink
           
        ]);

        TrademarkTicketHistory::create([
          'type'=> 'status update',
          'comment'=> 'updated the trademark',
          'status'=> 'updateed successfully',
          'related_TKT'=> $id,
          'added_by' => auth()->user()->id,
          'created_at'=>now()
        ]);

        return redirect()->route('trademarkstkts.index')->with('success','action done successfully');
      }
       
    }

    private function fileUploadPost(Request $request , $id)
    {

      //dd($request);
      if($request->hasFile('attach')){
     
        $request->validate([
          'comment' => 'required|max:500',
          'attach' => 'required|mimes:pdf,xlsx,csv,docx,doc',
      ]);
      $fileName = now().'_'.$id.'_'.auth()->user()->id.'_'.$request->attach->getClientOriginalName();
     // dd($fileName);
     $filePath = $request->attach->move(public_path('files'), $fileName);
     
    //  $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
        TrademarkTicketHistory::create([
          'type'=> 'attachment Upload' ,
          'comment'=> $request->comment,
          'status'=> 'Uploaded successfully',
          'file_path'=> 'files/'.$filePath,
          'related_TKT'=> $id,
          'added_by' => auth()->user()->id,
          'created_at'=>now()
        ]);

      return redirect()->back()->with('success','Attachment created successfully');

      }else{
      $request->validate([
                  'comment' => 'required|max:50',
                  'attach' => 'mimes:pdf,xlsx,csv,docx,doc',
      ]);
     
      TrademarkTicketHistory::create([
        'type'=> 'commment' ,
        'comment'=> $request->comment,
        'status'=> 'Uploaded successfully',
        'file_path'=> null,
        'related_TKT'=> $id,
        'added_by' => auth()->user()->id,
        'created_at'=>now()
      ]);

 
        return redirect()->back()->with('success','Attachment created successfully');

       
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
        //
    }


    function request_report(Request $request) {
      $countries  = DB::table('countries')
   //   ->where('countries.country_name', "like", "%" . $request->search . "%")
      ->get(['id','country_name']);
      $clients  = DB::table('clients')
    //  ->where('clients.client_name', "like", "%" . $request->search . "%")
    ->get(['id','client_name']);
      $associates  = DB::table('associates')
    //  ->where('associates.associate_name', "like", "%" . $request->search . "%")
      ->get(['id','associate_name']);
      $methodes  = DB::table('methodes')
    //  ->where('methodes._methode_name', "like", "%" . $request->search . "%")
      ->get(['id','_methode_name']);
      $procedures  = DB::table('procedures')
    //  ->where('procedures.procedure_name', "like", "%" . $request->search . "%")
      ->get(['id','procedure_name']);
      $users  = DB::table('users')
    //  ->where('users.name', "like", "%" . $request->search . "%")
      ->get(['id','username']);
      return view('trademarkstkts-report',compact('countries','clients','associates','methodes','procedures','users'));  
    }

    function report(Request $request) {

          //  dd($request);
              if(!is_null($request->search)){
                                   
                $trademarkstktsQuery = DB::table('trade_mark_tickets')
                ->leftJoin('countries', 'countries.id', '=', 'trade_mark_tickets.country_id')
                ->leftJoin('associates', 'associates.id', '=', 'trade_mark_tickets.associate_id')
                ->leftJoin('clients', 'clients.id', '=', 'trade_mark_tickets.client_id')  
                ->leftJoin('users', 'users.id', '=', 'trade_mark_tickets.assigned_to')  
                ->leftJoin('methodes', 'methodes.id', '=', 'trade_mark_tickets.methode_id')  
                ->leftJoin('procedures', 'procedures.id', '=', 'trade_mark_tickets.procedure_id')
                ->where('trade_mark_tickets.trademark_name', "like", "%" . $request->search . "%")
               
                ->select('trade_mark_tickets.id' , 'trade_mark_tickets.TKT_Type' , 
                'trade_mark_tickets.clientref' , 'trade_mark_tickets.aiptref' , 
                'trade_mark_tickets.class' , 'trade_mark_tickets.register_no' , 
                'trade_mark_tickets.trademark_name' , 'trade_mark_tickets.trademark_brief' , 
                'trade_mark_tickets.img_paths','trade_mark_tickets.filing_date' ,
                'associates.associate_name'   , 'countries.country_name' ,
                'procedures.procedure_name'   ,
                'methodes._methode_name'   , 'methodes.color' , 'clients.client_name', 
               'users.name','trade_mark_tickets.assigned_to')
                ->orderBy ('id', 'asc')
                ->get(); 
              return view('trademarkstkts-report-result', compact('trademarkstktsQuery'));  
            } 


            else if(is_null($request->search)){

              $arrInUse=[];
              $trademarkstkts_methode_array=[];
              $trademarkstkts_procedure_array=[];
              $trademarkstkts_country_array=[];
              $trademarkstkts_client_array=[];
              $trademarkstkts_associate_array=[];
              $trademarkstkts_user_array=[];

             
                $trademarkstkts_methodes =  DB::table('trade_mark_tickets')
                ->where('trade_mark_tickets.methode_id','=',$request->methodes)
                ->select('trade_mark_tickets.id')
                ->orderBy ('id', 'asc')
                ->get();
                foreach ($trademarkstkts_methodes as $trademarkstkts_methode ) {
                 array_push($trademarkstkts_methode_array , $trademarkstkts_methode->id);
                }

                if ($request->methodes == 0 && count($trademarkstkts_methodes)==0) {
                  $trademarkstkts_methode_array['type'] = 1;
                }
                else if($request->methodes != 0 && count($trademarkstkts_methodes)!=0){
                  $trademarkstkts_methode_array['type'] = 2;
                } 
                else if($request->methodes != 0 && count($trademarkstkts_methodes)==0){
                  $trademarkstkts_methode_array['type'] = 3;
                }
                else if($request->methodes == 0 && count($trademarkstkts_methodes)!=0){
                  $trademarkstkts_methode_array['type'] = 4;
                }
                
                $trademarkstkts_procedures =  DB::table('trade_mark_tickets')
               ->where('trade_mark_tickets.procedure_id','=',$request->procedures)
               ->select('trade_mark_tickets.id')
               ->orderBy ('id', 'asc')
               ->get();
               foreach ($trademarkstkts_procedures as $trademarkstkts_procedure) {
                array_push($trademarkstkts_procedure_array,$trademarkstkts_procedure->id);
               }
               if ($request->procedures == 0 && count($trademarkstkts_procedures)==0) {
                $trademarkstkts_procedure_array['type'] = 1;
              }
              else if($request->procedures != 0 && count($trademarkstkts_procedures)!=0){
                $trademarkstkts_procedure_array['type'] = 2;
              } 
              else if($request->procedures != 0 && count($trademarkstkts_procedures)==0){
                $trademarkstkts_procedure_array['type'] = 3;
              }
              else if($request->procedures == 0 && count($trademarkstkts_procedures)!=0){
                $trademarkstkts_procedure_array['type'] = 4;
              }
              
              $trademarkstkts_countries =  DB::table('trade_mark_tickets')
              ->where('trade_mark_tickets.country_id','=',$request->countries)
              ->select('trade_mark_tickets.id')
              ->orderBy ('id', 'asc')
              ->get();
              foreach ($trademarkstkts_countries as $trademarkstkts_country) {
                array_push($trademarkstkts_country_array,$trademarkstkts_country->id);
              }
              if ($request->procedures == 0 && count($trademarkstkts_countries)==0) {
                $trademarkstkts_country_array['type'] = 1;
              }
              else if($request->procedures != 0 && count($trademarkstkts_countries)!=0){
                $trademarkstkts_country_array['type'] = 2;
              } 
              else if($request->procedures != 0 && count($trademarkstkts_countries)==0){
                $trademarkstkts_country_array['type'] = 3;
              }
              else if($request->procedures == 0 && count($trademarkstkts_countries)!=0){
                $trademarkstkts_country_array['type'] = 4;
              }
              
              $trademarkstkts_clients =  DB::table('trade_mark_tickets')
              ->where('trade_mark_tickets.client_id','=',$request->clients)
              ->select('trade_mark_tickets.id')
              ->orderBy ('id', 'asc')
              ->get();
              foreach ($trademarkstkts_clients as $trademarkstkts_client) {
                array_push($trademarkstkts_client_array,$trademarkstkts_client->id);
              }
              if ($request->procedures == 0 && count($trademarkstkts_clients)==0) {
                $trademarkstkts_client_array['type'] = 1;
              }
              else if($request->procedures != 0 && count($trademarkstkts_clients)!=0){
                $trademarkstkts_client_array['type'] = 2;
              } 
              else if($request->procedures != 0 && count($trademarkstkts_clients)==0){
                $trademarkstkts_client_array['type'] = 3;
              }
              else if($request->procedures == 0 && count($trademarkstkts_clients)!=0){
                $trademarkstkts_client_array['type'] = 4;
              }
             
              $trademarkstkts_associates =  DB::table('trade_mark_tickets')
              ->where('trade_mark_tickets.associate_id','=',$request->associates)
              ->select('trade_mark_tickets.id')
              ->orderBy ('id', 'asc')
              ->get();
              foreach ($trademarkstkts_associates as $trademarkstkts_associate) {
                array_push($trademarkstkts_associate_array,$trademarkstkts_associate->id);
              }
              if ($request->procedures == 0 && count($trademarkstkts_associates)==0) {
                $trademarkstkts_associate_array['type'] = 1;
              }
              else if($request->procedures != 0 && count($trademarkstkts_associates)!=0){
                $trademarkstkts_associate_array['type'] = 2;
              } 
              else if($request->procedures != 0 && count($trademarkstkts_associates)==0){
                $trademarkstkts_associate_array['type'] = 3;
              }
              else if($request->procedures == 0 && count($trademarkstkts_associates)!=0){
                $trademarkstkts_associate_array['type'] = 4;
              }

              $trademarkstkts_users =  DB::table('trade_mark_tickets')
              ->where('trade_mark_tickets.assigned_to','=',$request->users)
              ->select('trade_mark_tickets.id')
              ->orderBy ('id', 'asc')
              ->get();
              foreach ($trademarkstkts_users as $trademarkstkts_user) {
                array_push($trademarkstkts_user_array,$trademarkstkts_user->id);
              }
              if ($request->procedures == 0 && count($trademarkstkts_users)==0) {
                $trademarkstkts_user_array['type'] = 1;
              }
              else if($request->procedures != 0 && count($trademarkstkts_users)!=0){
                $trademarkstkts_user_array['type'] = 2;
              } 
              else if($request->procedures != 0 && count($trademarkstkts_users)==0){
                $trademarkstkts_user_array['type'] = 3;
              }
              else if($request->procedures == 0 && count($trademarkstkts_users)!=0){
                $trademarkstkts_user_array['type'] = 4;
              }

              $arrInUse=[$trademarkstkts_methode_array, $trademarkstkts_procedure_array,$trademarkstkts_associate_array,$trademarkstkts_client_array,$trademarkstkts_country_array,$trademarkstkts_user_array];
              //  dd($arrInUse);
            $arrlast=[];

            foreach ($arrInUse as $arr) {
            
              
          //    if ($arr['type'] == 2 ) {
              //    dd($arr);
           //     unset($arr['type']);
                array_push($arrlast,$arr);
            //  }
            }
           // dd($arrlast);
            $intersect = call_user_func_array('array_intersect',$arrlast);
          //  dd($intersect);
            $trademarkstkts = [];
            foreach ($intersect as $key => $value) {
              $trademarkstkt =  DB::table('trade_mark_tickets')
              ->leftJoin('countries', 'countries.id', '=', 'trade_mark_tickets.country_id')
              ->leftJoin('associates', 'associates.id', '=', 'trade_mark_tickets.associate_id')
              ->leftJoin('clients', 'clients.id', '=', 'trade_mark_tickets.client_id')  
              ->leftJoin('users', 'users.id', '=', 'trade_mark_tickets.assigned_to')  
              ->leftJoin('methodes', 'methodes.id', '=', 'trade_mark_tickets.methode_id')  
              ->leftJoin('procedures', 'procedures.id', '=', 'trade_mark_tickets.procedure_id')
              ->where('trade_mark_tickets.trademark_name', "like", "%" . $request->search . "%")
              ->where('trade_mark_tickets.client_id','=',$clientsvalue)
              ->where('trade_mark_tickets.associate_id','=',$associatesvalue)
              ->where('trade_mark_tickets.methode_id','=',$methodesvalue)
              ->where('trade_mark_tickets.procedure_id','=',$proceduresvalue)
              ->where('trade_mark_tickets.country_id', $countriesvalue)
              ->where('trade_mark_tickets.assigned_to','=',$usersvalue)
              ->select('trade_mark_tickets.id' , 'trade_mark_tickets.TKT_Type' , 
              'trade_mark_tickets.clientref' , 'trade_mark_tickets.aiptref' , 
              'trade_mark_tickets.class' , 'trade_mark_tickets.register_no' , 
              'trade_mark_tickets.trademark_name' , 'trade_mark_tickets.trademark_brief' , 
              'trade_mark_tickets.img_paths','trade_mark_tickets.filing_date' ,
              'associates.associate_name'   , 'countries.country_name' ,
              'procedures.procedure_name'   ,
              'methodes._methode_name'   , 'methodes.color' , 'clients.client_name', 
             'users.name','trade_mark_tickets.assigned_to')
              ->orderBy ('id', 'asc')
              ->get(); 
              array_push($trademarkstkts,$trademarkstkt);
            }
             }

            return view('trademarkstkts-report-result', compact('trademarkstkts'));  
           
        
        
        
            $trademarkstkts =  DB::table('trade_mark_tickets')
            //->leftJoin('countries', 'countries.id', '=', 'trade_mark_tickets.country_id')
            //->leftJoin('associates', 'associates.id', '=', 'trade_mark_tickets.associate_id')
            //->leftJoin('clients', 'clients.id', '=', 'trade_mark_tickets.client_id')  
            //->leftJoin('users', 'users.id', '=', 'trade_mark_tickets.assigned_to')  
            //->leftJoin('methodes', 'methodes.id', '=', 'trade_mark_tickets.methode_id')  
            //->leftJoin('procedures', 'procedures.id', '=', 'trade_mark_tickets.procedure_id')
                //->where('trade_mark_tickets.trademark_name', "like", "%" . $request->search . "%")
              //  ->where('trade_mark_tickets.client_id','=',$clientsvalue)
              //  ->where('trade_mark_tickets.associate_id','=',$associatesvalue)
                ->where('trade_mark_tickets.methode_id','=',$methodesvalue)
                ->where('trade_mark_tickets.procedure_id','=',$proceduresvalue)
              //  ->where('trade_mark_tickets.country_id', $countriesvalue)
              //  ->where('trade_mark_tickets.assigned_to','=',$usersvalue)
            ->select('trade_mark_tickets.id' , 'trade_mark_tickets.TKT_Type' , 
            'trade_mark_tickets.clientref' , 'trade_mark_tickets.aiptref' , 
            'trade_mark_tickets.class' , 'trade_mark_tickets.register_no' , 
            'trade_mark_tickets.trademark_name' , 'trade_mark_tickets.trademark_brief' , 
            'trade_mark_tickets.img_paths','trade_mark_tickets.filing_date' ,
            'associates.associate_name'   , 'countries.country_name' ,
            'procedures.procedure_name'   ,
            'methodes._methode_name'   , 'methodes.color' , 'clients.client_name', 
           'users.name','trade_mark_tickets.assigned_to')
            ->orderBy ('id', 'asc')
            ->get(); 

          //  SELECT * FROM `trade_mark_tickets` WHERE `client_id` = 1 and `methode_id` = 1;
          
            return view('trademarkstkts-report-result', compact('trademarkstkts'));  
        //    dd($trademarkstkts);
            /*$trademarkstkts = DB::select("
            SELECT *  FROM trade_mark_tickets Where 
             trade_mark_tickets.trademark_name ='".  $request->search ."'  AND 
             trade_mark_tickets.client_id ='". $clientsvalue ."'   AND 
             trade_mark_tickets.associate_id ='". $associatesvalue ."'   AND 
             trade_mark_tickets.methode_id ='". $methodesvalue ."'  AND 
             trade_mark_tickets.procedure_id ='". $proceduresvalue ."'   AND 
             trade_mark_tickets.country_id ='". $countriesvalue ."'  AND 
             trade_mark_tickets.assigned_to ='". $usersvalue ."' 
              ;");
                   session(['search' => $request->search]);
            session(['clientsvalue' => $clientsvalue]);
            session(['associatesvalue' => $associatesvalue]);
            session(['methodesvalue' => $methodesvalue]);
            session(['proceduresvalue' => $proceduresvalue]);
            session(['countriesvalue' => $countriesvalue]);
            session(['usersvalue' => $usersvalue]);
              


              $trademarkstkts = DB::select("
            SELECT *  FROM trade_mark_tickets WHERE NOT EXISTS 
            (trade_mark_tickets.client_id ='". $clientsvalue ."') AND 
             trade_mark_tickets.associate_id ='". $associatesvalue ."'   AND 
             trade_mark_tickets.methode_id ='". $methodesvalue ."'  AND 
             trade_mark_tickets.procedure_id ='". $proceduresvalue ."'   AND 
             trade_mark_tickets.country_id ='". $countriesvalue ."'  AND 
             trade_mark_tickets.assigned_to ='". $usersvalue ."' 
              ;");
              dd($trademarkstkts);




              $trademarkstkts_methode_array=[];
                          foreach ($trademarkstkts_methodes as $trademarkstkts_methode) {
                            array_push($trademarkstkts_methode_array,$trademarkstkts_methode);
                          }
                        // dd($trademarkstkts_methodes);
            
            

              */
         
    }

      public function test()
    {
    //   dd(url()->current());
          return Excel::download(new TradeMarkTicketExport (), 'Download_TradeMarks_.xlsx');
    }

    

    public function downloadFile($file_name) {
     // $file = Storage::disk('public')->get($file_name);
     // $file =   Storage::disk('local')->put('public',$file_name);

  
      return (new Response($file, 200))
            ->header('Content-Type', 'image/jpeg');
    }
       
    
   /*   public\public\images\658a1071c084c20231225232953.658a1071c0843_AIPT_ABDALLAHIBRAHIM.jpg

select `trade_mark_tickets`.`id`, `trade_mark_tickets`.`TKT_Type`, `trade_mark_tickets`.`clientref`, `trade_mark_tickets`.`aiptref`, `trade_mark_tickets`.`class`, `trade_mark_tickets`.`register_no`, `trade_mark_tickets`.`trademark_name`, `trade_mark_tickets`.`trademark_brief`, `trade_mark_tickets`.`img_paths`, `associates`.`associate_name`, `countries`.`country_name`, `procedures`.`procedure_name`, `methodes`.`_methode_name`, `methodes`.`color`, `clients`.`client_name`, `users`.`name`, `trade_mark_tickets`.`assigned_to` from `trade_mark_tickets` left join `countries` on `countries`.`id` = `trade_mark_tickets`.`country_id` left join `associates` on `associates`.`id` = `trade_mark_tickets`.`associate_id` left join `clients` on `clients`.`id` = `trade_mark_tickets`.`client_id` left join `users` on `users`.`id` = `trade_mark_tickets`.`assigned_to` left join `methodes` on `methodes`.`id` = `trade_mark_tickets`.`methode_id` left join `procedures` on `procedures`.`id` = `trade_mark_tickets`.`procedure_id` where `trade_mark_tickets` = trade_mark_tickets.trademark_name
   */
    
}
