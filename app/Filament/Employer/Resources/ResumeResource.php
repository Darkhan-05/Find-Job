<?php

namespace App\Filament\Employer\Resources;

use App\Filament\Employer\Resources\ResumeResource\Pages;
use App\Filament\Employer\Resources\ResumeResource\RelationManagers;
use App\Models\Resume;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Vacancy;

class ResumeResource extends Resource
{
    protected static ?string $model = Resume::class;

    // protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\TextInput::make('first_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('middle_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('last_name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('age')
                    ->numeric(),
                Forms\Components\Select::make('gender_id')
                    ->relationship('gender', 'name')
                    ->required(),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')
                    ->maxLength(255),
                Forms\Components\TextInput::make('skills')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('country_id')
                    ->relationship('country', 'name'),
                Forms\Components\Select::make('city_id')
                    ->relationship('city', 'name')
                    ->required(),
                Forms\Components\Section::make('Education Details')
                    ->schema([
                        Forms\Components\TextInput::make('education.institution')
                            ->label('Institution'),
                        Forms\Components\Select::make('education.degree_id')
                            ->relationship('degree', 'name')
                            ->label('Degree'),
                        Forms\Components\TextInput::make('education.field_of_study')
                            ->label('Field of Study'),
                    ]),
                Forms\Components\Select::make('experience_id')
                    ->relationship('experience', 'id')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('middle_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('age')
                    ->sortable(),
                Tables\Columns\TextColumn::make('gender.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('skills')
                    ->searchable(),
                Tables\Columns\TextColumn::make('country.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('city.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('education.id')
                    ->sortable(),
                Tables\Columns\TextColumn::make('experience.id')
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
            ->filters([])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\Action::make('accept')
                    ->label('Accept')
                    ->action(function (Resume $record) {
                        $vacancyId = request('vacancy_id');
                        dd($vacancyId);
                        $record->vacancies()->updateExistingPivot($vacancyId, ['status' => 'accepted']);
                    })
                    ->color('success')
                    ->requiresConfirmation()
                    ->icon('heroicon-o-check'),
                Tables\Actions\Action::make('reject')
                    ->label('Reject')
                    ->color('danger')
                    ->action(function (Resume $record) {
                        $record->vacancies()->updateExistingPivot(request('vacancy_id'), ['status' => 'rejected']);
                    })
                    ->requiresConfirmation()
                    ->icon('heroicon-o-x-circle'),
                Tables\Actions\Action::make('invite')
                    ->label('Invite for Interview')
                    ->action(function (Resume $record) {
                        $record->vacancies()->updateExistingPivot(request('vacancy_id'), ['status' => 'invited']);
                    })
                    ->requiresConfirmation()
                    ->icon('heroicon-o-envelope'),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getEloquentQuery(): Builder
    {
        $userId = auth()->id();

        return parent::getEloquentQuery()
            ->whereHas('vacancies', function (Builder $query) use ($userId) {
                $query->where('user_id', $userId);
            });
    }



    public static function getPages(): array
    {
        return [
            'index' => Pages\ListResumes::route('/'),
            'view' => Pages\ViewResume::route('/{record}'),
        ];
    }
}
