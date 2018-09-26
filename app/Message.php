<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
    	'who_send',
    	'text',
    	'title',
        'id_conversation'


    ];

    public function sender()
        {
            return $this->hasOne('App\User', 'id', 'who_send');
        }
 
}
