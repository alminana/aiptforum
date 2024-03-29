<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Role;
use App\Models\Post;
use App\Models\Past;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Category;
use App\Models\Patent_comments;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'role_id',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function patent_comments()
    {
        return $this->hasMany(Patent_comments::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function past()
    {
        return $this->hasMany(Past::class);
    }
}
