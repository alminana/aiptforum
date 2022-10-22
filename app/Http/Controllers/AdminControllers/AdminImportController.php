<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportData;
use App\Models\Post;
class AdminImportController extends Controller
{
    public function index(){
        return view('admin_dashboard.import.index');
    }

    public function import(Request $req){
        Excel::import(new ImportData,$req->file('importdata'));
        return back();
    }
}
