<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Credito.
 *
 * @author  The scaffold-interface created at 2018-06-19 01:25:06pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Credito extends Model
{
	
	use SoftDeletes;

	protected $dates = ['deleted_at'];
    
	
    protected $table = 'creditos';

	
}
