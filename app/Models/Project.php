<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function tasks()
    {
        return $this->hasMany(\App\Models\Task::class);
    }

    public function files()
    {
        return $this->hasMany(\App\Models\File::class);
    }
}
