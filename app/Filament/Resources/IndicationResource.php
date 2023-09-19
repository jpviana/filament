<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IndicationResource\Pages;
use App\Filament\Resources\IndicationResource\RelationManagers;
use App\Models\Indication;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IndicationResource extends Resource
{
    protected static ?string $model = Indication::class;

    protected static ?string $navigationIcon = 'heroicon-s-user-group';
    protected static ?string $navigationLabel = 'Indicações';
    protected static ?string $modelLabel = 'Indicação';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->email(),
                Forms\Components\Select::make('type')
                ->options([
                    'Indicador' => 'Indicador',
                    'Revendedor' => 'Revendedor',
                ])->native(false),
                Forms\Components\Textarea::make('interest')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
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
            'index' => Pages\ListIndications::route('/'),
            'create' => Pages\CreateIndication::route('/create'),
            'edit' => Pages\EditIndication::route('/{record}/edit'),
        ];
    }
}
