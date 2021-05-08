<?php

namespace App;

use Overtrue\LaravelFollow\Traits\CanLike;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements Searchable
{
    use CanLike,Notifiable,SoftDeletes;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'sex','age','role_id','email','facebook_id','mobile', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     protected $dates = ['deleted_at'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function addNew($input)
    {
        $check = static::where('facebook_id',$input['facebook_id'])->first();
        if(is_null($check)){
            return static::create($input);
        }
        return $check;
    }

    public function getAllVideos() {
        return $this->hasMany('App\Models\Video','user_id','id')->whereNull('deleted_at')->orderBy('created_at','DESC');
    }

    public function getAllfavorateVideo() {
        return $this->hasMany('App\Models\FavorateModel','favorate_id','id')->whereNull('deleted_at')->where('favorate','=','yes');
    }

    public function getSubscriber() {
        return $this->hasMany('App\Models\SubscriptionModel','subscriber_id','id');
    }
    

    public function getAllSubscriber() {
        return $this->hasMany('App\Models\SubscriptionModel','user_id','id');
    }

    public function getAllUserTag() {
        return $this->hasMany('App\Models\TagModel','user_id','id')->limit(35);
    }

 	public function getSearchResult(): SearchResult
    {
        $video_id = "";
        return new SearchResult(
            $this,
            $this->id,
            $this->name,
            $this->video_id = $video_id,
         );
    }

}
