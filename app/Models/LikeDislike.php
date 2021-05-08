<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikeDislike extends Model
{
    protected $fillable = ['user_id','video_id','likes','dislikes'];
    protected $table = 'likes_and_dislikes';
}
