<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrainingweekResource\Pages;
use App\Filament\Resources\TrainingweekResource\RelationManagers;
use App\Models\Trainingweek;
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
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;

class TrainingweekResource extends Resource
{
    protected static ?string $model = Trainingweek::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('employee_id')
                        ->required(),
                    // Select::make('employee_id')
                    // ->relationship('employees', 'id')
                    // ->required(),

                    TextInput::make('week_no')->required(),
                    Select::make('status')
                        ->options([
                            'abc' => 'ABC',
                            'mno' => 'MNO',
                            'xyz' => 'XYZ',
                        ]),
                    DatePicker::make('start_date'),
                    DatePicker::make('end_date'),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('employee_id')->limit(20)->sortable()->searchable(),
                TextColumn::make('week_no')->limit(20)->sortable()->searchable(),
                TextColumn::make('status'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
            RelationManagers\TasksRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTrainingweeks::route('/'),
            'create' => Pages\CreateTrainingweek::route('/create'),
            'edit' => Pages\EditTrainingweek::route('/{record}/edit'),
        ];
    }
}
