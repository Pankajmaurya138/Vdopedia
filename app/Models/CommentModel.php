<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
class CommentModel extends Model
{
	use SoftDeletes;
  
    protected $dates = ['deleted_at'];
    
    protected $table = 'comments';

    protected $fillable = ['user_id','commentable_id','parent_id','comment_date','comment_description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getReplies()
    {
        return $this->hasMany(CommentModel::class, 'parent_id');
    }
    public function getUser() {
    	return $this->hasOne('App\User','id','user_id');
    }

    public function getVideoInfo() {
    	return $this->hasOne('App\Models\Video','id','video_id')->whereNull('deleted_at');
    }

    public function getLikeCountOnComment () {
        return $this->hasMany('App\Models\CommentLikeAndDislike','comment_id','id')->where('likes','=','1');
    }
     public function getDislikeCountOnComment () {
        return $this->hasMany('App\Models\CommentLikeAndDislike','comment_id','id')->where('dislikes','=','1');
    }

    public function getLikeAndDislike() {
        return $this->hasMany('App\Models\CommentLikeAndDislike','comment_id','id');
    }
}
