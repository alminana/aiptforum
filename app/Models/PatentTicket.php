<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatentTicket extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id','added_by','associate_id','methode_id','assigned_to','class_id','procedure_id','country_id',
        'aiptref','clientref','title','pct_date','pct_no','regular_date','regular_no','filingno','requesteddate',
        'deadline_Status','related_TKT', 
    ];

}