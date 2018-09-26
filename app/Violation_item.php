<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Violation_item extends Model
{
		public $table = "violation_of_items";
      protected $fillable = [
    	'description',
    	'item_id',
    	'user_id'
       
    	

    ];
     public function user()
    {
    	return $this->belongsTo('App\User');

    }
     public function item()
        {
            return $this->hasOne('App\Item', 'id', 'item_id');
        }
}
