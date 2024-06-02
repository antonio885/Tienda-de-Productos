<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seleccionproducto extends Model
{
    use HasFactory;
    protected $table = 'seleccionproducto';
    protected $fillable =[
        'nombrePro',
        'cantidad',
        'PrecioUnit',
        'PrecioTotal',
        'idPedidoSelect',
        'userIdPedChoose'
        
    ];
    public $timestamps = false;
}
