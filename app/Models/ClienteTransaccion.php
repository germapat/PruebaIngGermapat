<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClienteTransaccion extends Model
{
    protected $table = 'cliente_transaccion';
    protected $fillable = [
        'bank_code','cliente_id', 'ip','estado_pago','transactionID','sessionID'
    ];

}
