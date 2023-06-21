<?php

namespace App\Filament\Resources\EmployeeResource\RelationManagers;

// use Filament\Forms;
// use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use App\Filament\Resources\EmployeeResource\RelationManagers\Notification;
// use Filament\Pages\Actions;
// use Filament\Resources\Table;
// use Filament\Tables;
// use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Database\Eloquent\SoftDeletingScope;
// use Filament\Resources\Forms\Components\Button;
// use Filament\Resources\Forms\Components\Component;
// use Filament\Resources\Forms\Components\Wrapper;
// use Filament\Pages\Actions;
use App\Filament\Resources\TrainingweekResource\Pages;
use App\Filament\Resources\TrainingweekResource\RelationManagers;
use App\Filament\Resources\EmployeeResource\RelationManagers\CreateAction;
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

class TrainingweeksRelationManager extends RelationManager
{
    protected static string $relationship = 'trainingweeks';

    protected static ?string $recordTitleAttribute = 'status';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('employee_id')
                        ->required(),
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
                Tables\Columns\TextColumn::make('week_no'),
                Tables\Columns\TextColumn::make('status')->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label(__('Create Week')),
                //generate week button
                Tables\Actions\Action::make('generateWeek')
                    ->label(__('Generate Week'))
                    ->button(),
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
