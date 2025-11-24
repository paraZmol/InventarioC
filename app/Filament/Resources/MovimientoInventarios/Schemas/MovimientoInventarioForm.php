<?php

namespace App\Filament\Resources\MovimientoInventarios\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class MovimientoInventarioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Detalles del Movimiento')
                    ->schema([
                        // Fila 1
                        Select::make('producto_id')
                            ->label('Producto')
                            ->relationship('producto', 'nombre')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('tipo')
                            ->label('Tipo de Operación')
                            ->options([
                                'entrada' => 'Entrada (Compra)',
                                'salida' => 'Salida a Obra',
                                'devolucion' => 'Devolución',
                            ])
                            ->required()
                            ->native(false),

                        // Fila 2
                        TextInput::make('cantidad')
                            ->numeric()
                            ->minValue(1)
                            ->required(),

                        Select::make('obra_id')
                            ->label('Obra (Destino / Origen)')
                            ->relationship('obra', 'nombre')
                            ->searchable()
                            ->preload()
                            ->placeholder('Seleccione obra si aplica...'),

                        // Fila 3
                        TextInput::make('asignado_a')
                            ->label('Entregado a (Nombre Persona)'),

                        Textarea::make('notas')
                            ->label('Observaciones / Notas')
                            ->columnSpanFull(),
                    ])->columns(2),
                ]);
    }
}
