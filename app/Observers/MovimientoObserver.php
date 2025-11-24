<?php

namespace App\Observers;

use App\Models\MovimientoInventario;
use Filament\Notifications\Notification;

class MovimientoObserver
{
    //observar los mivmientos del invetanrio
    public function created(MovimientoInventario $movimiento): void
    {
        // busca producto
        $producto = $movimiento->producto;

        // logica mate
        if ($movimiento->tipo === 'entrada') {
            // compra - suma
            $producto->increment('stock_actual', $movimiento->cantidad);
        }
        elseif ($movimiento->tipo === 'devolucion') {
            // devolucio - suma - vuelve al almacen
            $producto->increment('stock_actual', $movimiento->cantidad);
        }
        elseif ($movimiento->tipo === 'salida') {
            // salida - resta

            // validacion extra de seguridad
            if ($producto->stock_actual < $movimiento->cantidad) {
                // para la demo?
            }

            $producto->decrement('stock_actual', $movimiento->cantidad);
        }
    }

    // para revertir el movimiento en caso de borrar
    public function deleted(MovimientoInventario $movimiento): void
    {
        $producto = $movimiento->producto;

        if ($movimiento->tipo === 'entrada' || $movimiento->tipo === 'devolucion') {
            $producto->decrement('stock_actual', $movimiento->cantidad);
        } elseif ($movimiento->tipo === 'salida') {
            $producto->increment('stock_actual', $movimiento->cantidad);
        }
    }
}
