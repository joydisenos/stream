<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
