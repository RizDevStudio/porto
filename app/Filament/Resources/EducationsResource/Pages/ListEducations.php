<?php

namespace App\Filament\Resources\EducationsResource\Pages;

use App\Filament\Resources\EducationsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEducations extends ListRecords
{
    protected static string $resource = EducationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
