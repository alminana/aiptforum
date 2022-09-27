<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsarController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('newsar');
    }
}
