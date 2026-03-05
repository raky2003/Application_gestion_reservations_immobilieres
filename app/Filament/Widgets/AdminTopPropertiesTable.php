<?php

namespace App\Filament\Widgets;

use App\Models\Property;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class AdminTopPropertiesTable extends TableWidget
{
    protected static ?int $sort = 4;

    protected int | string | array $columnSpan = 1;

    public function table(Table $table): Table
    {
        return $table
            ->heading('Toutes les proprietes')
            ->query(
                Property::query()
                    ->withCount('bookings')
                    ->latest()
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
                    ->label('Reservations')
                    ->badge()
                    ->color('success')
                    ->sortable(),
            ])
            ->paginated([8, 16, 24])
            ->defaultPaginationPageOption(8)
            ->emptyStateHeading('Aucun bien disponible');
    }
}
