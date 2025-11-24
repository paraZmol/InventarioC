<?php

namespace App\Filament\Resources\MovimientoInventarios\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;

class MovimientoInventariosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('created_at')
                    ->dateTime('d/m/Y H:i')
                    ->label('Fecha')
                    ->sortable(),

                TextColumn::make('producto.nombre')
                    ->searchable()
                    ->weight('bold'),

                TextColumn::make('tipo')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => ucfirst($state)) // Capitaliza primera letra
                    ->color(fn (string $state): string => match ($state) {
                        'entrada' => 'success',    // Verde
                        'salida' => 'danger',      // Rojo
                        'devolucion' => 'info',    // Azul
                        default => 'gray',
                    }),

                TextColumn::make('cantidad')
                    ->alignCenter(),

                TextColumn::make('obra.nombre')
                    ->label('Obra')
                    ->placeholder('---'),
            ])
            ->filters([
                SelectFilter::make('tipo')
                    ->options([
                        'entrada' => 'Entradas',
                        'salida' => 'Salidas',
                        'devolucion' => 'Devoluciones',
                    ]),
                SelectFilter::make('producto')
                    ->relationship('producto', 'nombre'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}