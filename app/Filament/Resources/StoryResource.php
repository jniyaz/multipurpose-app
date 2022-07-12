<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StoryResource\Pages;
use App\Filament\Resources\StoryResource\RelationManagers;
use App\Filament\Roles;
use App\Models\Story;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class StoryResource extends Resource
{
    public static $title = 'Custom Page Title';
    public static $icon = 'heroicon-o-collection';
    public static $model = Story::class;

    public static function form(Form $form)
    {
        return $form
            ->schema([
                Components\TextInput::make('title')
                    ->columnSpan(1)
                    ->autofocus()
                    ->required(),
                Components\MarkdownEditor::make('description')
                    ->columnSpan(1)
                    ->required(),
                Components\Select::make('type')
                    ->placeholder('Select a type')
                    ->options([
                        'short' => 'Short',
                        'long' => 'Long',
                    ]),
                Components\FileUpload::make('cover_image')
                        // ->acceptedFileTypes(['jpg', 'jpeg', 'png'])
                        ->maxSize(3000)
                        ->imageCropAspectRatio('1:1')
                        ->disk('public')
                        ->directory('stories'),
                Components\Toggle::make('status'),
                ]);
            // ->columns(2);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                //
                Columns\Text::make('id')->primary()->sortable(),
                Columns\Text::make('title')->primary()->sortable()->searchable(),
                Columns\Text::make('description')->limit(40),
                Columns\Text::make('created_at')->sortable(),
                Columns\Boolean::make('status')->label('Active?'),
            ])
            ->filters([
                //
            ]);
    }

    public static function relations()
    {
        return [
            //
        ];
    }

    public static function routes()
    {
        return [
            Pages\ListStories::routeTo('/', 'index'),
            Pages\CreateStory::routeTo('/create', 'create'),
            Pages\EditStory::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
