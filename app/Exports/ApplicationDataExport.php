<?php
// https://www.youtube.com/watch?v=ZwA7MeuQRik
namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ApplicationDataExport implements FromCollection,FromView,ShouldAutoSize
{
   use Exporttable;

   public function view() : View
   {
    return view('pdf.applicationlist');
   }
}
