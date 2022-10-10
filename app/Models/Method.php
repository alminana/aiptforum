<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\Post;
class Method extends Model
{
    use HasFactory;

    protected $fillable = ['method'];
     
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
