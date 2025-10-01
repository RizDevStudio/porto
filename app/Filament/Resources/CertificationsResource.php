<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CertificationsResource\Pages;
use App\Filament\Resources\CertificationsResource\RelationManagers;
use App\Models\Certificates;
use Dom\Text;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use SebastianBergmann\CodeUnit\FileUnit;

class CertificationsResource extends Resource
{
    protected static ?string $model = Certificates::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                ->label('Nama Sertifikasi')
                ->required(),
                TextInput::make('publisher')
                ->label('Nama Lembaga Penerbit Sertifikasi')
                ->required(),
                DatePicker::make('date_published')
                ->label('Tanggal Penerbitan')
                ->required(),
                DatePicker::make('expiry_date')
                ->label('Tanggal Kadalwarsa'),
                FileUpload::make('file')
                ->disk('private') // simpan di storage/app/private
                ->directory('uploads/gambar')
                ->image()
                ->preserveFilenames()
                ->label('Foto Sertifikat')
                ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->label('Nama Sertifikasi'),
                TextColumn::make('publisher')
                ->label('Nama Lembaga Penerbit Sertifikasi'),
                TextColumn::make('date_published')
                ->label('Tanggal Penerbitan')
                ->date(),
                TextColumn::make('expiry_date')
                ->label('Tanggal Kadalwarsa')
                ->date(),
                ImageColumn::make('file')
                ->label('Foto Sertifikat')
                ->getStateUsing(fn ($record) => $record->file 
                    ? route('gambar.show', ['path' => $record->file]) 
                    : null),
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
            'index' => Pages\ListCertifications::route('/'),
            'create' => Pages\CreateCertifications::route('/create'),
            'edit' => Pages\EditCertifications::route('/{record}/edit'),
        ];
    }
}
