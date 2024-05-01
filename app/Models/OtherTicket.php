<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherTicket extends Model
{
    use HasFactory;
    protected $fillable = [
      'type', 'title', 'discription', 'resone', 'file_path', 'solved_by', 'assigned_to', 'added_by','related_TKT_trademark','related_TKT_patent',
    ];

}
