<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
	 public $table = "Exchange";
     protected $fillable = [
    	'item_id',
    	'prop_item_id',
    	'status',
        'item_status',
        'prop_item_status'
    	
    	

    ];
      public function item()
        {
            return $this->hasOne('App\Item', 'id', 'item_id');
        }

    public function prop_item()
        {
            return $this->hasOne('App\Item', 'id', 'prop_item_id');
        }
        public function itemstatus()
        {
            return $this->hasOne('App\Statusexchange', 'id', 'item_status');
        }
         public function prop_itemstatus()
        {
            return $this->hasOne('App\Statusexchange', 'id', 'prop_item_status');
        }
}
