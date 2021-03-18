<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    public function users()
    {
        return $this->belongsToMany(\App\Models\User::class);
    }
}