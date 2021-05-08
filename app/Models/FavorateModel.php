<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class FavorateModel extends Model
{
	use SoftDeletes;
  	public $dates = ['deleted_at'];
    protected $table = 'favorates';
    protected $fillable = ['user_id','favorate_id','video_id','favorate'];

    public function getVideoInfo() {
    	return $this->hasOne('App\Models\Video','id','video_id');
    }
}
