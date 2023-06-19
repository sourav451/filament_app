<?php

namespace App\Filament\Resources\TrainingweekResource\Pages;

use App\Filament\Resources\TrainingweekResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTrainingweeks extends ListRecords
{
    protected static string $resource = TrainingweekResource::class;

    protected function getActions(): array
    {
        return [
            Actions\Action::make('impersonate')->action('impersonate'),
            // Actions\Action::make('impersonate')->action('impersonate'),

            Actions\CreateAction::make(),
        ];
    }
}
