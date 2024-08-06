<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\VacancyResource\Pages;
use App\Filament\App\Resources\VacancyResource\RelationManagers;
use App\Models\Vacancy;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VacancyResource extends Resource
{
    protected static ?string $model = Vacancy::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('vacancyResumes.status'),
                Tables\Columns\TextColumn::make('responsibility')
                    ->formatStateUsing(fn ($state) => strlen($state) > 30 ? substr($state, 0, 30) . '...' : $state)
                    ->searchable(),
                Tables\Columns\TextColumn::make('conditions')
                    ->formatStateUsing(fn ($state) => strlen($state) > 30 ? substr($state, 0, 30) . '...' : $state)
                    ->searchable(),
                Tables\Columns\TextColumn::make('requirements')
                    ->formatStateUsing(fn ($state) => strlen($state) > 30 ? substr($state, 0, 30) . '...' : $state)
                    ->searchable(),
                Tables\Columns\TextColumn::make('employmentType.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('country.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('city.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('salary')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('posted_at')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('expired_at')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('position.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        $userId = auth()->id();

        return parent::getEloquentQuery()
            ->whereHas('resumes', function (Builder $query) use ($userId) {
                $query->where('user_id', $userId);
            });
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
            'index' => Pages\ListVacancies::route('/'),
        ];
    }
}
