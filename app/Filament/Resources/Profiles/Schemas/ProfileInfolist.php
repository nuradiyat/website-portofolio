<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section as ComponentsSection;
use Filament\Schemas\Schema;

class ProfileInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ComponentsSection::make('Informasi Profil')
                    ->schema([
                        ImageEntry::make('profile_photo')
                            ->label('Foto Profil')
                            ->disk('public')
                            ->circular(),

                        TextEntry::make('full_name')
                            ->label('Nama Lengkap'),

                        TextEntry::make('profession')
                            ->label('Profesi'),

                        TextEntry::make('short_bio')
                            ->label('Bio Singkat')
                            ->columnSpanFull(),

                        TextEntry::make('about')
                            ->label('Tentang Saya')
                            ->html()
                            ->columnSpanFull(),

                        TextEntry::make('cv_file')
                            ->label('File CV')
                            ->formatStateUsing(fn(?string $state) => $state ? 'CV tersedia' : 'Tidak ada file')
                            ->badge(),
                    ])
                    ->columns(2),
            ]);
    }
}
