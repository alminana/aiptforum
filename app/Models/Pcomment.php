<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pcomment extends Model
{
    use HasFactory;

    protected $fillable = ['text','author','past_id'];

    public function past()
    {
        return $this->belongsTo(Past::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
