<?php

namespace App\Filament\Alumni\Resources\PostResource\Pages;

use App\Filament\Alumni\Resources\PostResource;
use App\Models\Category;
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
//        $data['categories'] = [Category::where('title', 'Alumni testimonial')->first()->id];
        return $data;
    }

//    public function mount(): void
//    {
//        // Initialize the 'record' property with a new instance of the Post model
//        $this->record = new \App\Models\Post;
//
//        // Get the 'Alumni testimonial' category
//        $category = Category::where('title', 'Alumni testimonial')->first();
////        dd($category,$this->record->categories);
//        // Set the 'categories' attribute of the Post model instance to the ID of the 'Alumni testimonial' category
//        if ($category) {
//            $this->record->categories = [$category->id];
//        }
//
//        parent::mount();
//    }
}
