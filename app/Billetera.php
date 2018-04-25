<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Billetera.
 *
 * @author  The scaffold-interface created at 2018-04-19 08:24:46pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Billetera extends Model
{
	
	use SoftDeletes;

	protected $dates = ['deleted_at'];
    
	
    protected $table = 'billeteras';

	public function user()
    {
        return $this->belongsTo(User::class);
    }
}
