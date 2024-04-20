<?php

namespace App\Filament\User\Resources\PostResource\Pages;

use App\Filament\User\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPost extends ViewRecord
{
    protected static string $resource = PostResource::class;


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
