<?php

namespace App\Filament\Alumni\Resources\JobResource\Pages;

use App\Filament\Alumni\Resources\JobResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateJob extends CreateRecord
{
    protected static string $resource = JobResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['active'] = false;
        $data['user_id'] = auth()->id();
        return $data;
    }
}
