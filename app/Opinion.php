<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    protected $fillable = [
    	'id_to_user',
    	'id_from_user',
    	'id_exchange',
    	'description',
    	'satisfaction'


    ];
     public function to_user()
        {
            return $this->hasOne('App\User', 'id', 'id_to_user');
        }

    public function from_user()
        {
            return $this->hasOne('App\User', 'id', 'id_from_user');
        }
     public function exchange()
        {
            return $this->hasOne('App\Exchange', 'id', 'id_exchange');
        }
}
