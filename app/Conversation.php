<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    //
    protected $fillable = [
    	'id_user_to_send',
    	'id_user_from',
    	'title'


    ];



       public function sender()
        {
            return $this->hasOne('App\User', 'id', 'id_user_from');
        }

    public function reciepient()
        {
            return $this->hasOne('App\User', 'id', 'id_user_to_send');
        }
        public function message(){
        	return $this->hasMany('App\Message');
        }
}
