<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Widgets\ChartWidget;

class AdminBookingsChart extends ChartWidget
{
    protected static ?int $sort = 2;

    protected static ?string $heading = 'Evolution des reservations';

    protected static ?string $description = 'Volume de reservations par mois';

    protected int | string | array $columnSpan = 'full';

    protected static ?string $pollingInterval = '30s';

    protected function getFilters(): ?array
    {
        return [
            '6' => '6 derniers mois',
            '12' => '12 derniers mois',
        ];
    }

    protected function getData(): array
    {
        $monthsBack = in_array($this->filter, ['6', '12'], true) ? (int) $this->filter : 6;
        $start = now()->subMonths($monthsBack - 1)->startOfMonth();

        $months = [];
        for ($cursor = $start->copy(); $cursor->lte(now()); $cursor->addMonth()) {
            $months[$cursor->format('Y-m')] = [
                'label' => $cursor->translatedFormat('M Y'),
                'count' => 0,
            ];
        }

        $counts = Booking::where('created_at', '>=', $start)
            ->get()
            ->groupBy(fn (Booking $booking): string => $booking->created_at->format('Y-m'))
            ->map(fn ($group): int => $group->count())
            ->all();

        foreach ($counts as $month => $count) {
            if (array_key_exists($month, $months)) {
                $months[$month]['count'] = $count;
            }
        }

        return [
            'datasets' => [
                [
                    'label' => 'Reservations',
                    'data' => array_values(array_map(fn (array $month): int => $month['count'], $months)),
                    'borderColor' => '#0891b2',
                    'backgroundColor' => 'rgba(8, 145, 178, 0.18)',
                    'fill' => true,
                    'tension' => 0.35,
                ],
            ],
            'labels' => array_values(array_map(fn (array $month): string => $month['label'], $months)),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
