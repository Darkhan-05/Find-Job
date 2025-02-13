<?php

namespace App\Filament\Employer\Resources\ResumeResource\Pages;

use App\Filament\Employer\Resources\ResumeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListResumes extends ListRecords
{
    protected static string $resource = ResumeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
