<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class SubscriptionModel extends Model
{
	use SoftDeletes;
  	protected $dates = ['deleted_at'];
    protected $table = 'subscriptions';
    protected $fillable = ['user_id','subscribe_status','subscriber_id','subscriber_date'];

    public function getSubscriptionInfo() {

    	return $this->hasOne('App\User','id','user_id');
    }

     public function subscriberInfo() {

    	return $this->hasOne('App\User','id','subscriber_id');
    }
    
}
