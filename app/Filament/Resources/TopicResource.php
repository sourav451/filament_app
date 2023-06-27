<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TopicResource\Pages;
use App\Filament\Resources\TopicResource\RelationManagers;
use App\Models\Topic;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TopicResource extends Resource
{
    protected static ?string $model = Topic::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Materials';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('title')->label(__('Title'))
                    ->placeholder('title')
                    ->minLength(5)
                    ->maxLength(255)
                    ->required(),
                TextInput::make('description')->label(__('Description'))
                    ->placeholder('description')
                    ->minLength(4)
                    ->maxLength(255),
                TextInput::make('created_by')->label(__('Created By'))
                    ->placeholder('created by')
                    ->minLength(4)
                    ->maxLength(255)
                    ->required(),
                TextInput::make('subject_id')->label(__('SubjectId'))
                    ->placeholder('subject_id'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('title'),
                TextColumn::make('description'),
                TextColumn::make('created_by'),
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
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTopics::route('/'),
            'create' => Pages\CreateTopic::route('/create'),
            'edit' => Pages\EditTopic::route('/{record}/edit'),
        ];
    }
}
