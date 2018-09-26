<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
    	'title',
    	'image_url',
    	'description',
        'shipping'
    	

    ];
    // przedmiot użytkownika
    public function user()
    {
    	return $this->belongsTo('App\User');

    }
    public function shippingname(){
           return $this->hasOne('App\Shipping_method', 'id', 'shipping');
    }
  
    //Przedmiot ma wiele kategorii

    public function categories()
    {
        return $this->belongsToMany('App\Category')->withTimestamps();
    }

    //lista id kategorii dla przedmiotu
    public function getCategoryListAttribute()
    {
        return $this->categories->pluck('id')->all();
    }
}
