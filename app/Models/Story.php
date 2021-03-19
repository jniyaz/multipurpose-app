<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Story extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    public function getTypeAttribute($value)
    {
        return ucfirst($value);
    }

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }

    public function getThumbnailAttribute()
    {
        return $this->cover_image ? asset('storage/stories/' . $this->cover_image) : asset('storage/stories/default.jpg');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(\App\Models\Tag::class);
    }
}