<?php

namespace App\Filament\Resources\TrainingweekResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Card;

class TasksRelationManager extends RelationManager
{
    protected static string $relationship = 'tasks';

    protected static ?string $recordTitleAttribute = 'topic';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('trainingweek_id')->label(__('Trainingweek_ID'))
                        ->placeholder('Trainingweek_ID')
                        ->required(),
                    TextInput::make('topic')
                        ->placeholder('Topic')
                        ->minLength(4)
                        ->maxLength(50)
                        ->required(),
                    TextInput::make('title')
                        ->placeholder('Title')
                        ->minLength(4)
                        ->maxLength(20)
                        ->required(),
                    TextInput::make('description')
                        ->placeholder('Description')
                        ->minLength(4)
                        ->maxLength(255)
                        ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // TextColumn::make('topic'),
                TextColumn::make('topic')->limit(20)->sortable()->searchable(),
                TextColumn::make('title'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}
