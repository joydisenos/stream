<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Filtro_usuario.
 *
 * @author  The scaffold-interface created at 2018-06-15 08:31:02pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Filtro_usuario extends Model
{
	
	use SoftDeletes;

	protected $dates = ['deleted_at'];
    
	
    protected $table = 'filtro_usuarios';

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

     public function filtro()
    {
        return $this->belongsTo(Filtro::class,'filtro_id');
    }

	
}
