<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $fillable = ['name','slug'];
    protected $table = 'category';

    public function getCategoryAllVideoCount() {
    	return $this->hasMany('App\Models\Video','category_id','id')->whereNull('deleted_at');
    }

    public function getCategoryWiseVideo() {
    	return $this->hasMany('App\Models\Video','category_id','id')->whereNull('deleted_at')->take(4);
    }
}
