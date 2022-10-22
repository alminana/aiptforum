<?php

namespace App\Imports;

use App\Models\Post;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportData implements ToCollection, WithHeadingRow,WithValidation
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach($rows as $row){
            $data=[
                'aiptref'=>$row['aiptref'],
                'clientref'=>$row['clientref'],
                'title'=>$row['title'],
                'agent'=>$row['agent'],
                'slug'=>$row['slug'],
                'filingdate'=>$row['filingdate'],
                'pubdate'=>$row['pubdate'],
                'appealdate'=>$row['appealdate'],

                'registrationno'=>$row['registrationno'],
                'registrationdate'=>$row['registrationdate'],
                'renewal'=>$row['renewal'],
                'excerpt'=>$row['excerpt'],
                'status'=>$row['status'],
                'country'=>$row['country'],
                'class'=>$row['class'],
                'category_id'=>$row['category_id'],
                'annuitydue'=>$row['annuitydue'],
                'body'=>$row['body'],
            ];
            Post::create($data);
        }
    }

}