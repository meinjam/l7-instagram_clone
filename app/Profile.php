<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Profile;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'title', 'description', 'url', 'image',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
