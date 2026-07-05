<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section as ComponentsSection;
use Filament\Schemas\Schema;

class ProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ComponentsSection::make('Informasi Profil')
                    ->description('Kelola data profil utama yang ditampilkan pada website portofolio.')
                    ->schema([
                        TextInput::make('full_name')
                            ->label('Nama Lengkap')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('profession')
                            ->label('Profesi / Jabatan')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('short_bio')
                            ->label('Bio Singkat')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),

                        RichEditor::make('about')
                            ->label('Tentang Saya')
                            ->required()
                            ->columnSpanFull()
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'bulletList',
                                'orderedList',
                                'undo',
                                'redo',
                            ])
                    ])
                    ->columns(2),

                ComponentsSection::make('Media Profil')
                    ->description('Unggah foto profil dan file CV yang akan ditampilkan pada website.')
                    ->schema([
                        FileUpload::make('profile_photo')
                            ->label('Foto Profil')
                            ->image()
                            ->disk('public')
                            ->directory('profiles/photos')
                            ->visibility('public')
                            ->imagePreviewHeight('180')
                            ->maxSize(2048) // 2 MB
                            ->nullable()
                            ->helperText('Format JPG, JPEG, PNG, WEBP. Maksimal 2 MB.'),

                        FileUpload::make('cv_file')
                            ->label('File CV')
                            ->disk('public')
                            ->directory('profiles/cv')
                            ->visibility('public')
                            ->acceptedFileTypes(['application/pdf'])
                            ->maxSize(5120) // 5 MB
                            ->nullable()
                            ->helperText('Format PDF. Maksimal 5 MB.'),
                    ])
                    ->columns(2),
            ]);
    }
}
