<?php

namespace App\Filament\Calendar\Resources;

use App\Filament\Calendar\Resources\EventResource\Pages;
use App\Filament\Calendar\Resources\EventResource\RelationManagers;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->maxLength(2048),
                    Forms\Components\RichEditor::make('description')
                        ->required(),
                    Forms\Components\DateTimePicker::make('start_date')
                        ->required()
                        ->label('Start Date & Time'),
                    Forms\Components\DateTimePicker::make('end_date')
                        ->required()
                        ->label('End Date & Time'),
                ])->columnSpan(8),
                Forms\Components\Card::make()
                ->schema([
                Forms\Components\FileUpload::make('thumbnail')
                    ->label('Event Poster'),
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'title'),
                ])->columnSpan(4)
                ])->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable(['title', 'start_date', 'end_date'])->sortable(),
                Tables\Columns\TextColumn::make('start_date')->sortable(),
                Tables\Columns\TextColumn::make('end_date')->sortable(),
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
