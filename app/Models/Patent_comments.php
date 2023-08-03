<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Patent;

class Patent_comments extends Model
{
    use HasFactory;

    protected $fillable = ['the_comment','patent_id','user_id'];

    public function patent()
    {
        return $this->belongsTo(Patent::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
