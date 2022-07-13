<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    public function stories()
    {
        return $this->belongsToMany(\App\Models\Story::class);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
