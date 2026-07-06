<?php

namespace App\Filament\Resources\ProjectGalleries\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProjectGalleryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detail Gallery')
                    ->schema([
                        TextEntry::make('project.title')
                            ->label('Project'),

                        TextEntry::make('caption')
                            ->label('Caption')
                            ->placeholder('-')
                            ->columnSpanFull(),

                        ImageEntry::make('image')
                            ->label('Gambar')
                            ->disk('public')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}