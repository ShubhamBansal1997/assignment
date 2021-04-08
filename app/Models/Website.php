<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;
    use Uuids;
    /**
     * Set autoincrement to false
     *
     * @var  bool
     */
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
    public $incrementing = false;

    public function subscribers()
    {
    	return $this->belongsToMany(User::class, 'website_users', 'website_id', 'user_id');
    }

    public function posts()
    {
    	return $this->hasMany(Post::class);
    }
}
