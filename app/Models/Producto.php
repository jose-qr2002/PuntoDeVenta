<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = "productos";

    protected $fillable = [
        'codigo',
        'nombre',
        'stock',
        'precio',
        'medida',
        'categoria_id',
    ];

    public function categoria() {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function facturadetalles() {
        return $this->hasMany(FacturaDetalle::class, 'producto_id');
    }
}
