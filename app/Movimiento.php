<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Movimiento.
 *
 * @author  The scaffold-interface created at 2018-04-17 08:58:37pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Movimiento extends Model
{
	
	use SoftDeletes;

	protected $dates = ['deleted_at'];
    
	
    protected $table = 'movimientos';

    public function User()
    {
        return $this->belongsTo(User::class);
    }
	
}
