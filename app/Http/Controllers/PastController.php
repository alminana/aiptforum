<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Past;
use App\Models\Pcomment;
use Illuminate\Contracts\View\View;
use App\Http\Requests\PastRequest;
class PastController extends Controller
{

    public function index()
    {
        return view('past.index', [
            'pasts' => Past::latest()->get(),
        ]);
    }

    public function create()
    {
        return view('past.create');
    }

    public function store(PastRequest $request)
    {
        $data = $request->validated();

        $past = new Past();
        $past->title = $data['title'];
        $past->text  = $data['text'];
        $past->save();
        
        return redirect('/past/'.$past->id);
    }
    
    public function show(Past $past): View
    {
        return view('past.show', [
            'past' => $past,
            'comments' => $past->Pcomment()->paginate(5)
        ]);
    }

   
}
