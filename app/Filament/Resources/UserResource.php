<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    //  protected static?string $pluralModelLabel = "Usuarios" ;

    // protected static ?string $modelLabel = 'Usuario';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Administración';

    protected static ?int $navigationSort = 0;

    public static function getPluralModelLabel(): string
    {
        return __('Usuarios');
    }

    public static function getModelLabel(): string
    {
        return __('Usuario');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
{
    return __('Usuario Registrado');
}

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('Name'))
                    ->autocapitalize('words')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->label(__('Email Address'))
                    ->email()
                    ->maxLength(255),
                Select::make('rol')
                    ->multiple()
                    ->relationship('roles', 'name')
                    ->searchable()
                    ->preload()
                    ->createOptionForm(
                        [
                            TextInput::make('name')
                                ->required()
                                ->maxLength(255),
                        ]
                    )
                    ->required(),
                TextInput::make('password')
                    ->translateLabel()
                    ->password()
                    ->revealable()
                    ->minLength(8)
                    ->maxLength(14),
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('roles.name'),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
