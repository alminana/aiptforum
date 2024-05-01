<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Events\ActiveUserEvent;
use Illuminate\Support\Str;

use App\Models\Message;
use Auth;
use Pusher\Pusher;

//use Notification;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ActiveUserNotification;

class UsersController extends Controller
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

    public function index()
    {
        try {
        
            $users = DB::select("SELECT users.id , users.name , users.username , users.status , departments.department_name
            FROM users 
            INNER JOIN departments
            ON departments.id = users.department_id;");
           //  dd($users);
           $userschunk = array_chunk($users, 1);
            return view('users.index', compact('userschunk'));    
        }catch (\Exception $e) { 
             Log::error('An error occurred: ' . $e->getMessage());
           return redirect()->back()->withErrors(['msg' => 'An error occurred']);
       //  return toastr()->error('An error occurred');
            
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $users = DB::select("SELECT users.id , users.name 
        FROM users where users.status = 1 ;");
        $departments =  DB::select("SELECT departments.id , departments.department_name 
        FROM departments ;");
        return view('users.add', compact('users','departments'));
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
             'fname'=>   'required',
             'lname'=>   'required',
             'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
             'email' => 'required|email|unique:users,email',
             'gender' => 'required|in:male,female',
             'seniority'=>'required|in:jouniior,senior,manger',
             'departments'=> 'required|exists:departments,id',
             'manger'=> 'required|exists:users,id',   
           ]); 
           $department = (int)$request->departments;
           $username = uniqid().'_'.'AIPT_'.strtoupper($request->fname) . strtoupper($request->lname);
           $profileImage = uniqid().date('YmdHis') . "." . $username  . '.'. $request->file('image')->getClientOriginalExtension();
            $user = User::create([
            'name'=>   $request->fname . '  ' . $request->lname,
            'username' => $username,
            'gender' => $request->gender,
            'email' => $request->email,
            'password' => Hash::make('password'),
            'department_id'=> (int)$department,
            'manger_id'=> (int)$request->manger,
            'seniority'=>$request->seniority,
            'img_path'=> $profileImage,
            'status'=>0,
            'login_status'=>0,
            ]);

            if ($user) {
              $request->image->move('public/images', $profileImage);
              $notifiedUser =  User::where('department_id', '=', 8)
              ->get();
               
              /*DB::select("SELECT users.id , users.username 
              FROM users where users.department_id = 8 ;");*/
              Notification::send($notifiedUser,new ActiveUserNotification($user->id));
            }

              /*
            if ($user) {
              //  $destinationPath = '/public/images/';
            $request->image->move('public/images', $profileImage);
            event(new ActiveUserEvent('user:'.$username.'created kindly active him'));
            }

            $user = Message::create([
                'from'=>   Auth::user()->id,
                'message' => 'new user created kindly active him' ,
                'type'=>'active'
                ]);

            $options = array(
                'cluster' => 'ap2',
                'useTLS' => true
            );


            $pusher = new Pusher(
                env('PUSHER_APP_KEY'),
                env('PUSHER_APP_SECRET'),
                env('PUSHER_APP_ID'),
                $options
            );


            $data = ['from' => Auth::user()->id];
            $pusher->trigger('active-user-channel', 'active-user', $data);
            */

            return redirect()->route('users.index')->with('success','User created successfully Verifiy it ');
           
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = DB::select("SELECT * 
        FROM users where users.id = $id ;");
        
        $users = DB::select("SELECT users.id , users.name 
        FROM users where users.status = 1 ;");

        $departments =  DB::select("SELECT departments.id , departments.department_name 
        FROM departments ;");
        
        return view('users.show' , compact('users','departments','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response               
     */
    public function edit($id)
    {
        $user = DB::select("SELECT * FROM users where users.id = $id ;");
        
        $users = DB::select("SELECT users.id , users.name 
        FROM users where users.status = 1 ;");

        $departments =  DB::select("SELECT departments.id , departments.department_name 
        FROM departments ;");

   
        return view('users.edit' , compact('users','departments','user'));
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
            'username'=>   'required',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048',
            'gender' => 'required|in:male,female',
            'seniority'=>'required|in:jouniior,senior,manger',
            'departments'=> 'required|exists:departments,id',
            'manger'=> 'exists:users,id',
          ]); 

          $user = DB::select("SELECT * FROM users where users.id = $id ;");
          if($request->file('image')){
            $profileImage = uniqid().date('YmdHis') . "." . $user[0]->username  . '.'. $request->file('image')->getClientOriginalExtension();
          }else{
            $profileImage = $user[0]->img_path;
          }
        //  dd($request);
        DB::table('users')
        ->where('id', $id)
        ->update([
            'name'=>   $request->name ,
            'username' =>  $request->username ,
            'gender' => $request->gender,
            'email' => $request->email,
            'department_id'=> $request->departments,
            'manger_id'=> $request->manger,
            'seniority'=>$request->seniority,
            'img_path'=> $profileImage,
            'status'=>$request->status,       
        ]);
        return redirect()->route('users.index')->with('success','User updated successfully ');
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
       DB::table('users')->where('id', $id)->delete();
        return redirect()->route('users.index')->with('success','User deleted successfully Verifiy it ');

    }

    public function restoreUser($id)
    {
    //$post = Post::withTrashed()->find($id);
    //$post->restore(); // This restores the soft-deleted post
    //return redirect()->route('users.index')->with('success','User created successfully Verifiy it ');

  }

    public function deletePostForever($id)
    {
        $user = User::find($id);
        $user->forceDelete(); // This permanently deletes the post for ever!

        // Additional logic...
    }

    public function active($id)
    {
        if(auth()->user()->username != 'AIPT_Test1'){    return response()->json(["message", "Authentication Required!"], 401);}
        $getId = DB::table('notifications')->where('data->userId',$id)->get();
        
        if (count($getId)==0) {
            DB::table('users')
            ->where('id', $id)
            ->update([
                'status' => 1,
            ]);
            return redirect()->route('users.index')->with('success','User activated successfully ');
        } else {
            DB::table('notifications')->where('id',$getId[0]->id)->update(['read_at'=>now()]);
            DB::table('users')
            ->where('id', $id)
            ->update([
                'status' => 1,
            ]);
            return redirect()->route('users.index')->with('success','User activated successfully ');
        }
          
    }

    public function unactive($id)
    {
        DB::table('users')
        ->where('id', $id)
        ->update([
            'status' => 0,
        ]);
        return redirect()->route('users.index')->with('success','User unactivated successfully ');
    }

    public function notification() {     
        $notifications = DB::select("SELECT users.id, users.fname, users.lname, users.email, COUNT(is_read) AS unread FROM users LEFT JOIN messages ON users.id = messages.from AND messages.is_read = 0 WHERE users.id = ".Auth::id()." GROUP BY users.id, users.fname, users.lname, users.email");
         
        return view('layouts.navbar', compact('notifications', $notifications));
    }
    function mark_read($id) {
      //  dd($id);
            $notificationId = $id;

            $userUnreadNotification = auth()->user()
                                        ->unreadNotifications
                                        ->where('id', $notificationId)
                                        ->first();

            if($userUnreadNotification) {
                $userUnreadNotification->markAsRead();
            }
            return redirect()->back()->with('success','notification marked as read');
    }
}
                                                                                                                                                              