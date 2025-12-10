<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;
use Illuminate\Support\Str;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
    ->schema([
        TextInput::make('title')
            ->required()
            ->live(onBlur: true)
            ->afterStateUpdated(fn (string $operation, $state, \Filament\Forms\Set $set) => 
                $operation === 'create' ? $set('slug', Str::slug($state)) : null),

        TextInput::make('slug')
            ->required()
            ->unique(ignoreRecord: true),

        Repeater::make('image')
            ->label('Images (URL Only)')
            ->schema([
                TextInput::make('url')
                    ->label('Image URL')
                    ->placeholder('https://example.com/gambar.jpg')
                    ->required(),
            ])
            ->grid(2)
            ->columnSpanFull(),

        RichEditor::make('description')
            ->columnSpanFull(),
    ]);
    }

    public static function table(Table $table): Table
    {
       return $table
    ->columns([
        TextColumn::make('title')->searchable(),
        TextColumn::make('created_at')->date(),
    ])
    ->filters([])
    ->actions([
        Tables\Actions\EditAction::make(),
        Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
