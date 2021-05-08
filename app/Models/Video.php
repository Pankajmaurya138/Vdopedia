<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Overtrue\LaravelFollow\Traits\CanBeLiked;
use App\Models\CommentModel;
use App\Models\VideoCategoryUpload;
use App\User;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
class Video extends Model implements Searchable
{
	use SoftDeletes, CanBeLiked;
    protected $dates = ['deleted_at'];

    protected $fillable = ['category_id','title','likes','dis_likes','description','video_file','image_file',
							'meta_title','upload_date','meta_description',
						];
    protected $table = 'videos';

    public function getCategoryName() {
    	return $this->hasOne('App\Models\Category','id','category_id');
    }

     public function getCategoryName1() {
        return $this->hasMany('App\Models\VideoCategoryUpload','video_id','id');
    }

    public function getUserInfo() {
    	return $this->hasOne('App\User','id','user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getTags() {
        return $this->hasMany('App\Models\TagModel','video_id','id');
    }

    public function getMetaTitle() {
        return $this->hasMany('App\Models\MetaTitleModel','video_id','id');
    }

    public function getFavorateVideo() {
        return $this->hasMany('App\Models\FavorateModel','video_id','id')->where('favorate','=','yes');
    }

    public function getcomments() {
        
        return $this->hasMany('App\Models\CommentModel','video_id','id')->whereNull('parent_id');
    }
    
    public function likeAndDislike() {
        return $this->hasMany('App\Models\LikeDislike','video_id','id');
    }

    public function getRep()
    {
        return $this->hasMany(CommentModel::class, 'parent_id');
    }
    
    /* comment section relationship */ 
    public function getAllComment() {
        return $this->hasMany('App\Models\CommentModel','video_id','id');
    }
     /* end of comment section relationship */ 
   

    public function getSearchResult(): SearchResult
    {
        $video_id = $this->id;
        return new SearchResult(
            $this,
            $this->user_id,
            $this->title,
            $video_id
         );
    }
}