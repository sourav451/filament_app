<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationGroup = 'Settings';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('name')->label(__('Employee_Name'))
                    ->placeholder('Employee_Name')
                    ->minLength(5)
                    ->maxLength(255)
                    ->required(),
                TextInput::make('email')
                    ->email()
                    ->placeholder('Email')
                    ->minLength(4)
                    ->maxLength(255)
                    ->required(),
                TextInput::make('password')->label(__('Password'))
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->placeholder('password')
                    ->minLength(4)
                    ->maxLength(255)
                    ->required(fn (Page $livewire) => ($livewire instanceof CreateUser)),
                Select::make('roles')
                    ->multiple()
                    ->relationship('roles', 'name')
                    ->preload(),
                Select::make('permissions')
                    ->multiple()
                    ->relationship('permissions', 'name')
                    ->preload(),
                // Select::make('role')->label(__('Role'))
                //     ->options([
                //         'admin' => 'Admin',
                //         'employee' => 'Employee',
                //         'trainee' => 'Trainee',
                //     ]),
                // TextInput::make('position')
                //     ->placeholder('Position')
                //     ->minLength(4)
                //     ->maxLength(255)
                //     ->required(),
                TextInput::make('street')
                    ->placeholder('Street')
                    ->minLength(4)
                    ->maxLength(255),
                TextInput::make('city')
                    ->placeholder('City')
                    ->minLength(4)
                    ->maxLength(255),
                TextInput::make('region')
                    ->placeholder('Region'),
                TextInput::make('postal_code')
                    ->placeholder('Postal_Code')
                    ->numeric(),
                TextInput::make('country')
                    ->placeholder('Country')
                    ->minLength(3)
                    ->maxLength(20),
                // TextInput::make('email')
                //     ->placeholder('Email')
                //     // ->autocomplete('Name')
                //     ->email()
                //     ->suffix('.com')
                //     ->required(),
                TextInput::make('phone_no')
                    ->placeholder('Phone_No')
                    ->tel(),
                DatePicker::make('joining_date')
                    ->rules('required', 'before_or_equal:today')
                    ->label(__('Joining_date')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('id'),
                TextColumn::make('name')->limit(20)->sortable()->searchable(),
                // TextColumn::make('roles')
                // ->name(role),
                TextColumn::make('joining_date'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
            RelationManagers\TrainingweeksRelationManager::class,
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
    // public static function getEloquentQuery(): Builder
    // {
    //     return parent::getEloquentQuery()->whereBelongsTo(auth()->user());
    // }
}
