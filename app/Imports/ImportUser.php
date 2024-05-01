<?php

namespace App\Imports;


use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;


use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToArray;

use App\Models\User;
use App\Models\TradeMarkTicket;
use App\Models\Client;
use App\Models\Country;
use App\Models\TrademarkTicketHistory;
use App\Models\Associate;
use App\Models\Methode;
use App\Models\Procedure;


class ImportUser implements ToModel, WithHeadingRow, SkipsEmptyRows, SkipsUnknownSheets, WithMultipleSheets, WithBatchInserts, WithChunkReading
{
    
      /*
    protected $rows = [];
    protected $endRow = 10; // Set your desired end row

    protected $userModel;
    protected $TradeMarkTicketModel;
    protected $ClientrModel;
    protected $CountryModel;
    protected $TrademarkTicketHistoryModel;
    protected $AssociateModel;
    protected $MethodeModel;
    protected $ProcedureModel;

  
    public function __construct(User $userModel ,
     TradeMarkTicket $TradeMarkTicketModel ,
     Client $ClientrModel,
      Country $CountryModel ,
      TrademarkTicketHistory $TrademarkTicketHistoryModel,
       Associate $AssociateModel,
       Methode $MethodeModel,
        Procedure $ProcedureModel)
    {
        $this->userModel = $userModel;
        $this->TradeMarkTicketModel = $TradeMarkTicketModel;
        $this->ClientrModel = $ClientrModel;
        $this->CountryModel = $CountryModel;
        $this->TrademarkTicketHistoryModel = $TrademarkTicketHistoryModel;
        $this->AssociateModel = $AssociateModel;
        $this->MethodeModel = $MethodeModel;
        $this->ProcedureModel = $ProcedureModel;
    }

    
    public function array(array $row)
    {
        dd($row);
        if ($this->getRowCount() <= $this->endRow) {
            $this->rows[] = $row;
            $client =  $this->ClientrModel::where('client_name', ($row[6]))->get();
                if($client->count() ==0){
                $client_ID = $this->ClientrModel::create([
                        'client_name'=>($row[6]),
                        'country_id'=>4,
                        'type_clients_id'=>null,
                        'added_by' => auth()->user()->id,
                        'associate_id'=>null,
                        'img_path'=>null,
                        'following'=>null,
                        ]);
            }
        $client_ID = $this->ClientrModel::where('client_name', ($row[6]))->get();
        }
    } 

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
   
    public function startRow(): int
    {
        return 6; // Start importing from row 2 (assuming your headers are in row 1)
    }

     /**
     * @return bool
    public function isEndRow(): bool
    {
        return $this->getRowCount() >= $this->endRow;
    }

    public function getRows(): array
    {
        return $this->rows;
    }

    public function getRowCount(): int
    {
        return count($this->rows);
    }
    */

    protected $startRow;
    protected $endRow;

    public function __construct($startRow, $endRow)
    {
        $this->startRow = $startRow;
        $this->endRow = $endRow;
    }
 
    public function model(array $row)
    {
        dd($row);
        // Your logic to process each row goes here
        // Return a new model instance

        // Example: Assuming your model is named YourModel
        return new YourModel([
            'column1' => $row[0],
            'column2' => $row[1],
            // ... other columns
        ]);
    }

    public function startRow(): int
    {
        return $this->startRow;
    }

    public function endRow(): int
    {
        return $this->endRow;
    }

    public function onUnknownSheet($sheetName)
    {
        // Handle unknown sheets if needed
    }

    public function sheets(): array
    {
        // Specify sheets if using WithMultipleSheets
        return [
            'Database' => $this,
        ];
    }

    public function batchSize(): int
    {
        // Specify the batch size if using WithBatchInserts
        return 1000;
    }

    public function chunkSize(): int
    {
        // Specify the chunk size if using WithChunkReading
        return 1000;
    }

}
