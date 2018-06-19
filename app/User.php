<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\CustomResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Dato()
    {
        return $this->hasOne(Dato::class);
    }


    public function Movimiento()
    {
        return $this->hasMany(Movimiento::class);
    }

    public function Foto()
    {
        return $this->hasMany(Foto::class);
    }

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }

    public function pago()
    {
        return $this->hasMany(Pago::class,'user_id_usuario');
    }

    public function gana()
    {
        return $this->hasMany(Pago::class,'user_id_afiliado');
    }

    public function Billetera()
    {
        return $this->hasOne(Billetera::class);
    }

    public function Categorias()
    {
        return $this->hasMany(Filtro_usuario::class);
    }

}
