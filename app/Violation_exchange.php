<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Violation_exchange extends Model
{
   	public $table = "exchange_violations";
      protected $fillable = [
    	'description',
    	'id_exchange',
    	'user_id'
       
    	

    ];
         public function user()
    {
    	return $this->belongsTo('App\User');

    }
     public function exchange()
        {
            return $this->hasOne('App\Exchange', 'id', 'id_exchange');
        }
}
