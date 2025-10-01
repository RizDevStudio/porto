<?php

namespace App\Filament\Resources\EducationsResource\Pages;

use App\Filament\Resources\EducationsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEducations extends EditRecord
{
    protected static string $resource = EducationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
