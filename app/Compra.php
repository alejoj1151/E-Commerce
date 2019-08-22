<?php

namespace Application;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = ['numero_transaccion', 'medio_pago', 'valor_compra'];
}
