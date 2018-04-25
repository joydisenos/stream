<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Dato.
 *
 * @author  The scaffold-interface created at 2018-04-17 08:54:35pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Dato extends Model
{
	
	use SoftDeletes;

	protected $dates = ['deleted_at'];
    
	
    protected $table = 'datos';

    protected $fillable = [

    						'usuario_id',
							'biografia',
							'nacimiento_ano',
							'sexo',
							'localidad',
							'interes',

    						];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
	
}
