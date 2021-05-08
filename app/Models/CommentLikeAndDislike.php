<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentLikeAndDislike extends Model
{
    protected $table = 'comment_like_dislike';
    protected $fillable = ['user_id','comment_id','likes','dislikes'];
}
