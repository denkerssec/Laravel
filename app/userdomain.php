<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userdomain extends Model
{
    protected $table = 'userdomain';

	protected $fillable = array('useremail'); 
}