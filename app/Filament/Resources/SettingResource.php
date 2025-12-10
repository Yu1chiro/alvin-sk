<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
// 👇 PERHATIKAN BARIS INI: Import TextColumn yang benar
use Filament\Tables\Columns\TextColumn; 
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TagsInput;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;
    protected static ?string $navigationIcon = 'heroicon-o-paint-brush';
    protected static ?string $navigationLabel = 'Website Config';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Hero (Halaman Depan)')
                    ->schema([
                        TextInput::make('hero_title')->label('Nama Besar')->required(),
                        TextInput::make('hero_subtitle')->label('Quote / Role'),
                    ]),

                Section::make('About Me')
                    ->schema([
                        TextInput::make('about_image')
                            ->label('URL Foto Profil')
                            ->placeholder('https://...')
                            ->url()
                            ->columnSpanFull(),
                        
                        TagsInput::make('skills')
                            ->label('Skills (Tekan Enter)')
                            ->placeholder('Illustration, Animation...')
                            ->columnSpanFull(),

                        RichEditor::make('about_description')->columnSpanFull(),
                    ]),

                Section::make('Tampilan')
                    ->schema([
                        ColorPicker::make('theme_color')->default('#000000'),
                        ColorPicker::make('background_color')->default('#ffffff'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('hero_title')->label('Judul Website'),
                TextColumn::make('updated_at')->date(),
            ])
            ->actions([ Tables\Actions\EditAction::make() ]);
    }

    public static function getRelations(): array { return []; }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}