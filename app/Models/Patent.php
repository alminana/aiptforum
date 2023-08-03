<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Patent_comments;
use App\Models\Image;
use App\Models\Client;
use App\Models\Method;

class Patent extends Model
{
    use HasFactory;
    

    protected $fillable = [ 'aiptref',
                            'clientref',
                            'title',
                            'client',
                            //selection for patent filing
                            'pct_date',
                            'regular_date',

                            //filing
                            'filingno',

                            //date of filing
                            'procedure',
                            'requesteddate',
                            'proceduredate',

                            //country
                            'country',

                            //annual
                            'annuity',
                            'annual_office_fee',
                            'annual_deadline',
                            //comment
                            'deadline_Status',
                            'user_id',
                            'approved'
                        ];

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

    public function patent_comments()
    {
        return $this->belongsTo(Patent_comments::class);
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
}

