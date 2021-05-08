<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mp3AndTumbnails extends Model
{
    protected $table = 'mp3_and_thumbnails';
    protected $fillable = ['mp3_output_path','thumbnails_path'];
}
