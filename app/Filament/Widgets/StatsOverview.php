<?php

namespace App\Filament\Widgets;

use App\Models\MovimientoInventario;
use App\Models\Obra;
use App\Models\Producto;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    // Actualizar datos cada 15 segundos (polling)
    protected ?string $pollingInterval = '15s';

    protected function getStats(): array
    {
        // logica para obras activas
        $obrasActivas = Obra::where('activo', true)->count();

        // logica para stock bajo
        $stockBajo = Producto::whereColumn('stock_actual', '<=', 'stock_minimo')->count();

        // logica para movimientos de hoy
        $movimientosHoy = MovimientoInventario::whereDate('created_at', now()->today())->count();

        return [
            // TARJETA 1 - OBRAS
            Stat::make('Obras en Ejecución', $obrasActivas)
                ->description('Proyectos activos')
                ->descriptionIcon('heroicon-m-building-office')
                ->color('primary'),

            // TARJETA 2 - ALERTAS
            Stat::make('Alertas de Stock', $stockBajo)
                ->description($stockBajo > 0 ? 'Productos por agotarse' : 'Inventario saludable')
                ->descriptionIcon('heroicon-m-exclamation-triangle')
                // si hay stock bajo - color
                ->color($stockBajo > 0 ? 'danger' : 'success')
                // grafico
                ->chart($stockBajo > 0 ? [10, 8, 5, 2, 1] : [2, 5, 8, 10, 15]),

            // TARJETA 3: MOVIMIENTOS
            Stat::make('Movimientos Hoy', $movimientosHoy)
                ->description('Entradas y Salidas')
                ->descriptionIcon('heroicon-m-arrow-path')
                ->color('info')
                ->chart([2, 4, 6, 10, $movimientosHoy]), // grafico simple ascendente
        ];
    }
}