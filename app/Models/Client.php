<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Client;
use App\Models\Post;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name','country','type'];
     
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
