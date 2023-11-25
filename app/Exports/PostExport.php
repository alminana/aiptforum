<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PostExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Post::gettrademark());
    }

    public function headings():array{
        return[
            'Unique Id',
            'AIPTREF',
            'Client Ref.',
            'Application',
            'Method',
            'Filing #',
            'Filing Date',
            'Requested Date',
            'Actual Date',
            'class',
            'Client',
            'Country' 
           
        ];
    }
}
