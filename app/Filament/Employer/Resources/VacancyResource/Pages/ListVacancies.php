<?php

namespace App\Filament\Employer\Resources\VacancyResource\Pages;

use App\Filament\Employer\Resources\VacancyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVacancies extends ListRecords
{
    protected static string $resource = VacancyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}