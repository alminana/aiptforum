<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Past;
use App\Models\Pcomment;
use App\Http\Requests\PcommentRequest;
use Illuminate\Http\RedirectResponse;
class PcommentController extends Controller
{
    public function store(Past $past, PcommentRequest $request): RedirectResponse
    {
        
        $data = $request->validated();
        $pcomment = new pcomment();

        $pcomment->past_id = $past->id;
        $pcomment->author  = $data['author'];
        $pcomment->text    = $data['text'];
        $pcomment->save();

        return back();
        
    }
}
