<?php

namespace App\Filament\Resources\Books\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BookForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('புத்தக விவரங்கள்')
                    ->schema([
                        Grid::make(12)
                            ->schema([
                                TextInput::make('title')
                                    ->label('தலைப்பு')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan(6),

                                TextInput::make('author')
                                    ->label('எழுதியவர்')
                                    ->maxLength(255)
                                    ->columnSpan(6),

                                TextInput::make('category')
                                    ->label('வகை')
                                    ->maxLength(255)
                                    ->columnSpan(6),

                                TextInput::make('slug')
                                    ->label('Slug')
                                    ->maxLength(255)
                                    ->helperText('Leave empty to auto-generate from title')
                                    ->columnSpan(6),

                                MarkdownEditor::make('description')
                                    ->label('விளக்கம்')
                                    ->columnSpan(12),

                                FileUpload::make('cover_image')
                                    ->label('அட்டைப்படம்')
                                    ->image()
                                    ->disk('public')
                                    ->directory('books/covers')
                                    ->imageEditor()
                                    ->columnSpan(6),

                                FileUpload::make('file_path')
                                    ->label('புத்தக கோப்பு (PDF)')
                                    ->disk('public')
                                    ->directory('books/files')
                                    ->acceptedFileTypes(['application/pdf'])
                                    ->columnSpan(6),

                                TextInput::make('sort_order')
                                    ->label('வரிசை எண்')
                                    ->numeric()
                                    ->default(0)
                                    ->columnSpan(6),

                                Toggle::make('is_active')
                                    ->label('செயலில் உள்ளது')
                                    ->default(true)
                                    ->columnSpan(6),
                            ]),
                    ]),
            ]);
    }
}
