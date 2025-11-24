<?php

namespace App\Filament\Resources\Productos\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Forms;

class ProductoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información General')
                    ->schema([
                        TextInput::make('nombre')
                            ->required()
                            ->maxLength(255),

                        Select::make('tipo')
                            ->options([
                                'material' => 'Material',
                                'herramienta' => 'Herramienta',
                            ])
                            ->required()
                            ->native(false),

                        TextInput::make('codigo')
                            ->label('SKU / Código')
                            ->unique(ignoreRecord: true),
                    ])->columns(2),

                Section::make('Inventario')
                    ->schema([
                        TextInput::make('stock_actual')
                            ->label('Stock Actual')
                            ->numeric()
                            ->default(0)
                            ->disabled() // Bloqueado como pediste
                            ->dehydrated(false), // No se envía al guardar

                        TextInput::make('stock_minimo')
                            ->label('Alerta Mínima')
                            ->numeric()
                            ->default(5),
                    ])->columns(2),
            ]);
    }
}
