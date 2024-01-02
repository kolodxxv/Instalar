<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'profile/8jWzsGUY1lxSDTMOSEWHJrqUs9ubRhBs7924Gt6K.png';
        return '/storage/' . $imagePath;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
