<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatentTicketHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'comment','status','file_path','added_by','related_TKT', 
    ];

}
