<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowClient extends Model
{
    use HasFactory;
    protected $fillable = [
        'followed_by','client_id',
    ];
}
