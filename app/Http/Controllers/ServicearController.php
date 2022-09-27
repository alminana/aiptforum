<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicearController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('servicear');
    }
}
