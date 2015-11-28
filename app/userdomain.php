<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userdomain extends Model
{
    protected $table = 'userdomain';
	  protected $table = 'users';
	$userdomain = userdomain::all();
	protected $fillable = array('useremail');
}