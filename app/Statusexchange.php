<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statusexchange extends Model
{
	public $table = "statusexchange";
    protected $fillable = ['name'];
}
