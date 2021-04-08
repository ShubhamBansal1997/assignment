<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

    public function subscribers()
    {
    	return $this->belongsToMany(User::class, 'website_user');
    }

    public function posts()
    {
    	return $this->hasMany(Post::class);
    }
}
