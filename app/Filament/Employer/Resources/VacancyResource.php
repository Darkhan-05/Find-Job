<?php

namespace App\Filament\Employer\Resources;

use App\Filament\Employer\Resources\VacancyResource\Pages;
use App\Filament\Employer\Resources\VacancyResource\RelationManagers;
use App\Models\Vacancy;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class VacancyResource extends Resource
{
    protected static ?string $model = Vacancy::class;

    protected static ?string $navigationLabel = 'Мой вакансии';
    protected static ?string $modelLabel = 'Мой Вакансии';
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $recordTitleAttribute = 'name';  // в глобальном поиске будет виден название вакансии

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('user_id')
                    ->default(auth()->id()),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('responsibility')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('conditions')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('requirements')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('employment_type_id')
                    ->relationship('employmentType', 'name')
                    ->required(),
                Forms\Components\Select::make('country_id')
                    ->relationship('country', 'name')
                    ->required(),
                Forms\Components\Select::make('company_id')
                    ->relationship('company', 'name')
                    ->required(),
                Forms\Components\Select::make('city_id')
                    ->relationship('city', 'name')
                    ->required(),
                Forms\Components\TextInput::make('salary')
                    ->numeric()
                    ->nullable(),
                Forms\Components\DatePicker::make('posted_at')
                    ->default(now()),
                Forms\Components\DatePicker::make('expired_at')
                    ->nullable(),
                Forms\Components\Select::make('vacancy_status_id')
                    ->relationship('vacancyStatus', 'name')
                    ->required(),
                Forms\Components\Select::make('position_id')
                    ->relationship('position', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Название вакансии')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('position.name')
                    ->label('Должность')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('vacancyResume')
                    ->searchable()
                    ->counts('vacancyResumes')
                    ->label('Откликов')
                    ->default(0)
                    ->sortable(),
                Tables\Columns\TextColumn::make('vacancyStatus.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('employmentType.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('company.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('country.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('city.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('salary')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('responsibility')
                    ->formatStateUsing(fn ($state) => strlen($state) > 30 ? substr($state, 0, 30) . '...' : $state)
                    ->searchable(),
                Tables\Columns\TextColumn::make('conditions')
                    ->formatStateUsing(fn ($state) => strlen($state) > 30 ? substr($state, 0, 30) . '...' : $state)
                    ->searchable(),
                Tables\Columns\TextColumn::make('requirements')
                    ->searchable(),
                Tables\Columns\TextColumn::make('posted_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('expired_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('Company')
                    ->relationship('company', 'name')
                    ->label('Компания')
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ])
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->id());
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
            'create' => Pages\CreateVacancy::route('/create'),
            'view' => Pages\ViewVacancy::route('/{record}'),
            'edit' => Pages\EditVacancy::route('/{record}/edit'),
        ];
    }
}
