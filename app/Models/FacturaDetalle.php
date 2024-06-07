<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturaDetalle extends Model
{
    use HasFactory;

    protected $table = "facturas_detalles";

    protected $fillable = [
        'producto_id',
        'factura_id',
        'cantidad',
        'precion_unitario',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function factura()
    {
        return $this->belongsTo(Factura::class, 'factura_id');
    }
}
