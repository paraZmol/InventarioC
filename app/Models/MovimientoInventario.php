<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MovimientoInventario extends Model
{
    use HasFactory;

    protected $table = 'movimiento_inventarios';

    protected $fillable = [
        'tipo',       // entrada - salida - devolucion
        'cantidad',
        'asignado_a',
        'notas',
        'producto_id',
        'obra_id',
        'user_id',
    ];

    // M movimientos - 1 producto
    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class);
    }

    // M movimientos - 1 obra
    public function obra(): BelongsTo
    {
        return $this->belongsTo(Obra::class);
    }

    // M movimientos - 1 usuario
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
