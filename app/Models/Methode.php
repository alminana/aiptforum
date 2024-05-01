<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Methode extends Model
{
    use HasFactory;
    protected $fillable = [
        '_methode_name','color','department_id','added_by',
    ];

}
