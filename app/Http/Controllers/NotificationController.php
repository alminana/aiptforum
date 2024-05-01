<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Datatables;
use App\Models\Message;

use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TrademarksNotification;

class NotificationController extends Controller
{
    public function viewnotification ()
    {
        return view('notification.index');
    }

    function notificationall() {
       
        $Messages =  Message::where('department_id', '=', 2)->get();
         
        return view('notification.index-all' , compact('Messages'));
    }

   
   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {     
        $trade_mark_tickets =  DB::table('trade_mark_tickets')->select('id','trademark_name')->get();
       // dd($trade_mark_tickets);
        return view('notification.add',compact('trade_mark_tickets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request);
            $request->validate([
                "Title" => "required",
                "discription" => "required",
                "date" => "required|date"
            ]);

            Message::create([
            "title" => $request->Title,
            "message" => $request->discription .'at trademark number'.$request->trademarks,
            "date" => $request->date,
            "department_id"=>2,
            ]);

            $notifiedUser =  User::where('department_id', '=', 2)->get();

            Notification::send($notifiedUser,new TrademarksNotification($request->Title,$request->discription,$request->date,$request->trademarks));

            return redirect()->back()->with('success','Notification created successfully');
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
      
    }
    
}
