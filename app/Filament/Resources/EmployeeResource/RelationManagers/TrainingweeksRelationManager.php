<?php

namespace App\Filament\Resources\EmployeeResource\RelationManagers;

// use Filament\Forms;
// use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
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
                // Forms\Components\TextInput::make('Status')
                //     ->required()
                //     ->maxLength(255),
                Card::make()->schema([
                    Select::make('employee_id')
                    ->relationship('employees', 'id')
                    ->required(),
                    Select::make('emp_Name')
                    ->relationship('employees', 'name'),
                    TextInput::make('week_no')->required(),
                    Select::make('status')
                    ->options([
                    'abc' => 'ABC',
                    'mno' => 'MNO',
                    'xyz' => 'XYZ',
                    ]),
                    DatePicker::make('start-date'),
                    DatePicker::make('end-date'),
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
                // Tables\Filters\TrashedFilter::make()
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
                Tables\Actions\Action::make("test")
                ->action('generateWeek')
                ->label(__('Generate Week')),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                
                // Filament\Pages\Actions\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    

    public function generateWeek(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('Joining_date')->required(),
                    // Select::make('employee_id')
                    // ->relationship('employees', 'id')
                    // ->required(),

                    // TextInput::make('week_no')->required(),
                    // Select::make('status')
                    // ->options([
                    // 'abc' => 'ABC',
                    // 'mno' => 'MNO',
                    // 'xyz' => 'XYZ',
                    // ]),
                    // DatePicker::make('start_date'),
                    // DatePicker::make('end_date'),
                    ])
            ]);
    }
    
}
