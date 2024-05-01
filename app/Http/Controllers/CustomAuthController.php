<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Toastr as toastr;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
class CustomAuthController extends Controller
{
    public function customLogin(Request $request)
    {
        //dd($request);
        $credentials = $request->only('username', 'password');
        try {
            
        if (Auth::attempt($credentials)) {
            // Authentication passed
           
            if(auth()->user()->status == 0  ){
                return redirect()->back()->withErrors(['msg' => 'your Account was DEACTIVATEED  kindly refer back to adminstrator']);
            }
            if(auth()->user()->login_status == 1 ){
            //    return redirect()->back()->withErrors(['msg' => 'your Account Already login']);
            }
            DB::commit();
          //  DB::table('users')->where('id', auth()->user()->id)->update(['login_status' => 1]);
            return redirect()->intended('/home');
        }
       
        // Authentication failed
        return redirect()->back()->withErrors(['loginError' => 'Invalid login credentials']);

        }catch (\Exception $e) { 
            
            Log::error('An error occurred: ' . $e->getMessage());
            return redirect()->back()->withErrors(['msg' => 'An error occurred']);
           // return toastr()->error('An error occurred');
            
        }
        }

    public function customLogout()
    {
        try{
        DB::table('users')->where('id', auth()->user()->id)->update(['login_status' => 0]);
        Auth::logout();
        return redirect('/');
        }catch (\Exception $e) {            
            Log::error('An error occurred: ' . $e->getMessage());
          //  return toastr()->error('An error occurred');   
            return redirect()->back()->withErrors(['msg' => 'An error occurred']);   
        }
    }

}
