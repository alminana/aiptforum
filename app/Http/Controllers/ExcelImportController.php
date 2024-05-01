<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;
use Illuminate\Support\Facades\Http;

//use Maatwebsite\Excel\Excel;

use Spatie\SimpleExcel\SimpleExcelReader;

use App\Models\User;
use App\Models\TradeMarkTicket;
use App\Models\Client;
use App\Models\Country;
use App\Models\TrademarkTicketHistory;
use App\Models\Associate;
use App\Models\Methode;
use App\Models\Procedure;



use Illuminate\Support\Facades\Hash;

class ExcelImportController extends Controller
{
    public function importView(Request $request){
        return view('importFile');
    }
    public function import(Request $request){
       // dd($request);
       // Excel::import(new ImportUser, $request->file('file'));
      // dd($request->file('file'));
       $file = $request->file('image');
     //  dd($file->getPathname());
      
       $fileContents = file($file->getPathname());
                $incr=0 ;
             //   dd($fileContents);    
       foreach ($fileContents as $line) {
             $associate_ID = 0;
            $data = str_getcsv($line);
         //   dd($data);
            $client = Client::where('client_name', ($data[6]))->get();
            if($client->count() ==0){
               $client_ID = Client::create([
                    'client_name'=>($data[6]),
                    'country_id'=>4,
                    'type_clients_id'=>null,
                    'added_by' => auth()->user()->id,
                    'associate_id'=>null,
                    'img_path'=>null,
                    'following'=>null,
                    ]); 
           }
           $client_ID = Client::where('client_name', ($data[6]))->get();
           
           $associate = Associate::where('associate_name', ($data[7]))->get();
            if($associate->count() == 0){
            Associate::create([
                'associate_name'=>($data[7]),
                'img_path'=>null,
                'country_id'=>4,
                'added_by' => auth()->user()->id,
                ]);
           
            }
            $associate_ID = Associate::where('associate_name', ($data[7]))->get();

            $methode = Methode::where('_methode_name', ($data[11]))->get();
            if($methode->count() == 0){
                Methode::create([
                '_methode_name'=>($data[11]),
                'color'=>'#'.str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT),
                'department_id'=>1,
                'added_by' => auth()->user()->id,
                ]);
           
            }
            $methode_ID = Methode::where('_methode_name', ($data[11]))->get();
          //  dd($methode_ID);
            $procedure = Procedure::where('procedure_name', ($data[5]))->get();
            if($procedure->count() == 0){
                Procedure::create([
                'procedure_name'=>($data[5]),
                'methode_id'=>($methode_ID[0]->id),
                'added_by' => auth()->user()->id,
                ]);           
            }
            $procedure_ID = Procedure::where('procedure_name', ($data[5]))->get();

         //   dd(gettype($associate_ID[0]->id));

            $country = Country::where('country_name', 'Qatar')->get();

            TradeMarkTicket::create([
                
                'TKT_Type' => 'new Ticket',
            
                'client_id' => ($client_ID[0]->id),
                'added_by' => auth()->user()->id,
                'associate_id' => ($associate_ID[0]->id),
                'methode_id' => ($methode_ID[0]->id),
                'assigned_to' => null,
            
                'class' => ($data[3]),
                'procedure_id' => ($procedure_ID[0]->id),

                'clientref' => ($data[0]),
                'aiptref' => null,

                'trademark_name' => ($data[1]),
                'trademark_brief' => 'null',
                'img_paths' => null,
                'folder_path' => null,
                'related_TKT' => null,         
            ]);
            $related_TKT = TradeMarkTicket::latest()->first();
            //dd($related_TKT->id);
            TrademarkTicketHistory::create([
                'Type' => 'filing_no',
                'comment'=>'added by system',
                'status'=>'ok',
                'file_path'=>null,
                'related_TKT'=>($related_TKT->id),
                'added_by' => auth()->user()->id,
            ]);

            TrademarkTicketHistory::create([
                'type' => 'filing_date',
                'comment'=>'added by system',
                'status'=>'ok',
                'file_path'=>null,
                'related_TKT'=>($related_TKT->id),
                'added_by' => auth()->user()->id,
            ]);

            TrademarkTicketHistory::create([    
                'Type' => 'Name of Applicant',
                'comment'=>'added by system',
                'status'=>'ok',
                'file_path'=>null,
                'related_TKT'=>($related_TKT->id),
                'added_by' => auth()->user()->id,
            ]);    
       }  
       return redirect()->route('home')->with('success', 'CSV file imported successfully.');
       // return redirect()->back();
    }

    function tests(Request $request , Excel $excel) {

      //  dd($request);
            $startRow = (int)$request->froml;
            $endRow = (int)$request->tol ;
            $rows = [];
            $file = $request->file('image');
            $rows = Excel::toArray(null, $file);
            $imageIncrement = 0 + (int)$request->from;
            $selectedRows = array_slice($rows[0], $startRow - 1, $endRow - $startRow + 1);

       //   dd($rows); 
            $counter = 0;
            $i=0;
            $country = Country::where('id', $request->country)->get();
           // dd($country[0]->country_name);
        //    mkdir('public/TradeMarksLogo');
            for ($i=$request->from; $i < $request->to+1; $i++) { 
                //dd(sprintf("%03d",$i));
              
                $counter++;
                // Check to display all the items we want to.
                
                if($counter >= 100) {
                    copy('C:/Users/Abdullah/Downloads/Telegram Desktop/'.$country[0]->country_name.'_files/image' . $counter . '.png','public/TradeMarksLogo/'.$request->country.'_image' . $country[0]->country_name .'_'. $counter . '.png');
                  }
                else if($counter >= 10) {
                    copy('C:/Users/Abdullah/Downloads/Telegram Desktop/'.$country[0]->country_name.'_files/image0' . $counter . '.png','public/TradeMarksLogo/'.$request->country.'_image0' . $counter . '.png');
                  }
                  else {
                    copy('C:/Users/Abdullah/Downloads/Telegram Desktop/'.$country[0]->country_name.'_files/image00' . $counter . '.png','public/TradeMarksLogo/'.$request->country.'_image' . $counter . '.png');
                }
               
            }
          //  dd($selectedRows);
                $rowValue=1;
            foreach ($selectedRows as $row) {
           ///     dd($row);
              // $image = 'C:/Users/Abdullah/Downloads/Telegram Desktop/Qatar_files/image00' . 1 ;
             //  dd($image);

              //  dd($row[2]);
              
            //  $imageIncrement = 0 + (int)$request->from;
                if($rowValue > 100) {$concatImage = 'image' ;}
                elseif($rowValue == 100){ $concatImage = 'image' ;}
                elseif ($rowValue > 10) {$concatImage = 'image0' ; }
                elseif($rowValue == 10){ $concatImage = 'image0' ;}
                else {$concatImage = 'image00' ;}
            //    else {$concatImage = 'image00' ;}
             
              $rowValue++;

                if(!is_null($row[7])){  
                    $associate = Associate::where('associate_name', ($row[3]))->get();
                    if($associate->count() == 0){
                    Associate::create([
                        'associate_name'=>($row[3]),
                        'img_path'=>null,
                        'country_id'=>$request->country,
                        'added_by' => auth()->user()->id,
                        ]);
                
                    }
                }
                
                $associate_query = Associate::where('associate_name', ($row[3]))->get();
           
                if($associate_query->count() == 0){
                    $associate_id = 1;
                }else {
                    $associate_id =  $associate_query[0]->id ;
                }
                if(!is_null($row[12])){
                    
                    $client = Client::where('client_name', ($row[12]))->get();
                        
                    if($client->count() ==0){
                        Client::create([
                                'client_name'=>($row[12]),
                                'country_id'=>$request->country,
                                'type_clients_id'=>4,
                                'added_by' => auth()->user()->id,
                                
                                'associate_id'=>$associate_id,
                                'img_path'=>null,
                                'following'=>null,
                        ]);
                    }
                }
                $client_query = Client::where('client_name', ($row[12]))->get();
                if($client_query->count() == 0){
                    $client_id = null;
                }else {
                    $client_id =  $client_query[0]->id;
                }

                $methode = Methode::where('_methode_name', ($row[9]))->get();
                if($methode->count() == 0){
                    Methode::create([
                    '_methode_name'=>($row[9]),
                    'color'=>'#'.str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT),
                    'department_id'=>auth()->user()->department_id,
                    'added_by' => auth()->user()->id,
                    ]);
                }
                $methode_query = Methode::where('_methode_name', ($row[9]))->get();
                if($methode_query->count() == 0){
                    $methode_id = null;
                }else {
                    $methode_id =  $methode_query[0]->id ;
                }

                if(!is_null($row[2])){  
                $procedure = Procedure::where('procedure_name', ($row[2]))->get();
                if($procedure->count() == 0){
                    Procedure::create([
                    'procedure_name'=>($row[2]),
                    'methode_id'=>($methode_id),
                    'added_by' => auth()->user()->id,
                    ]);           
                }
                }
                $procedure_query = Procedure::where('procedure_name', ($row[2]))->get();
                if($procedure_query->count() == 0){
                    $procedure_id = null;
                }else {
                    $procedure_id =  $procedure_query[0]->id ;
                }

                if (is_null($row[1])) {
                    $row[1] = 'no trademark filled';
                }  
               
               // dd(($row[8]));
                TradeMarkTicket::create([
                    'TKT_Type' => $row[9],
                    'client_id' => ($client_id),
                    'added_by' => auth()->user()->id,
                    'associate_id' => ($associate_id),
                    'methode_id' => ($methode_id),
                    'assigned_to' => auth()->user()->id,
                    'country_id'=>$request->country,
                    'class' => ($row[6]),
                    'register_no'=>($row[10]),
                    'procedure_id' => ($procedure_id),
                    'clientref' => ($row[1]),
                    'aiptref' => $row[1],
                    'filing_no'=>$row[7],
                    'filing_date'=> $row[11],
                    'imageexport'=> "\\".$concatImage . $imageIncrement . '.png',
                    'trademark_name' => $row[4],
                    'trademark_brief' => $row[3],
                    'img_paths' => $concatImage . $imageIncrement . '.png',
                    'folder_path' => null,
                    'related_TKT' => null,
                ]);
                $imageIncrement++;
                $related_TKT = TradeMarkTicket::latest()->first();
              
                if (is_null($row[10])) {
                    $row[10] = 'no comment';
                }
                TrademarkTicketHistory::create([
                    'Type' => 'Deadline',
                    'comment'=>$row[10],
                    'status'=>'ok',
                    'file_path'=>null,
                    'related_TKT'=>($related_TKT->id),
                    'added_by' => auth()->user()->id,
                ]);

                if (is_null($row[9])) {
                    $row[9] = 'no comment';
                }
                TrademarkTicketHistory::create([
                    'type' => 'filing',
                    'comment'=>$row[7]. 'filled at ' .$row[8],
                    'status'=>'ok',
                    'file_path'=>null,
                    'related_TKT'=>($related_TKT->id),
                    'added_by' => auth()->user()->id,
                ]);
    
                if (is_null($row[8])) {
                    $row[8] = 'no comment';
                }
                TrademarkTicketHistory::create([    
                    'Type' => 'Name of Applicant',
                    'comment'=>$row[8],
                    'status'=>'ok',
                    'file_path'=>null,
                    'related_TKT'=>($related_TKT->id),
                    'added_by' => auth()->user()->id,
                ]); 

                if (is_null($row[4])) {
                    $row[4] = 'no comment';
                }
                TrademarkTicketHistory::create([    
                    'Type' => 'Reg number',
                    'comment'=>$row[4],
                    'status'=>'ok',
                    'file_path'=>null,
                    'related_TKT'=>($related_TKT->id),
                    'added_by' => auth()->user()->id,
                ]); 
            }


            return redirect()->back()->with('success', 'Excel file imported successfully.');
        
            }


    
}



