<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Patent;
use App\Models\Patent_comments;

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
    public function patent_comments()
    {
        return $this->belongsTo(Patent_comments::class);
    }
}
