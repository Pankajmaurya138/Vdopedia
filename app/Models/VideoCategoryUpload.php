<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoCategoryUpload extends Model
{
    protected $table = 'video_upload_categories';
    protected $fillable = ['video_id','category_id'];

    public function getCategory() {
    	return $this->hasOne('App\Models\Category','id','category_id');
    }
}
