<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatentTicketDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'patent_tickets_id','type','detail','file_path','added_by','related_TKT', 
    ];
}
