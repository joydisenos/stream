<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Foto.
 *
 * @author  The scaffold-interface created at 2018-04-19 08:27:13pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Foto extends Model
{
	
	use SoftDeletes;

	protected $dates = ['deleted_at'];
    
	
    protected $table = 'fotos';

    public function User()
    {
        return $this->belongsTo(User::class);
    }
	
}
