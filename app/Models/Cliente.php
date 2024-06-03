<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'dni',
        'nombres',
        'apellidos',
        'correo',
        'celular',
        'direccion',
    ];

    public function facturas() {
        return $this->hasMany(Factura::class, 'cliente_id');
    }
}
