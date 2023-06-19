<?php

namespace App\Filament\Resources\EmployeeResource\Pages;

use App\Filament\Resources\EmployeeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;
// use Carbon\Carbon;
use Filament\Forms\Components\TextInput;
use Filament\Resources\EmployeeResource\Pages\Form;
// use App\Filament\Resources\EmployeeResource\Pages\ButtonAction;




class EditEmployee extends EditRecord
{
    protected static string $resource = EmployeeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\Action::make('impersonate')->action('impersonate'),
            Actions\DeleteAction::make(),
        ];
    }
    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('User updated')
            ->body('The user has been saved successfully.');
    }

    // public function impersonate(): array
    // {
        // 
        // return [
        //     ButtonAction::make('UPLOAD')->extraAttributes(['class' => 'button'])
        //         ->action('kkp')
        //         ->requiresConfirmation()
        //         ->modalHeading('UPLOAD FILE')
        //         ->modalButton('UPLOAD FILE')
        //         ->form([
        //             FileUpload::make('attachment')
        //                 ->extraAttributes(['class' => 'custom'])
        //                 ->label('UPLOAD SURAT PENGANTAR')
        //                 ->required()
        //         ]),
        // ];
    // }

}
