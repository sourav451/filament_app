<?php

namespace App\Filament\Resources\EmployeeResource\RelationManagers;
use Filament\Resources\RelationManagers\RelationManager;
use App\Filament\Resources\EmployeeResource\RelationManagers\Notification;
use Illuminate\Support\Facades\Log;
use App\Filament\Resources\TrainingweekResource\Pages;
use App\Filament\Resources\TrainingweekResource\RelationManagers;
use App\Filament\Resources\EmployeeResource\RelationManagers\CreateAction;
use App\Models\Employee;
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
use GuzzleHttp\Psr7\Request;

class TrainingweeksRelationManager extends RelationManager
{
    protected static string $relationship = 'trainingweeks';

    protected static ?string $recordTitleAttribute = 'status';
    public static ?int $employeeId;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('employee_id')
                        ->required(),
                        // ->onChange(function ($value) {
                        //     self::$employeeId = $value;
                        // }),
                        // ->afterStateHydrated(function ($state) {
                        //     self::$employeeId = $state['employee_id'] ?? null;
                        // }),
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
                Tables\Columns\TextColumn::make('employee_id'),
                // ->formatStateUsing(function ($value) {
                //     self::$employeeId = $value;
                //     return $value;
                // }),
                Tables\Columns\TextColumn::make('week_no'),
                Tables\Columns\TextColumn::make('status')->searchable(),
                Tables\Columns\TextColumn::make('start_date'),
                Tables\Columns\TextColumn::make('end_date'),

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
                    ->button()
                    // ->params(['employee_id' => $record->id]) // pass the employee_id as a parameter
                    ->action('generateweek'),
                ])

            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);       
    }

    public static function generateweek():void
    {
        // $employeeId=Employee::find($employee_id)->id;
        // $employee_Id = self::$employeeId;
        // dd($employee_Id);
        // dd($employeeId);
        // exit;
        $joiningDate = Employee::find(2)->joining_date;
        dd($joiningDate);
        // Log::info($joiningDate);
        $trainingweekId=Trainingweek::find(6)->id;
        $lastWeekDate= Trainingweek::find($trainingweekId)->end_date;
        dd($lastWeekDate);

    }
}
