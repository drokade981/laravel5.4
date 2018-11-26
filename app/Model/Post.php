<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
      'name', 'email', 'password',
    ];
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