/*


        
        $startRow = 6;
        $endRow = 12;
       // dd($to);
        $file = $request->file('file');

       // $rows = $excel->toArray(null, $file);

       // );
       $rows = Excel::toArray(null, $file)->skip($startRow - 1)->take($endRow - $startRow + 1);
        dd($rows);
        foreach ($filteredRows as $row) {

            var_dump($row);
          
        }


 foreach ($rows as $row) {
            $client = Client::where('client_name', ($data[6]))->get();
            if($client->count() ==0){
               $client_ID = Client::create([
                    'client_name'=>($data[6]),
                    'country_id'=>4,
                    'type_clients_id'=>null,
                    'added_by' => auth()->user()->id,
                    'associate_id'=>null,
                    'img_path'=>null,
                    'following'=>null,
                    ]);
           }
           $client_ID = Client::where('client_name', ($data[6]))->get();
           
           $associate = Associate::where('associate_name', ($data[7]))->get();
            if($associate->count() == 0){
            Associate::create([
                'associate_name'=>($data[7]),
                'img_path'=>null,
                'country_id'=>4,
                'added_by' => auth()->user()->id,
                ]);
           
            }
            $associate_ID = Associate::where('associate_name', ($data[7]))->get();

            $methode = Methode::where('_methode_name', ($data[11]))->get();
            if($methode->count() == 0){
                Methode::create([
                '_methode_name'=>($data[11]),
                'color'=>'#'.str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT),
                'department_id'=>1,
                'added_by' => auth()->user()->id,
                ]);
           
            }
            $methode_ID = Methode::where('_methode_name', ($data[11]))->get();
          //  dd($methode_ID);
            $procedure = Procedure::where('procedure_name', ($data[5]))->get();
            if($procedure->count() == 0){
                Procedure::create([
                'procedure_name'=>($data[5]),
                'methode_id'=>($methode_ID[0]->id),
                'added_by' => auth()->user()->id,
                ]);           
            }
            $procedure_ID = Procedure::where('procedure_name', ($data[5]))->get();

         //   dd(gettype($associate_ID[0]->id));

            $country = Country::where('country_name', 'Qatar')->get();

            TradeMarkTicket::create([
                
                'TKT_Type' => 'new Ticket',
            
                'client_id' => ($client_ID[0]->id),
                'added_by' => auth()->user()->id,
                'associate_id' => ($associate_ID[0]->id),
                'methode_id' => ($methode_ID[0]->id),
                'assigned_to' => null,
            
                'class' => ($data[3]),
                'procedure_id' => ($procedure_ID[0]->id),

                'clientref' => ($data[0]),
                'aiptref' => null,

                'trademark_name' => ($data[1]),
                'trademark_brief' => 'null',
                'img_paths' => null,
                'folder_path' => null,
                'related_TKT' => null,         
            ]);
            $related_TKT = TradeMarkTicket::latest()->first();
            //dd($related_TKT->id);
            TrademarkTicketHistory::create([
                'Type' => 'filing_no',
                'comment'=>'added by system',
                'status'=>'ok',
                'file_path'=>null,
                'related_TKT'=>($related_TKT->id),
                'added_by' => auth()->user()->id,
            ]);

            TrademarkTicketHistory::create([
                'type' => 'filing_date',
                'comment'=>'added by system',
                'status'=>'ok',
                'file_path'=>null,
                'related_TKT'=>($related_TKT->id),
                'added_by' => auth()->user()->id,
            ]);

            TrademarkTicketHistory::create([    
                'Type' => 'Name of Applicant',
                'comment'=>'added by system',
                'status'=>'ok',
                'file_path'=>null,
                'related_TKT'=>($related_TKT->id),
                'added_by' => auth()->user()->id,
            ]); 
*/