<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facturamodel extends Model
{
    use HasFactory;

    protected $table = "factura";
    protected $primaryKey = 'idFactura';
    protected $fillable = [
        'idClienteFactura',
        'fechaFactura'
    ];
    public $timestamps = false;
}
