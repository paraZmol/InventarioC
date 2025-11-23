<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Obra extends Model
{
    use HasFactory;

    protected $table = 'obras';

    protected $fillable = [
        'nombre',
        'responsableObra',
        'activo',
    ];

    // 1 obra - M movimientos
    public function movimientos(): HasMany
    {
        return $this->hasMany(MovimientoInventario::class);
    }
}
