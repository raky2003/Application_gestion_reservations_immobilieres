<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use App\Models\Property;
use App\Models\User;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AdminStatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected static ?string $pollingInterval = '30s';

    protected ?string $heading = 'Statistiques en temps reel';

    protected function getStats(): array
    {
        $now = now();
        $today = today();
        $monthStart = $now->copy()->startOfMonth();
        $monthEnd = $now->copy()->endOfMonth();

        $bookingsTotal = Booking::count();
        $bookingsThisMonth = Booking::whereBetween('created_at', [$monthStart, $monthEnd])->count();
        $activeBookings = Booking::whereDate('start_date', '<=', $today)
            ->whereDate('end_date', '>=', $today)
            ->count();

        $clientsTotal = User::where('role', 'client')->count();
        $propertiesTotal = Property::count();
        $averageStay = Booking::query()
            ->get()
            ->avg(fn (Booking $booking): float => (float) max(1, Carbon::parse($booking->start_date)->diffInDays(Carbon::parse($booking->end_date))));

        $revenueThisMonth = Booking::with('property:id,price_per_night')
            ->whereBetween('created_at', [$monthStart, $monthEnd])
            ->get()
            ->sum(fn (Booking $booking): float => $this->estimateAmount($booking));

        $bookedNightsThisMonth = Booking::with('property:id')
            ->whereDate('end_date', '>=', $monthStart->toDateString())
            ->whereDate('start_date', '<=', $monthEnd->toDateString())
            ->get()
            ->sum(fn (Booking $booking): int => $this->overlapNights($booking, $monthStart, $monthEnd));

        $maxNights = max(1, $propertiesTotal * $monthStart->daysInMonth);
        $occupancyRate = round(($bookedNightsThisMonth / $maxNights) * 100, 1);

        $bookingTrend = $this->bookingTrend();
        $clientTrend = User::where('role', 'client')
            ->where('created_at', '>=', now()->subMonths(6)->startOfMonth())
            ->get()
            ->groupBy(fn (User $user): string => $user->created_at->format('Y-m'))
            ->sortKeys()
            ->map(fn ($group): int => $group->count())
            ->values()
            ->map(fn (int $count): float => (float) $count)
            ->all();

        return [
            Stat::make('Reservations totales', number_format($bookingsTotal, 0, ',', ' '))
                ->description($bookingsThisMonth . ' ce mois-ci')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('primary')
                ->chart($bookingTrend),

            Stat::make('Reservations en cours', number_format($activeBookings, 0, ',', ' '))
                ->description('Actives au ' . $today->format('d/m/Y'))
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),

            Stat::make('Revenu estime (mois)', number_format($revenueThisMonth, 0, ',', ' ') . ' EUR')
                ->description('Base sur les reservations creees ce mois')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),

            Stat::make('Clients / Biens', $clientsTotal . ' / ' . $propertiesTotal)
                ->description('Utilisateurs clients et proprietes publiees')
                ->descriptionIcon('heroicon-m-users')
                ->color('info')
                ->chart($clientTrend),

            Stat::make('Taux d occupation', number_format($occupancyRate, 1, ',', ' ') . ' %')
                ->description('Occupation du parc ce mois')
                ->descriptionIcon('heroicon-m-home-modern')
                ->color('gray'),

            Stat::make('Duree moyenne de sejour', number_format((float) $averageStay, 1, ',', ' ') . ' nuits')
                ->description('Moyenne globale des reservations')
                ->descriptionIcon('heroicon-m-moon')
                ->color('primary'),
        ];
    }

    protected function bookingTrend(): array
    {
        $start = now()->subMonths(5)->startOfMonth();
        $months = [];

        for ($cursor = $start->copy(); $cursor->lte(now()); $cursor->addMonth()) {
            $months[$cursor->format('Y-m')] = 0.0;
        }

        $counts = Booking::where('created_at', '>=', $start)
            ->get()
            ->groupBy(fn (Booking $booking): string => $booking->created_at->format('Y-m'))
            ->map(fn ($group): float => (float) $group->count())
            ->all();

        foreach ($counts as $month => $count) {
            if (array_key_exists($month, $months)) {
                $months[$month] = $count;
            }
        }

        return array_values($months);
    }

    protected function estimateAmount(Booking $booking): float
    {
        if (! $booking->property) {
            return 0.0;
        }

        $startDate = Carbon::parse($booking->start_date);
        $endDate = Carbon::parse($booking->end_date);
        $nights = max(1, $startDate->diffInDays($endDate));

        return (float) $booking->property->price_per_night * $nights;
    }

    protected function overlapNights(Booking $booking, Carbon $rangeStart, Carbon $rangeEnd): int
    {
        $start = Carbon::parse($booking->start_date)->startOfDay();
        $end = Carbon::parse($booking->end_date)->startOfDay();

        if ($end->lt($rangeStart) || $start->gt($rangeEnd)) {
            return 0;
        }

        $effectiveStart = $start->greaterThan($rangeStart) ? $start : $rangeStart;
        $effectiveEnd = $end->lessThan($rangeEnd) ? $end : $rangeEnd;

        return max(1, $effectiveStart->diffInDays($effectiveEnd));
    }
}
