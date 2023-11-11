<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Associates;
use App\Models\Post;
use App\Models\Past;
class Associates extends Model
{
    use HasFactory;

    protected $fillable = ['name','country','type','assignedID','abbr'];
     
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function past()
    {
        return $this->belongsToMany(Past::class);
    }
}
