<?php

namespace App\Filament\Resources\CertificationsResource\Pages;

use App\Filament\Resources\CertificationsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCertifications extends ListRecords
{
    protected static string $resource = CertificationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
