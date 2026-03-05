<?php

namespace App\Filament\Widgets;

use App\Models\Property;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class AdminTopPropertiesTable extends TableWidget
{
    protected static ?int $sort = 4;

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->heading('Biens les plus reserves')
            ->query(
                Property::query()
                    ->withCount('bookings')
                    ->orderByDesc('bookings_count')
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Bien')
                    ->searchable(),

                Tables\Columns\TextColumn::make('price_per_night')
                    ->label('Prix / nuit')
                    ->money('EUR')
                    ->sortable(),

                Tables\Columns\TextColumn::make('bookings_count')
                    ->label('Total reservations')
                    ->badge()
                    ->color('success')
                    ->sortable(),
            ])
            ->paginated([5])
            ->defaultPaginationPageOption(5)
            ->emptyStateHeading('Aucun bien disponible');
    }
}
