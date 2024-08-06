<?php

namespace App\Filament\Employer\Resources\VacancyResource\Pages;

use App\Filament\Employer\Resources\VacancyResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewVacancy extends ViewRecord
{
    protected static string $resource = VacancyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
