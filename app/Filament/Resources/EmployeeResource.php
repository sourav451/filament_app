<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Employee;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\RichEditor;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('name')->label(__('Employee_Name'))
                        ->placeholder('Employee_Name')
                        ->minLength(5)
                        ->maxLength(255)
                        ->required(),
                    TextInput::make('position')
                        ->placeholder('Position')
                        ->minLength(4)
                        ->maxLength(255)
                        ->required(),
                    TextInput::make('street')
                        ->placeholder('Street')
                        ->minLength(4)
                        ->maxLength(255)
                        ->required(),
                    TextInput::make('city')
                        ->placeholder('City')
                        ->minLength(4)
                        ->maxLength(255)
                        ->required(),
                    TextInput::make('region')
                        ->placeholder('Region')
                        ->required(),
                    TextInput::make('postal_code')
                        ->placeholder('Postal_Code')
                        ->numeric()
                        ->required(),
                    TextInput::make('country')
                        ->placeholder('Country')
                        ->minLength(3)
                        ->maxLength(20)
                        ->required(),
                    TextInput::make('email')
                        ->placeholder('Email')
                        // ->autocomplete('Name')
                        ->email()
                        ->suffix('.com')
                        ->required(),
                    TextInput::make('phone_no')
                        ->placeholder('Phone_No')
                        ->tel()
                        ->required(),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->limit(20)->sortable()->searchable(),
                TextColumn::make('position'),
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
            RelationManagers\TrainingweeksRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }    
}
