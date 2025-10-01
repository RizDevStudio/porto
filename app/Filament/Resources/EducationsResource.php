<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EducationsResource\Pages;
use App\Filament\Resources\EducationsResource\RelationManagers;
use App\Models\Educations;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EducationsResource extends Resource
{
    protected static ?string $model = Educations::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('jenjang')
                ->label('Jenjang Pendidikan')
                ->required(),
                TextInput::make('instansi')
                ->label('Nama Instansi Pendidikan')
                ->required(),
                TextInput::make('jurusan')
                ->required(),
                TextInput::make('tahun_masuk')
                ->label('Tahun Masuk')
                ->required(),
                TextInput::make('tahun_lulus')
                ->label('Tahun Lulus')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('jenjang')
                ->label('Jenjang Pendidikan'),
                TextColumn::make('instansi')
                ->label('Nama Instansi Pendidikan'),
                TextColumn::make('jurusan'),
                TextColumn::make('tahun_masuk')
                ->label('Tahun Masuk'),
                TextColumn::make('tahun_lulus')
                ->label('Tahun Lulus'),
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
            'index' => Pages\ListEducations::route('/'),
            'create' => Pages\CreateEducations::route('/create'),
            'edit' => Pages\EditEducations::route('/{record}/edit'),
        ];
    }
}
