<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Support\Carbon;

class AdminUpcomingBookingsTable extends TableWidget
{
    protected static ?int $sort = 3;

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->heading('Prochaines reservations')
            ->query(
                Booking::query()
                    ->with(['user:id,name', 'property:id,name'])
                    ->whereDate('start_date', '>=', today())
                    ->orderBy('start_date')
            )
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Client')
                    ->searchable(),

                Tables\Columns\TextColumn::make('property.name')
                    ->label('Bien')
                    ->searchable(),

                Tables\Columns\TextColumn::make('start_date')
                    ->label('Debut')
                    ->date('d/m/Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('end_date')
                    ->label('Fin')
                    ->date('d/m/Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('nights')
                    ->label('Nuits')
                    ->state(fn (Booking $record): int => max(1, Carbon::parse($record->start_date)->diffInDays(Carbon::parse($record->end_date))))
                    ->badge()
                    ->color('primary'),
            ])
            ->paginated([5])
            ->defaultPaginationPageOption(5)
            ->emptyStateHeading('Aucune reservation a venir');
    }
}
