<?php

namespace App\Filament\Resources\TrainingweekResource\Pages;

use App\Filament\Resources\TrainingweekResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTrainingweek extends EditRecord
{
    protected static string $resource = TrainingweekResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            // Actions\Action::make('impersonate')->action('impersonate'),

        ];
    }
}
