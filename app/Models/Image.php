<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Image extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'extension', 'path','imageable_id'];

    public function imageable()
    {
        return $this->morphTo();
    }

    public function users(){
        return $this->hasMany(User::class);
    }
}
