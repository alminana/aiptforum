<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrademarkTicketHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'type','comment','status','file_path','related_TKT','added_by',
    ];

}
