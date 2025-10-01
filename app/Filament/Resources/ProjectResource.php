<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Project Details')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->required()
                            ->columnSpanFull()
                            ->rows(4),

                        TextInput::make('tech_stack')
                            ->required()
                            ->placeholder('Laravel, Vue.js, Bootstrap')
                            ->helperText('Separate technologies with commas')
                            ->columnSpanFull(),

                        FileUpload::make('thumbnail')
                            ->image()
                            ->directory('projects')
                            ->preserveFilenames()
                            ->maxSize(2048) // 2MB
                            ->imageResizeTargetWidth(1200)
                            ->imageResizeTargetHeight(800)
                            ->helperText('Recommended size: 1200x800px (16:9 ratio)')
                            ->columnSpanFull(),

                        TextInput::make('demo_link')
                            ->url()
                            ->placeholder('https://yourproject.com')
                            ->columnSpanFull(),

                        TextInput::make('github_link')
                            ->url()
                            ->placeholder('https://github.com/yourusername/project')
                            ->columnSpanFull(),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail')
                    ->circular()
                    ->size(60),

                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('medium')
                    ->description(fn (Project $record): string => Str::limit($record->description, 50)),

                TextColumn::make('tech_stack')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('primary')
                    ->listWithLineBreaks()
                    ->limitList(3),
                    
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
