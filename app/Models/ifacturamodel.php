<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ifacturamodel extends Model
{
    use HasFactory;

    protected $table = 'ifactura';
    protected $primaryKey = 'idIfactura';
    protected $fillable = [
        'idFacturaIfactura',
        'cantIfactura',
        'pedidos_id'
    ];
    public $timestamps = false;
}
