<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pedidomodel extends Model
{
    use HasFactory;

    protected $table = 'pedidos';
    protected $fillable = [
        'codigoPed',
        'fechaPed',
        'nombre',
        'apellido',
        'direccion',
        'telefono',
        'totalPed',
        'formaPago',
        'idPedCustomer'
    ];
    public $timestamps = false;
}
