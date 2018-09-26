<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping_method extends Model
{
	public $table = "Shipping_method";
    protected $fillable = ['name'];
    
    public function items()
    {
    	return $this->hasOne('App/Item');
    }
}
