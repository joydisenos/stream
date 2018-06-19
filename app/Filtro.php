<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Filtro.
 *
 * @author  The scaffold-interface created at 2018-06-15 08:29:52pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Filtro extends Model
{
	
	use SoftDeletes;

	protected $dates = ['deleted_at'];
    
	
    protected $table = 'filtros';

	
}
