<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Carbon\Carbon;
use Livewire\Component as Livewire;
use PhpParser\Node\Stmt\Continue_;

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
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('start_date'),
                Tables\Columns\TextColumn::make('end_date'),

            ])
             
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
                Tables\Actions\Action::make('generateWeek')
                    ->label(__('Generate Week'))
                    ->button()
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
    // public static $generatedWeeks = [];
    public static function generateweek(Livewire $livewire)
    {
        $userId = $livewire->getOwnerRecord()->id;
        $joiningDate = User::find($userId)->joining_date;
        $date = Carbon::parse($joiningDate);
        $weeks = [];
        $weeks[0] = [
            'start_date' =>  $date->toDateString(),
            'end_date' => $date->copy()->endOfWeek($weekEndsAt = Carbon::SATURDAY)->toDateString(),
        ];

        //---------------------------
        $start = $date->next('Monday ');
        $today = Carbon::now();
        //---------------------------   
        while ($start->lte($today)) {
            if ($start->dayOfWeek !== Carbon::SUNDAY) {
                $weeks[] = [
                    'start_date' => $start->copy()->startOfWeek($weekStartsAt = Carbon::MONDAY)->toDateString(),

                    'end_date' => $start->copy()->endOfWeek($weekEndsAt = Carbon::SATURDAY)->toDateString(),
                ];
                // dd($start->copy()->endOfWeek()->toDateString());    
            }
            $start->addWeek();
        }
        dd($weeks);
        // self::$generatedWeeks = $weeks;
    }
    
}
