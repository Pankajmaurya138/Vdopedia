<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
class TagModel extends Model implements Searchable
{
	use SoftDeletes;
  	protected $dates = ['deleted_at'];
    protected $table = 'tags';

    protected $fillable = ['user_id','video_id','name','slug_name'];

     public function getSearchResult(): SearchResult {
        $video_id = $this->video_id;
        return new SearchResult(
            $this,
            $this->video_id,
            $this->name,
         );
    }
}
