<?php

namespace App\Filament\Resources\Productos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;

class ProductosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('tipo')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'material' => 'gray',
                        'herramienta' => 'warning',
                    }),

                TextColumn::make('codigo')
                    ->searchable(),

                TextColumn::make('stock_actual')
                    ->numeric()
                    ->sortable()
                    ->color(fn ($record) => $record->stock_actual <= $record->stock_minimo ? 'danger' : 'success'),
            ])
            ->filters([
                SelectFilter::make('tipo'),
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
