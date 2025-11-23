<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'tipo', // material - herramienta
        'nombre',
        'codigo',
        'stock_actual',
        'stock_minimo',
    ];

    // 1 producto - M movimientos
    public function movimientos(): HasMany
    {
        return $this->hasMany(MovimientoInventario::class);
    }
}