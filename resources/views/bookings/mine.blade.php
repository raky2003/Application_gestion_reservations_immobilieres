@extends('layouts.app')

@section('content')
<div class="page-shell space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <h1 class="section-title">Mes reservations</h1>
        <a href="{{ route('properties.index') }}#catalogue" class="btn-soft !px-4 !py-2 !text-sm">
            Voir catalogue
        </a>
    </div>

    @if($bookings->isEmpty())
        <div class="glass-card p-8 text-slate-700 fade-up">
            Aucune reservation pour le moment.
        </div>
    @else
        <div class="glass-card overflow-hidden fade-up">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[640px]">
                    <thead class="bg-slate-50/80">
                        <tr class="text-left text-slate-600 text-sm">
                            <th class="p-4 font-semibold">Propriete</th>
                            <th class="p-4 font-semibold">Debut</th>
                            <th class="p-4 font-semibold">Fin</th>
                            <th class="p-4 font-semibold">Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                            <tr class="border-t border-slate-100 hover:bg-slate-50/70 transition">
                                <td class="p-4 font-semibold text-slate-900">{{ $booking->property->name }}</td>
                                <td class="p-4 text-slate-700">{{ $booking->start_date }}</td>
                                <td class="p-4 text-slate-700">{{ $booking->end_date }}</td>
                                <td class="p-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-cyan-50 text-cyan-700">
                                        Confirmee
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection
