<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Disabled guarded form submission 
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}