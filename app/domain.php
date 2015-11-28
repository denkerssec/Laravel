<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class domain extends Model
{
    protected $table = 'domain';
	
	$domain = domain::all();
	protected $fillable = array('emaildomain');

}
