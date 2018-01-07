<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientePse extends Model
{
    protected $table = 'cliente_pse';
    protected $fillable = [
        'nombres', 'apellidos', 'documento','correo'
    ];

}
