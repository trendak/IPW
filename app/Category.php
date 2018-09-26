<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{

	protected $fillable = ['name'];
    //Kategoria jest przypisana do wielu przedmiotów
    public function items()
    {
    	return $this->belongsToMany('App/Item')->withTimestamps();
    }
}
