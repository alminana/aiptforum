<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;
class Past extends Model
{
    use HasFactory;

    protected $fillable = ['title','text'];

    public function pcomment(): HasMany
    {
        return $this->hasMany(Pcomment::class);
    }
}
