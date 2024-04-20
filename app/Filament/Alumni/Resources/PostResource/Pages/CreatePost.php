<?php

namespace App\Filament\Alumni\Resources\PostResource\Pages;

use App\Filament\Alumni\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['active'] = false;
        $data['user_id'] = auth()->id();
        return $data;
    }
}
