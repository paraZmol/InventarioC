<?php

namespace App\Filament\Resources\Productos\Pages;

use App\Filament\Resources\Productos\ProductoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListProductos extends ListRecords
{
    protected static string $resource = ProductoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // buton imprimir
            Actions\Action::make('imprimir')
                ->label('Imprimir Reporte')
                ->icon('heroicon-o-printer') // icono impre
                ->url(route('reporte.stock')) // ruta
                ->openUrlInNewTab(), // new pestaña

            // buton crear
            CreateAction::make(),
        ];
    }
}
