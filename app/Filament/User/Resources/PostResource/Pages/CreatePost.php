<?php

namespace App\Filament\User\Resources\PostResource\Pages;

use App\Filament\User\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;


class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['slug'] = Str::slug($data['title']);
        $data['active'] = false;
        $data['user_id'] = auth()->id();
        return $data;
    }
}
