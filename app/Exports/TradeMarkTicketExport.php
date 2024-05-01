<?php

namespace App\Exports;

use App\Models\TradeMarkTicket;
use Maatwebsite\Excel\Concerns\FromCollection;

//frow laravel excel  drawing(image export) 
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

use Maatwebsite\Excel\Concerns\WithDrawings;

use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\WithColumnWidths;

use Maatwebsite\Excel\Concerns\WithColumnFormatting;

use Maatwebsite\Excel\Concerns\WithMapping;

use Illuminate\Http\Request;

use Spatie\Browsershot\Browsershot;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;


use DB;
use Session;

class TradeMarkTicketExport implements  FromCollection,  WithHeadings, WithColumnWidths, WithDrawings

{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        /*$trademarkstkts = DB::table('trade_mark_tickets')
        ->leftJoin('countries', 'countries.id', '=', 'trade_mark_tickets.country_id')
        ->leftJoin('associates', 'associates.id', '=', 'trade_mark_tickets.associate_id')
        ->leftJoin('clients', 'clients.id', '=', 'trade_mark_tickets.client_id')  
        ->leftJoin('users', 'users.id', '=', 'trade_mark_tickets.assigned_to')  
        ->leftJoin('methodes', 'methodes.id', '=', 'trade_mark_tickets.methode_id')  
        ->leftJoin('procedures', 'procedures.id', '=', 'trade_mark_tickets.procedure_id')
        ->select('trade_mark_tickets.id' , 'trade_mark_tickets.TKT_Type' , 
        'trade_mark_tickets.clientref' , 'trade_mark_tickets.aiptref' , 
        'trade_mark_tickets.class' , 'trade_mark_tickets.register_no' , 
        'trade_mark_tickets.trademark_name' , 'trade_mark_tickets.trademark_brief' , 
       
        'associates.associate_name'   , 'countries.country_name' ,
        'procedures.procedure_name'   ,
        'methodes._methode_name'   ,  'clients.client_name',
        'users.name','trade_mark_tickets.assigned_to')
        ->get(); */
        
        //return $trademarkstkts;
      //  dd($trademarkstkts);

     // dd(Session::get('search'));
    //  dd($trademarkstkts);
    $trademarkstkts = DB::table('trade_mark_tickets')
    ->leftJoin('countries', 'countries.id', '=', 'trade_mark_tickets.country_id')
    ->leftJoin('associates', 'associates.id', '=', 'trade_mark_tickets.associate_id')
    ->leftJoin('clients', 'clients.id', '=', 'trade_mark_tickets.client_id')  
    //  ->leftJoin('users ', 'users.id', '=', 'trade_mark_tickets.added_by')
    ->leftJoin('users', 'users.id', '=', 'trade_mark_tickets.assigned_to')  
    ->leftJoin('methodes', 'methodes.id', '=', 'trade_mark_tickets.methode_id')  
    ->leftJoin('procedures', 'procedures.id', '=', 'trade_mark_tickets.procedure_id')
    ->where('trade_mark_tickets.trademark_name', "like", "%" . Session::get('search') . "%")

    ->select(
        'trade_mark_tickets.id' , 
        'trade_mark_tickets.clientref' ,
        'procedures.procedure_name'   , 
        'clients.client_name',
        'trade_mark_tickets.trademark_name' ,
        'trade_mark_tickets.class' , 
        'trade_mark_tickets.filing_no',
        'methodes._methode_name'   , 
        'trade_mark_tickets.register_no' ,
        'countries.country_name' ,
        'clients.client_name',
       
         //photo
    )
    ->orderBy ('id', 'asc')
    ->get(); 
   // dd($trademarkstkts);
      return $trademarkstkts;
    }

    
    

    public function drawings()
    {
        $arr =[];
        $trademarks =TradeMarkTicket:: where('trade_mark_tickets.trademark_name', "like", "%" . Session::get('search') . "%")->
        get(['id','imageexport']);
      //  dd($trademarks);
      $Id = 2;
        foreach ($trademarks as $trademark) {
         //   dd($trademark->imageexport);
         // $Id+1;
           $drawing = new Drawing();
           $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
           $drawing->setName('signature');
           $drawing->setDescription('This is my signatuer');
           $drawing->setPath(public_path('public\Tanzania_files'. $trademark->imageexport.''));
           $drawing->setHeight(90);
           $drawing->setWidth(90);
           $drawing->setCoordinates('M'.$Id);
           array_push($arr,$drawing);
           $Id++;
        }
     //   dd($arr);
        return $arr;
    }

    public function headings(): array
    {
        return [
        
            'ID',
          'Reference',
            
            'Procedure',
           
            'Applicant Name',
           
            'Trademark Name ',

            'Class',

           ' Filing Number',
           
            'Status Now',
           
           ' Reg. No.',
          
            'Country',
           
            'Client',
           
            'Responsible By',

            ' LOGO',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 30,
            'B' => 30,        
            'C' => 30,
            'D' => 30,
            'E' => 30,
            'F' => 30,
            'G' => 30,
            'H' => 30,
            'I' => 30,
            'K' => 30,
            'L' => 30,
            'M' => 100,
          
           
        ];
    }

    public function columnHeight(): array
    {
        return [
            'A' => 30,
            'B' => 30,        
            'C' => 30,
            'D' => 30,
            'E' => 30,
            'F' => 30,
            'G' => 30,
            'H' => 30,
            'I' => 30,
            'K' => 30,
            'L' => 30,
            'M' => 100,
           
        ];
    }

}