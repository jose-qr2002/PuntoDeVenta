<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodoPago extends Model
{
    use HasFactory;

    protected $table = "metodopagos";

    protected $fillable = [
        'metodo',
    ];

    public function factura() {
        return $this->hasMany(Factura::class, 'metodopago_id');
    }
}
