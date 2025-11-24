<?php

namespace App\Filament\Resources\Obras\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ObraForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),

                TextInput::make('responsable')
                    ->label('Responsable de Obra')
                    ->maxLength(255),

                Toggle::make('activo')
                    ->label('Obra Activa')
                    ->default(true),
            ]);
    }
}
