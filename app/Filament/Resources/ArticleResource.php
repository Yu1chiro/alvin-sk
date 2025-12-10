<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Support\Str;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text'; // Ikon Dokumen
    protected static ?string $navigationLabel = 'Blog Articles';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Bagian Judul & Slug
                TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, \Filament\Forms\Set $set) => 
                        $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),

                DatePicker::make('published_at')
                    ->label('Tanggal Publish')
                    ->default(now()),

                // Repeater Gambar (Dynamic Add)
                Repeater::make('images')
                    ->label('Gallery Images (URL)')
                    ->schema([
                        TextInput::make('url')
                            ->label('Image URL')
                            ->placeholder('https://...')
                            ->required(),
                    ])
                    ->grid(2)
                    ->columnSpanFull(),

                // Rich Editor Lengkap
                RichEditor::make('content')
                    ->label('Article Content')
                    ->columnSpanFull()
                    ->toolbarButtons([
                        'attachFiles', 'blockquote', 'bold', 'bulletList', 'codeBlock',
                        'h2', 'h3', 'italic', 'link', 'orderedList', 'redo',
                        'strike', 'underline', 'undo',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->limit(50),
                TextColumn::make('published_at')->date()->sortable(),
                TextColumn::make('created_at')->since(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getRelations(): array { return []; }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}