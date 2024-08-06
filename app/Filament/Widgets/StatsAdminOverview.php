<?php

namespace App\Filament\Widgets;

use App\Models\Resume;
use App\Models\User;
use App\Models\Vacancy;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsAdminOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $currentMonthUsers = User::query()->where('role', 'USER')->count();
        $previousMonthUsers = User::query()->where('role', 'USER')
            ->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()])
            ->count();

        $userIcon = $currentMonthUsers > $previousMonthUsers ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down';
        $colorUserIcon = $currentMonthUsers > $previousMonthUsers ? 'success' : 'danger';

        $currentMonthVacancies = Vacancy::query()->count();
        $previousMonthVacancies = Vacancy::query()
            ->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()])
            ->count();

        $vacancyIcon = $currentMonthVacancies > $previousMonthVacancies ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down';
        $colorVacancyIcon = $currentMonthVacancies > $previousMonthVacancies ? 'success' : 'danger';

        return [
            Stat::make('Users', $currentMonthUsers)
                ->description('All users from the database')
                ->descriptionIcon($userIcon)
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color($colorUserIcon),
            Stat::make('Resumes', Resume::query()->count())
                ->description('All resumes from the database'),
            Stat::make('Vacancies', Vacancy::query()->count())
                ->description('All Vacancies from the database')
                ->descriptionIcon($vacancyIcon)
                ->color($colorVacancyIcon),
        ];
    }
}
