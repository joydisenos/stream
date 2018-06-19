<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    //

    public function User()
    {
        return $this->belongsTo(User::class,'user_id_usuario');
    }

    public function Afiliado()
    {
        return $this->belongsTo(User::class,'user_id_afiliado');
    }
}
