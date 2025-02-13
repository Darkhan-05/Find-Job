<?php

namespace App\Filament\Employer\Resources\ResumeResource\Pages;

use App\Filament\Employer\Resources\ResumeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewResume extends ViewRecord
{
    protected static string $resource = ResumeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
