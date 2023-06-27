<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LessonResource\Pages;
use App\Filament\Resources\LessonResource\RelationManagers;
use App\Models\Lesson;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LessonResource extends Resource
{
    protected static ?string $model = Lesson::class;

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
                TextInput::make('topic_id')->label(__('TopicId'))
                    ->placeholder('topic_id')
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
            'index' => Pages\ListLessons::route('/'),
            'create' => Pages\CreateLesson::route('/create'),
            'edit' => Pages\EditLesson::route('/{record}/edit'),
        ];
    }
}
