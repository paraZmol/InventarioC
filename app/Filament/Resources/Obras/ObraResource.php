<?php

namespace App\Filament\Resources\Obras;

use App\Filament\Resources\Obras\Pages\CreateObra;
use App\Filament\Resources\Obras\Pages\EditObra;
use App\Filament\Resources\Obras\Pages\ListObras;
use App\Filament\Resources\Obras\Schemas\ObraForm;
use App\Filament\Resources\Obras\Tables\ObrasTable;
use App\Models\Obra;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ObraResource extends Resource
{
    protected static ?string $model = Obra::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice;
    protected static string|UnitEnum|null $navigationGroup = 'Gestión';
    protected static ?string $recordTitleAttribute = 'nombre';
    protected static ?string $navigationLabel = 'Obras';
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return ObraForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ObrasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListObras::route('/'),
            'create' => CreateObra::route('/create'),
            'edit' => EditObra::route('/{record}/edit'),
        ];
    }
}