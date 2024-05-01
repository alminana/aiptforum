<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->seniority!='manger') {
            $trademarkstkts = DB::table('trade_mark_tickets')
            ->where('trade_mark_tickets.assigned_to','=',auth()->user()->id)
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
            return view('homepages.employee', compact('trademarkstkts'));
        }
        return view('home');
    }

    public function draft()
    {
//        return HTTP::
        return view('draft');
    }

    
}
