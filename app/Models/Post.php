<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Client;
use App\Models\Method;
use App\Models\Associates;
use DB;
class Post extends Model
{
    use HasFactory;
    

    protected $fillable = [ 'assignedID',
                            'aiptref',
                            'clientref',
                            'title',
                            'agent',
                            'slug',
                            'filingdate',
                            'applicant',
                          
                            'registrationno',
                          
                            'renewal',
                            'excerpt' ,
                            'status',
                            'proceduredate',
                            'requesteddate',
                            'country',
                            'class',
                            'category_id',
                            
                            'body',
                            'inputPfolderlink',
                            'user_id',
                            'approved'];

    public static function gettrademark()
    {
        $result = DB::table('posts')
        ->select(
                 'assignedID',
                 'aiptref',
                 'clientref',
                 'title',
                 'status',
                 'slug',
                 'filingdate',
                 'requesteddate',
                 'proceduredate',
                 'class',
                 'excerpt',
                 'country',
          
                )
        ->get()->toArray();
        return $result;
    }

    public function method()
    {
        return $this->belongsToMany(Method::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    // Scope function
    public function scopeApproved($query)
    {
        return $query->where('approved', 1);
    }

    public function client()
    {
        return $this->belongsToMany(Client::class);
    }

    public function associates()
    {
        return $this->belongsToMany(Associates::class);
    }
}

