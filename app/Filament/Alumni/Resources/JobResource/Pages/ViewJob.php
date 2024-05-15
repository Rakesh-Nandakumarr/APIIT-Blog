<?php

namespace App\Filament\Alumni\Resources\JobResource\Pages;

use App\Filament\Alumni\Resources\JobResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewJob extends ViewRecord
{
    protected static string $resource = JobResource::class;

    protected function getHeaderActions(): array
    {
        if ($this->record->active == false) {
            return [
                Actions\EditAction::make(),
                Actions\DeleteAction::make(),
            ];
        }
        return [];
    }

}
