<?php

namespace App\Filament\Calendar\Resources\EventResource\Pages;

use App\Filament\Calendar\Resources\EventResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEvent extends CreateRecord
{
    protected static string $resource = EventResource::class;
}
