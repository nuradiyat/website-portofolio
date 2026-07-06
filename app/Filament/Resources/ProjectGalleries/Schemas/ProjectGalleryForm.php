<?php

namespace App\Filament\Resources\ProjectGalleries\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProjectGalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Gallery')
                    ->description('Tambahkan gambar gallery untuk project.')
                    ->schema([
                        Select::make('project_id')
                            ->label('Project')
                            ->relationship('project', 'title')
                            ->searchable()
                            ->preload()
                            ->required(),

                        FileUpload::make('image')
                            ->label('Gambar Gallery')
                            ->image()
                            ->disk('public')
                            ->directory('projects/galleries')
                            ->visibility('public')
                            ->imageEditor()
                            ->imagePreviewHeight('220')
                            ->downloadable()
                            ->openable()
                            ->required()
                            ->helperText('Upload gambar gallery project. Format JPG, JPEG, PNG, atau WEBP.'),

                        Textarea::make('caption')
                            ->label('Caption')
                            ->rows(3)
                            ->nullable()
                            ->columnSpanFull()
                            ->helperText('Opsional. Isi keterangan singkat untuk gambar gallery.'),
                    ])
                    ->columns(2),
            ])
            ->columns(1);
    }
}
