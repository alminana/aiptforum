<?php

// https://www.youtube.com/watch?v=ZwA7MeuQRik
namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class PostDataExport implements FromCollection,FromView,ShouldAutoSize
{
    use Exportable;
    
    private $post;

    public function __contruct(){
        $this-> $posts = Post::all();
    }

    public function view() : View
    {
     return view('pdf.postlist',[
        'posts'=> $this->post 
     ]);   
    }
}
